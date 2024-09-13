<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;
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
    $queryCount = clone $query;

    if (!$limit) {
      $products = $query->get();
    } else {
      $offset = Pagination::offset($page, $limit);
      $products = $query->skip($offset)->take($limit)->orderBy('id', 'desc')->get();
    }

    return response()->json([
      "success" => true,
      'data' => [
        'count' => $queryCount->count(),
        'rows' => ProductResource::collection($products),
      ]
    ]);
  }

  public function show(Request $request, int $id)
  {
    $product = Product::find($id);
    if (!$product) {
      return Response()->json(['success' => false, 'message' => 'Product not found'], 404);
    }

    $request['includeProductImages'] = true; // include productImages in ProductResource

    return Response()->json(['success' => true, 'data' => new ProductResource($product)], 200);
  }

  public function store(CreateProductRequest $request)
  {
    $product = Product::storeProduct($request);

    // Handle multiple file upload
    if ($request->hasFile('images')) {
      foreach ($request->allFiles('images') as $image) {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        ProductImage::create([
          'fk_product_id' => $product->id,
          'name' => $imageName,
          'path' => $imageName,
        ]);
      }
    }

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
