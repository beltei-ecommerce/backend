<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = Address::where('fk_user_id', $user->id)
            ->where('disable', false)
            ->get();

        return response()->json([
            "success" => true,
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $payload = array_merge($request->all(), ['fk_user_id' => $user->id]);
        Address::create($payload);
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = Auth::user();
        $address = Address::find($id);
        if (!$address) {
            return response()->json(['success' => 'No address found'], 404);
        }

        if ($request->is_default) {
            Address::where('fk_user_id', $user->id)
                ->where('is_default', true)
                ->update(['is_default' => false]);
        }

        Address::where('id', $id)->update($request->all());
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = Auth::user();
        $address = Address::find($id);
        if (!$address) {
            return response()->json(['success' => 'No address found'], 404);
        }

        $address->disable = true;

        if ($address->is_default) {
            $address->is_default = false;
            $addressDefault = Address::where('fk_user_id', $user->id)
                ->where('disable', false)
                ->first();
            $addressDefault->is_default = true;
            $addressDefault->save();
        }

        $address->save();
        return response()->json(['success' => true]);
    }
}
