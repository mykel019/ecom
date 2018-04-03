<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductsController extends Controller
{
   
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }


    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('admin.products.create',compact('categories'));
    }



    public function store(Request $request)
    {
        $formInput = $request->except('image');

        //validation

        $this->validate($request,[
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        //image upload
        $image = $request->image;
        if($image){
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;
        }

        $result = Product::create($formInput);

        return redirect()->route('admin.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
