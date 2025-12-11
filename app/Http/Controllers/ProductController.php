<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Service\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    private readonly ProductService $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request){
        return $this->productService->paginate($request);
    }

    public function create(){
        return view('Product');
    }

    public function updateForm($id){
        return view('UpdatePost');
    }

    public function store(StoreProductRequest $request)
    {
            $product = $this->productService->store($request->validated());
            if ($product) {
                return response()->json(["message"=>"product created successfully"]);
            }
            return response()->json(["message" => "product created failed"]);
        }
        

    public function update(UpdateProductRequest $request,$id)
    {
        $product = $this->productService->update($request->validated(),$id);
        if($product){
            return response()->json(['message'=>"product updated"]);
        }
        return response()->json(['message'=>"failed to update"]);
    }

    public function delete($id){
        $product = $this->productService->delete($id);
        if($product){
            return response()->json(['message'=>"product delete successfully"]);
        }
        return response()->json(['message'=>"product delete failed"]);
    }
}
