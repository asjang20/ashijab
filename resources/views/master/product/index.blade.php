<x-app-layout>
    <div class="space-y-3 bg-white p-5 rounded-lg">
        <div class="py-3 flex justify-center items-center flex-col">
            <img class="h-20 rounded-full object-cover" src="{{asset('storage/images/store')}}/{{Auth::user()->store->logo}}" alt="">
            <p class="text-lg font-medium">{{Auth::user()->store->name}}</p>
            <p class="">{{Auth::user()->store->telp}}</p>
            <a href="{{ route('store.edit',Auth::user()->store->id) }}" class="text-blue-500 text-xs"  >Ubah Profil Toko</a>
        </div>
        <a href="{{ route('product.create') }}" class="bg-green-500 hover:bg-green-400 text-white rounded-lg border shadow px-10 py-2"> Tambah Produk</a>
        <div class="relative">
            <div class="rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-green-500 text-white">
                        <tr>
                            <td class="px-3 py-1">No.</td>
                            <td class="px-3 py-1">Nama Produk</td>
                            <td class="px-3 py-1 text-center">Gambar Produk</td>
                            <td class="px-3 py-1">Harga</td>
                            <td class="px-3 py-1">Kategori</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td class="px-3 py-1">{{$loop->index+1}}</td>
                                <td class="px-3 py-1">{{$item->name}}</td>
                                <td class="px-3 py-1"><img class="h-20 mx-auto" src="{{ asset('storage/images/product/') }}/{{$item->foto}}" alt=""></td>
                                <td class="px-3 py-1">Rp. {{number_format($item->price,0,',','.')}}</td>
                                <td class="px-3 py-1">{{$item->category->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>