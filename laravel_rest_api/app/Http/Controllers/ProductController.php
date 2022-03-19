<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //getProduct
    public function getProduct(){
        return response()->json(product::all(),200);
    }
    // by id 
    public function getProductByuId($id){
        $product =product ::find($id);
        if(is_null($product)){
         return response()->json (['message' =>'produit introuvable'],404);
        }
    
    return response()->json(product::find($id),200);
    
    }
     // add product
     public function addProduct (request $request){
         $product = Product::create($request->all()); 
         return response($product,201);
     }

     //update product
    public function updateProduct(Request $request, $id){
     $product =product ::find($id);
     if(is_null($product)){
      return response()->json (['message' =>'produit introuvable'],404);
     }
     $product-> update ($request ->all());
     return response ($product,200);

}
//delete product
public function deleteProduct(Request $request, $id){
    $product =product ::find($id);
    if(is_null($product)){
     return response()->json (['message' =>'produit introuvable'],404);
    }
    $product->delete ();
    return response (null,204);

}
}