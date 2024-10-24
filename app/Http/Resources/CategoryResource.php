<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $request['include_product_images'] = true;

        return array_merge(parent::toArray($request), [
            'number_of_products' => $this->products->count(),
        ]);
    }
}
