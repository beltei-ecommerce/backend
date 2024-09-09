<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return response()->json(["success" => true, "data" => $categories], 200);
    }

    public function show($id)
    {
        $category = Category::find($id);
        return Response()->json(['success' => true, 'data' => $category], 200);
    }

    public function store(Request $request)
    {
        $data = Category::storeCategory($request->name);
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function update(Request $request, int $id)
    {
        $data = Category::storeCategory($request->name, $id);
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function destroy(int $id)
    {
        Category::find($id)->delete();
        return response()->json(['success' => true]);
    }
}
