<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge(parent::toArray($request), [
            'category'=> new CategoryResource($this->category),
            'productImages'=> $this->productImages,
            'productImages'=> $request->query('includeProductImages')
                ? $this->productImages : null
        ]);
    }
}
