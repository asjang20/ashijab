<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('master.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('master.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $category = Category::find($request->category_id);
        if($category){
            $product->category_id = $request->category_id;
        }else{
            $newCategory = new Category();
            $newCategory->name = $request->category_id;
            $newCategory->save();
            $product->category_id = $newCategory->id;
        }

        $file = $request->file('foto');
        if($request->hasFile('foto')){
            $nama_file = date('y-m-d') . $file->getClientOriginalName();
            $file->move('storage/images/product/',$nama_file);
            $product->foto = $nama_file;
        }
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
