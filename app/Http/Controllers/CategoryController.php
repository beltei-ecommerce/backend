<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Utils\Pagination;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->query('page');
        $limit = $request->query('limit');
        $name = $request->query('name');

        $query = Category::query()->where('name', 'like', '%' . $name . '%');
        $queryCount = clone $query;

        if (!$limit) {
          $categories = $query->get();
        } else {
          $offset = Pagination::offset($page, $limit);
          $categories = $query->skip($offset)->take($limit)->orderBy('id', 'desc')->get()->makeVisible('created_at');
        }

        return response()->json([
            "success" => true,
            'data' => [
              'count' => $queryCount->count(),
              'rows' => CategoryResource::collection($categories),
            ]
          ]);
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
