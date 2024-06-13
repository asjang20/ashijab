<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\Store;
use Illuminate\Http\Request;

use function PHPUnit\Framework\fileExists;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Store $store)
    {
        foreach ($request->item as $item) {
            $merchant = new Merchant();
            $merchant->name = $item['name'];
            $merchant->link = $item['link'];
            $file = $item['icon'];
            $nama_file = date('y-m-d') . $file->getClientOriginalname();
            $file->move('storage/images/merchant/icon/', $nama_file);
            $merchant->icon = $nama_file;
            $merchant->save();
            $store->merchant()->attach($merchant->id);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        $merchant->delete();
        $image = public_path('storage/images/merchant/icon/' . $merchant->icon);
        if (fileExists($image)) {
            unlink($image);
        };
        return redirect()->back();
    }
}
