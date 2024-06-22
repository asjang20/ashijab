<x-app-layout>
    @if (Auth::user()->role == 'storeadmin' && Auth::user()->store->is_accept == false)
        <div class="bg-white p-5 rounded-lg">
            <p class="text-lg font-medium text-center">
                Toko Anda Sedang Dalam Pengajuan. Tunggu Beberapa Saat lagi.
            </p>
        </div>
    @else
        <div class="space-y-3 bg-white p-5 rounded-lg">
            @if (Auth::user()->role == 'storeadmin')
                <div class="py-3 flex justify-center items-center flex-col">
                    <img class="h-20 rounded-full object-cover w-20"
                        src="{{ asset('storage/images/store') }}/{{ Auth::user()->store->logo }}" alt="">
                    <p class="text-lg font-medium">{{ Auth::user()->store->name }}</p>
                    <p class="">{{ Auth::user()->store->telp }}</p>
                    <a href="{{ route('store.edit', Auth::user()->store->id) }}" class="text-blue-500 text-xs">Ubah
                        Profil
                        Toko</a>
                </div>
                <a href="{{ route('product.create') }}"
                    class="bg-green-500 hover:bg-green-400 text-white rounded-lg border shadow px-10 py-2"> Tambah
                    Produk</a>
            @else
                <button class="text-white bg-green-500 rounded-lg hover:bg-green-600 px-5 py-2"
                    data-modal-target="confirm-product" data-modal-toggle="confirm-product">
                    <p>
                        Konfirmasi Produk
                        <span class="text-xs">(
                            {{ $product->where('is_accept', false)->count() }} )</span>
                    </p>
                </button>
                <x-modal.confirm-product :product="$product->where('is_accept', false)"> </x-modal.confirm-product>
            @endif
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
                                @if (Auth::user()->role == 'superadmin')
                                    <td class="px-3 py-1">Status</td>
                                @endif
                                <td class="px-3 py-1 text-center">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    <td class="px-3 py-1">{{ $loop->index + 1 }}</td>
                                    <td class="px-3 py-1">{{ $item->name }}</td>
                                    <td class="px-3 py-1"><img class="h-20 mx-auto"
                                            src="{{ asset('storage/images/product/') }}/{{ $item->foto }}"
                                            alt="">
                                    </td>
                                    <td class="px-3 py-1">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                    <td class="px-3 py-1">{{ $item->category->name }}</td>
                                    @if (Auth::user()->role == 'superadmin')
                                        <td class="px-3 py-1">{{ $item->is_accept ? 'Accepted' : 'Pending' }}</td>
                                    @endif
                                    <td class="px-3 py-1 h-full w-min">
                                        <div class="flex items-center justify-center gap-3 h-full">
                                            <a href="{{ route('product.edit', $item->id) }}"
                                                class="text-blue-500">Edit</a>
                                            <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-500" type="submit">Hapus</button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
