<x-layouts.user>
    <div class="gap-5 flex">
        <div class="w-1/2">
            <div class="shadow-lg rounded-lg overflow-hidden sticky top-20">
                <img src="{{ asset('storage/images/product') }}/{{ $product->foto }}"
                    class="object-contain rounded-lg hover:scale-105 transition-all duration-1000 w-full">
            </div>
        </div>
        <div class="w-1/2">
            <div class="p-5 space-y-3 rounded-lg">
                <p class="font-semibold text-2xl uppercase">{{ $product->name }}</p>
                <div class="flex items-center">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-4 h-4 text-orange-400 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                    @endfor
                </div>
                <div>
                    <p class="text-sm line-through text-gray-400 font-semibold font-poppins">Rp.
                        {{ number_format($product->price + ($product->price * 21) / 100, 0, ',', '.') }}
                    </p>
                    <p class="text-xl font-semibold font-poppins">Rp.
                        {{ number_format($product->price, 0, ',', '.') }}
                    </p>
                </div>
                <div class="pt-3">
                    <a href="{{ route('user.store.show', $product->store->id) }}">
                        <div class="border rounded-lg p-3 flex gap-3 items-center">
                            <img src="{{ asset('storage/images/store/') }}/{{ $product->store->logo }}"
                                class="w-10 h-10 rounded-full object-cover" alt="">
                            <p class="font-extrabold text-lg">{{ $product->store->name }}</p>
                        </div>
                    </a>
                </div>
                <div class="border rounded-lg p-5">
                    <p class="font-extrabold text-lg border-b pb-2">Deskripsi</p>
                    <p class="p-2">{{ $product->description }}</p>
                </div>
                <div id="showLink" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <p>Pesan Sekarang</p>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="showLink">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <ul class="space-y-3">
                                    @foreach ($product->link as $item)
                                        <div>
                                            <a href="{{ $item->link }}" class="">
                                                <div
                                                    class="w-full rounded-lg border bg-gray-50 shadow-lg px-3 py-1 text-center">
                                                    {{ $item->name }}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" data-modal-target="showLink" data-modal-toggle="showLink"
                    class="bg-orange-400 w-full py-2 text-sm text-white rounded-lg hover:bg-orange-500 font-medium uppercase tracking-widest">Pesan
                    Sekarang</button>
            </div>
        </div>
    </div>
</x-layouts.user>
