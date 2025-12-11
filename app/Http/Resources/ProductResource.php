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
        $resource =  [
            'id' => $this->id,
            'product_name' => $this->product_name,
            'product_code' => $this->product_code,
            'product_price' => $this->product_price,
            'product_quantity' => $this->product_quantity,
            'product_image' => $this->product_image
        ];
        if(isset($request['min'])){
            $resource['min'] = $this->min;
        }
        if(isset($request['max'])){
            $resource['max'] = $this->max;
        }
        return $resource;
    }
}
