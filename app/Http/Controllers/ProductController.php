<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Galery;
use App\Models\Link;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'storeadmin') {
            $store = Store::where('user_id', Auth::user()->id)->with('products')->first();
            $product = $store->products;
        } else {
            $product = Product::all();
        }
        return view('master.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('master.product.create', compact('category'));
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
        $product->store_id = Auth::user()->store->id;
        $category = Category::find($request->category_id);
        if ($category) {
            $product->category_id = $request->category_id;
        } else {
            $newCategory = new Category();
            $newCategory->name = $request->category_id;
            $newCategory->save();
            $product->category_id = $newCategory->id;
        }

        $file = $request->file('foto');
        if ($request->hasFile('foto')) {
            $nama_file = date('y-m-d') . $file->getClientOriginalName();
            $file->move('storage/images/product/', $nama_file);
            $product->foto = $nama_file;
        }
        $product->save();
        if ($request->gallery) {
            foreach ($request->gallery as $gallery) {
                $file = $gallery;
                $newGallery = new Galery();
                $nama_file = date('y-m-d') . $file->getClientOriginalname();
                $newGallery->name = $nama_file;
                $file->move('storage/images/product/gallery/', $nama_file);
                $newGallery->product_id = $product->id;
                $newGallery->save();
            }
        };

        if ($request->item) {
            foreach ($request->item as $links) {
                $link = new Link();
                $link->name = $links['name'];
                $link->link = $links['link'];
                $link->product_id = $product->id;
                $link->save();
            }
        }


        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }
    public function userShow(Product $product)
    {
        return view('master.product.user.show', compact('product'));
    }

    public function confirm(Product $product)
    {
        $product->is_accept = true;
        $product->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('master.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        if ($request->has('category_id')) {
            $category = Category::find($request->category_id);
            if ($category) {
                $product->category_id = $request->category_id;
            } else {
                $newCategory = new Category();
                $newCategory->name = $request->category_id;
                $newCategory->save();
                $product->category_id = $newCategory->id;
            }
        }
        foreach ($product->link as $link) {
            $link->delete();
        }
        $file = $request->file('foto');
        if ($request->hasFile('foto')) {
            unlink(public_path('storage/images/product/' . $product->foto));
            $nama_file = date('y-m-d') . $file->getClientOriginalName();
            $file->move('storage/images/product/', $nama_file);
            $product->foto = $nama_file;
        }
        if ($request->gallery) {
            foreach ($product->gallery as $galery) {
                $galery->delete();
            }
            foreach ($request->gallery as $gallery) {
                $file = $gallery;
                $newGallery = new Galery();
                $nama_file = date('y-m-d') . $file->getClientOriginalname();
                $newGallery->name = $nama_file;
                $file->move('storage/images/product/gallery/', $nama_file);
                $newGallery->product_id = $product->id;
                $newGallery->save();
            }
        };
        foreach ($request->item as $links) {
            $link = new Link();
            $link->name = $links['name'];
            $link->link = $links['link'];
            $link->product_id = $product->id;
            $link->save();
        }
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

    public function userIndex()
    {
        $product = Product::all()->sortByDesc('created_at');
        return view('master.product.user.index', compact('product'));
    }
}
