<?php

namespace App\Service;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    private readonly Product $productModel;
    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }
    public function store($data)
    {
        if (isset($data['product_image'])) {
            $data['product_image'] = Storage::put($data['product_image'],'');
        }
        $product = $this->productModel->create($data);
        if ($product) {
            return true;
        }
        return false;
    }

    public function update($data, $id)
    {
        $product = $this->productModel->findOrFail($id);
        if (isset($data['product_image'])) {
            Storage::delete($product->product_image);
            $data['product_image'] = Storage::put($data['product_image'],'');
        }
        if ($product->update($data)) {
            return true;
        }
        return false;
    }

    public function paginate($request){
        $product = $this->productModel->newQuery();
        if(isset($request['name'])){
            $product->where('product_name','like','%'.$request->name.'%');
        }
        if(isset($request['max'])){
            $product->select('Max(product_price) AS max');
        }
        if(isset($request['min'])){
            $product->select('Min(product_price) AS min')->min();
        }
        return ProductResource::collection($product->paginate());
    }

    public function delete($id){
        $product= $this->productModel->findOrFail($id);
        if($product){
            // Storage::delete($product->product_image);
            return $product->delete();
        }
        return false;
    }
}
