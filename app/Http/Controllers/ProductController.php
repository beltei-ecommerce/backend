<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Utils\Pagination;
// use Illuminate\Support\Facades\Log;
// Bebug
// Log::debug('Fetching products with name:', ['name' => $name]);
// tail -f storage/logs/laravel.log

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $page = $request->query('page');
    $limit = $request->query('limit');
    $name = $request->query('name');

    $query = Product::query()->where('name', 'like', '%' . $name . '%');

    if (!$limit) {
      $products = $query->get();
    } else {
      $offset = Pagination::offset($page, $limit);
      $products = $query->skip($offset)->take($limit)->get();
    }

    return response()->json([
      "success" => true,
      'data' => [
        'count' => $query->count(),
        'rows' => ProductResource::collection($products),
      ]
    ]);
  }

  public function show($id)
  {
    $product = Product::find($id);
    return Response()->json(['success' => true, 'data' => new ProductResource($product)], 200);
  }

  public function store(CreateProductRequest $request)
  {
    $product = Product::storeProduct($request);
    return response()->json(['success' => true, 'data' => new ProductResource($product)], 200);
  }

  public function update(CreateProductRequest $request, $id)
  {
    $product = Product::storeProduct($request, $id);
    return response()->json(['success' => true, 'data' => new ProductResource($product)], 200);
  }

  public function destroy(int $id)
  {
    Product::find($id)->delete();
    return Response()->json(['success' => true], 200);
  }
}
