<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use Response;

class CategoryController extends Controller
{
    //View all categories
    public function index()
    {
        $category = Category::orderBy('created_at', 'asc')->get();

        return view('categories.index', [
            'categories' => $category,
        ]);
    }

    //Creat new category
    public function create(Request $request)
    {
        //Validate form data
        $validator = \Validator::make($request->all(), [
            'name'        => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            //Redirect to home with errors
            return Response::json([
                    'errors' => $validator->getMessageBag()->toArray(),
                ]
            );
        }

        //prepare new category and insert into database
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return Response::json($category);
    }

    //View single category
    public function single($category)
    {
        //Get category information
        $category = Category::with('products.user')->where('id', $category)->first();

        if (!$category) {
            //redirect to main page if category not found
            return redirect('/')->withErrors('Category not found');
        } else {

            //View single category
            $products = $category->products;

            return view('categories.single', [
                'category' => $category,
                'products' => $products,
            ]);
        }
    }

    //Update Category
    public function update(Request $request, Category $category)
    {
        //Validate form data
        $validator = \Validator::make($request->all(), [
            'name'        => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            //Redirect to home with errors
            return Response::json([
                    'errors' => $validator->getMessageBag()->toArray(),
                ]
            );
        }

        //prepare category and update into database
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return Response::json($category);
    }

    //Delete Category
    public function delete(Category $category)
    {
        $category = $category->delete();

        return Response()->json();
    }
}
