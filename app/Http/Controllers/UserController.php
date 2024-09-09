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
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['success' => true], 200);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::storeUser($request);
        return Response()->json(['success' => true, 'data' => new UserResource($user)], 200);
    }

    public function whoAmI()
    {
        return response()->json(["success" => true, "user" => new UserResource(Auth::user())], 200);
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

        return response()->json(['success' => true], 200);
    }

    public function sendRequestResetPassword(Request $request)
    {
        // Radom token
        $tokenRandom = Str::random(60);

        $data = [
            'email' => $request->email,
            'token' => $tokenRandom
        ];

        try {
            PasswordResetToken::create([
                'email' => $data['email'],
                'token' =>  $data['token']
            ]);

            // Email sent successfully, return a success response
            Mail::to($data['email'])->send(new RecoverPasswordNotifycation($data));
            return response()->json([
                'message' => 'We have sent a reset password link to your email address',
                'success' => true,
            ], 200);
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
        $email = $request->email;
        $token = $request->token;

        // Find email and token is valid in password_reset_token
        $exists = PasswordResetToken::where('email', $email)
            ->where('token', $token)
            ->exists();

        if (!$exists) {
            return response()->json([
                'message' => 'Imposible to reset password',
                'success' => false
            ], 404);
        }

        return response()->json([
            'message' => 'Posible to reset password',
            'success' => true
        ], 200);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $email = $request->email;
        $token = $request->token;
        $newPassword = $request->new_password;

        // Find email and token is valid in password_reset_token
        $exists = PasswordResetToken::where('email', $email)
            ->where('token', $token)
            ->exists();

        if (!$exists) {
            return response()->json([
                'message' => 'Email or token is invalid',
                'success' => false
            ], 404);
        }

        // Update password by email
        $user = User::where('email', '=', $email)->first();
        $user->password = bcrypt($newPassword);
        $user->save();
        // Delete token in password_reset_tokens
        PasswordResetToken::where('email', '=', $email)->delete();

        return response()->json([
            'message' => 'Password changed successfully',
            'success' => true
        ], 200);
    }
}
