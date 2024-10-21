<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $user = Auth::user();

        try {
            $amount = array_reduce($request->items, function ($carry, $item) {
                Product::find($item["fk_product_id"])
                    ->decrement('quantity', $item["quantity"]);

                return $carry + ($item["price"] * $item["quantity"]);
            }, 0);
            $orderPayload = [
                'fk_user_id' => $user->id,
                'amount' => $amount,
                'contact_name' => $request->address["name"],
                'email' => $request->address["email"],
                'telephone' => $request->address["telephone"],
                'company' => $request->address["company"],
                'address1' => $request->address["address1"],
                'address2' => $request->address["address2"],
                'city' => $request->address["city"],
                'post_code' => $request->address["post_code"],
                'country' => $request->address["country"],
                'region' => $request->address["region"],
            ];
            $newOrder = Order::create($orderPayload);

            $orderProductsPayload = collect($request->items)
                ->map(function ($item) use ($newOrder) {
                    return [
                        'fk_order_id' => $newOrder->id,
                        'fk_product_id' => $item["fk_product_id"],
                        'unit_price' => $item["price"],
                        'quantity' => $item["quantity"],
                    ];
                });
            OrderProduct::insert($orderProductsPayload->all());

            $paymentPayload = [
                'fk_order_id' => $newOrder->id,
                'amount' => $amount,
                'currency' => $request->currency,
                'source' => $request->stripeToken,
                'payment_method_type' => $request->paymentMethodType,
                'description' => $user->email,
            ];
            Payment::create($paymentPayload);

            // Charge::create([
            //     'amount' => $amount * 100,
            //     'currency' => $request->currency,
            //     'source' => $request->stripeToken,
            //     'description' => $user->email,
            // ]);

            Cart::where('fk_user_id', $user->id)->delete();

            DB::commit();
            return response()->json([
                'message' => 'Payment successful!',
                'success' => true
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
