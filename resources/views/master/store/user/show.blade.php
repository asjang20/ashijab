<x-layouts.user>

    <div class="space-y-5">
        <div class=" flex items-center gap-3 border rounded-lg p-3 border-gray-500 bg-white">
            <img src="{{ asset('storage/images/store') }}/{{ $store->logo }}" alt=""
                class="h-28 rounded-full border object-cover w-2h-28 shadow-lg">
            <div class="flex flex-col justify-between">
                <p class="font-extrabold text-lg">{{ $store->name }}</p>
                <p>{{ $store->user->email }}</p>
                <p>{{ $store->telp }}</p>
                <div class="flex gap-3 items-center">
                    @foreach ($store->merchant as $item)
                        <div>
                            <a href="{{ $item->link }}">
                                <img src="{{ asset('storage/images/merchant/icon') }}/{{ $item->icon }}" class="h-7"
                                    alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="space-y-5">
            <p class="text-2xl font-bold">Daftar Produk</p>
            <div class="grid grid-cols-5 gap-10">
                @foreach ($store->products as $item)
                    <a href="{{ route('user.product.show', $item->id) }}" class="shadow-lg rounded-lg bg-white">
                        <img src="{{ asset('storage/images/product/') }}/{{ $item->foto }}" alt=""
                            class="aspect-square object-cover rounded-t-lg mb-1">
                        <div class="p-3">
                            <p class="mb-1 font-bold line-clamp-1">{{ $item->name }}</p>
                            <div class="flex gap-3 items-end">
                                <p class="text-green-500 font-bold text-sm">Rp.
                                    {{ number_format($item->price, 0, ',', '.') }}</p>
                                <p class="line-through text-gray-600 text-xs">Rp.
                                    {{ number_format($item->price, 0, ',', '.') + 2000 }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.user>
