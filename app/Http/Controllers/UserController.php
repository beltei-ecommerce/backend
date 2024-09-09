<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecoverPasswordNotifycation;

class UserController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Your email or password is invalid'
            ], 404);
        }

        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json([
            'success' => true,
            'user' => new UserResource($user),
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['success' => true]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::storeUser($request);
        return Response()->json(['success' => true, 'data' => new UserResource($user)]);
    }

    public function whoAmI()
    {
        return response()->json(["success" => true, "user" => new UserResource(Auth::user())]);
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is invalid'
            ], 404);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return response()->json(['success' => true]);
    }

    public function sendRequestResetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['success'=>  false, 'message'=> 'Imposible to send to this email'], 404);
        }

        try {
            // In case user re request, delete previous one
            PasswordResetToken::where('email', '=', $request->email)->delete();

            // Radom token
            $tokenRandom = Str::random(60);

            $data = [
                'email' => $request->email,
                'token' => $tokenRandom
            ];
            PasswordResetToken::create([
                'email' => $data['email'],
                'token' =>  $data['token']
            ]);

            $data['first_name'] = $user->first_name;

            // Email sent successfully, return a success response
            Mail::to($data['email'])->send(new RecoverPasswordNotifycation($data));
            return response()->json([
                'message' => 'We have sent a reset password link to your email address',
                'success' => true,
            ]);
        } catch (\Exception $e) {
            // Error sending email, return an error response
            return response()->json([
                'message' => 'Something went wrong while sending reset password',
                'success' => false,
            ], 500);
        }
    }

    public function verifyResetPassword(Request $request)
    {
        $token = $request->query('token');

        // Find email and token is valid in password_reset_token
        $exists = PasswordResetToken::where('token', $token)->exists();

        if (!$exists) {
            return response()->json([
                'message' => 'Imposible to reset password',
                'success' => false
            ], 404);
        }

        return response()->json([
            'message' => 'Posible to reset password',
            'success' => true
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $token = $request->token;
        $passwordResetToken = PasswordResetToken::where('token', $token)->first();

        if (!$passwordResetToken) {
            return response()->json([
                'message' => 'Imposible to reset password',
                'success' => false
            ], 404);
        }

        $newPassword = $request->new_password;
        $email = $passwordResetToken->email;

        // Update password by email
        $user = User::where('email', '=', $email)->first();
        $user->password = bcrypt($newPassword);
        $user->save();

        // Delete token in password_reset_tokens
        PasswordResetToken::where('email', '=', $email)->delete();

        return response()->json([
            'message' => 'Password changed successfully',
            'success' => true
        ]);
    }
}
