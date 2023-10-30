<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getProducts(){
        $products=Product::all();

        return response()->json($products);
        
    }

    public function createProduct(Request $request){
        // dd($request);

        $product = new Product();

        $product->name=$request->formData['product_name'];
        $product->desc=$request->formData['description'];
        $product ->price=$request->formData['price'];
        $product ->image_data ="hahahha";

        if($product->save()){
            return response()->json(['message'=>'Product created successfully'], 201);
        }else{
            return response()->json(['message'=>'Product not created'], 500);
        }

        // return 'heheheh';
    }

    
    public function deleteProduct($id){
        $product =  Product::find($id)->delete();

        if($product){
            return response()->json(['message'=>'Product deleted successfully'], 201);
        }else{
            return response()->json(['message'=>'Product not deleted'], 500);
        }
        // return response()->json(['message'=>'delete','id'=>$id],200);
    }

    public function getProduct($id){
        $product = Product::find($id);

        if($product){
            return response()->json($product);
        }else{
            return response()->json();
        }
    }

    public function updateProduct($id,Request $request){
        // dd($request);

        $product = Product::find($id)->update([
            "name"=>$request->formData['product_name'],
            "desc"=>$request->formData['description'],
            "price"=>$request->formData['price'],
        ]);

        if($product){
            return response()->json(['message'=>'Product updated successfully'], 201);
        }else{
            return response()->json(['message'=>'Product not updated'], 500);
        }
        // return response()->json(['message'=>'delete','id'=>$id],200);
    }
}
