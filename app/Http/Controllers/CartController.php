<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $data = Cart::where('fk_user_id', $user->id)->get();

        return response()->json([
            "success" => true,
            'data' => CartResource::collection($data)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $cart = Cart::where('fk_user_id', $user->id)
            ->where('fk_product_id', $request->fk_product_id)->first();
        if ($cart) {
            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
            return response()->json(['success' => true]);
        }

        $payload = array_merge($request->all(), ['fk_user_id' => $user->id]);
        Cart::create($payload);
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $cart = Cart::where('id', $id)->first();
        if (!$cart) {
            return response()->json(
                [
                    'success' =>  false,
                    'message' => 'No cart found'
                ],
                404
            );
        }

        $cart->quantity = $request->quantity;
        $cart->save();
        return response()->json(['success' =>  true],);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $cart = Cart::where('id', $id)->first();
        if (!$cart) {
            return response()->json(
                [
                    'success' =>  false,
                    'message' => 'No cart found'
                ],
                404
            );
        }

        $cart->delete();
        return response()->json(['success' =>  true],);
    }
}
