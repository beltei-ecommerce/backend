<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $disable = $request->query('disable') || false;

        $data = Order::where('fk_user_id', $user->id)->where('disable', $disable)
            ->orderBy('created_at', 'desc')->get();

        return response()->json([
            "success" => true,
            'data' => OrderResource::collection($data)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['success' => 'No order found'], 404);
        }

        $order->disable = true;
        $order->save();
        return response()->json(['success' => true]);
    }
}
