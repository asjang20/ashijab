<x-layouts.user>
    <div>
        <div class="grid grid-cols-5 gap-10">
            @foreach ($product as $item)
                <a href="{{ route('user.product.show', $item->id) }}" class="shadow-lg rounded-lg">
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
</x-layouts.user>
