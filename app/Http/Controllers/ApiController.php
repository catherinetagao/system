<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
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

        $validatedData = $request->validate([
            'product_image' => 'required|image|max:2048', // Example: Allow only image files up to 2MB
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);

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
        $product->name=$validatedData['product_name'];
        $product->desc=$validatedData['description'];
        $product ->price=$validatedData['price'];
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
        // dd($id);
        $product =  Product::find($id);
        // Delete the associated image file if it exists
        if ($product->image_data) {
            $imagePath = public_path($product->image_data); // Get the full path to the image
            if (File::exists($imagePath)) {
                File::delete($imagePath); // Delete the image file
            }
        }

        if($product->delete()){
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
        $validatedData = $request->validate([
            'product_image' => 'required|image|max:2048', // Example: Allow only image files up to 2MB
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric'
        ]);

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

        // dd($imageUrl)

        $product = Product::find($id)->update([
            "image_data"=>$imageUrl,
            "name"=>$validatedData['product_name'],
            "desc"=>$validatedData['description'],
            "price"=>$validatedData['price'],
        ]);

        if($product){
            return response()->json(['message'=>'Product updated successfully'], 201);
        }else{
            return response()->json(['message'=>'Product not updated'], 500);
        }
        // return response()->json(['message'=>'delete','id'=>$id],200);
    }
}
