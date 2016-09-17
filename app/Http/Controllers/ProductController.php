<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

use App\Product;

use Response;

// use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    //Create new product
    public function create(Request $request){
	    //Validate form data
	    $validator = \Validator::make($request->all(), [
	        'name' => 'required|max:255',
	        'description' => 'required|max:255',
	        'category' => 'required',
	        'image' => 'required|mimes:jpeg,png',
	    ]);

	    if ($validator->fails()) {
	        //redirect to the same page with errors
	        return Response::json(array(
	        		'errors' => $validator->getMessageBag()->toArray()
	        	)
	        );
	    }
	    //Image upload
	    $file_name = $request->file('image')->getClientOriginalName();
	    $upload_folder = 'products/images/';

	    $request->file('image')->move($upload_folder, $file_name);
	    $image = $upload_folder.$file_name;
	    
	    //prepare new product and insert into database
	    $product = new Product;
	    $product->name = $request->name;
	    $product->description = $request->description;
	    $product->image = $image;
	    $product->category_id = $request->category;
	    $product->user_id = $request->user()->id;
	    $product->save();
	    $product->user_id = $request->user()->name;
	    //redirect to the same page to show changes
	    return Response::json($product);
	}

	//Update Product
	public function update(Request $request, Product $product){
		//Validate form data
	    $validator = \Validator::make($request->all(), [
	        'name' => 'required|max:255',
	        'description' => 'required|max:255',
	    ]);

	    if ($validator->fails()) {
	    	//Redirect to home with errors
	        return Response::json(array(
	        		'errors' => $validator->getMessageBag()->toArray()
	        	)
	        );
	    }

	    //prepare product and update into database
		$product->name = $request->name;
	    $product->description = $request->description;
	    $product->save();

	    return Response::json($product);
	}

	//View single product
	public function single($product){
		$product = Product::where('id', $product)->first();

		return view('products.single', [
			'product' => $product
		]);
	}
	
	//Delete product
	public function delete(Product $product){
	    $product->delete();

	    return Response()->json();
	}
}
