<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $store = Store::all();
        return view('master.store.index', compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.store.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = new Store();
        $store->name = $request->name;
        $store->description = $request->description;
        $store->address = $request->address;
        $store->telp = $request->telp;
        $store->user_id = Auth::user()->id;


        $file = $request->file('logo');
        if ($request->hasFile('logo')) {
            $nama_logo = date('y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('storage/images/store/'), $nama_logo);
            $store->logo = $nama_logo;
        }

        $store->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }
    public function userShow(Store $store)
    {
        return view('master.store.user.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        return view('master.store.edit', compact('store'));
    }

    public function confirm(Store $store)
    {
        $store->is_accept = true;
        $store->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $store->name = $request->name;
        $store->description = $request->description;
        $store->address = $request->address;
        $store->telp = $request->telp;

        $file = $request->file('logo');
        if ($request->hasFile('logo')) {
            unlink('storage/images/store/' . $store->logo);
            $nama_logo = date('y-m-d') . $file->getClientOriginalName();
            $file->move(public_path('storage/images/store/'), $nama_logo);
            $store->logo = $nama_logo;
        }

        $store->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('product.index');
    }
}
