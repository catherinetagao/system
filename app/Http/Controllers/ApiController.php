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

        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = $this->sanitizeFileName($image->getClientOriginalName());

            // Store the image in the public/images folder
            $image->storeAs('public/images', $imageName);

            // Generate a URL for the stored image
            $imageUrl = 'storage/images/' . $imageName;
        } else {
            $imageUrl = null;
        }
        $product->name=$request->product_name;
        $product->desc=$request->description;
        $product ->price=$request->price;
        $product ->image_data =$imageUrl;

        if($product->save()){
            return response()->json(['message'=>'Product created successfully'], 201);
        }else{
            return response()->json(['message'=>'Product not created'], 500);
        }

        // return 'heheheh';
    }

    public function sanitizeFileName($fileName) {
        // Remove leading and trailing spaces
        $fileName = trim($fileName);
    
        // Replace spaces with underscores or another character of your choice
        $fileName = str_replace(' ', '_', $fileName);
    
        // Remove special characters and any potentially harmful characters
        $fileName = preg_replace('/[^\w\-.]/', '', $fileName);
    
        // Ensure the file name doesn't start with a dot (hidden file)
        $fileName = ltrim($fileName, '.');
    
        // Limit the file name length (you can set your own maximum length)
        $maxFileNameLength = 255; // Maximum file name length
        $fileName = substr($fileName, 0, $maxFileNameLength);
    
        return $fileName;
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
        if ($request->hasFile('product_image')) {
            $image = $request->file('product_image');
            $imageName = $this->sanitizeFileName($image->getClientOriginalName());

            // Store the image in the public/images folder
            $image->storeAs('public/images', $imageName);

            // Generate a URL for the stored image
            $imageUrl = 'storage/images/' . $imageName;
        } else {
            $imageUrl = null;
        }

        // dd($imageUrl);

        $product = Product::find($id)->update([
            "image_data"=>$imageUrl,
            "name"=>$request->product_name,
            "desc"=>$request->description,
            "price"=>$request->price,
        ]);

        if($product){
            return response()->json(['message'=>'Product updated successfully'], 201);
        }else{
            return response()->json(['message'=>'Product not updated'], 500);
        }
        // return response()->json(['message'=>'delete','id'=>$id],200);
    }
}
