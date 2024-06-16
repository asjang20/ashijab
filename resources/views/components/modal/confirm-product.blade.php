@props(['product' => null])
<div id="confirm-product" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Konfirmasi Toko
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="confirm-product">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <ul>
                    @if ($product)
                        @foreach ($product as $item)
                            <li>
                                <div class="flex gap-3">
                                    <div class="flex gap-3 w-full border rounded-lg p-3">
                                        <img src="{{ asset('storage/images/product') }}/{{ $item->foto }}"
                                            class="w-20 h-20 object-cover rounded-lg" alt="">
                                        <div class="flex flex-col justify-between">
                                            <p class="text-lg font-medium">{{ $item->name }}</p>
                                            <p class="text-start line-clamp-2">Rp.
                                                {{ number_format($item->price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('product.confirm', $item->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit"
                                            class="rounded-lg border w-10 h-10 flex justify-center items-center bg-green-500">
                                            <svg viewBox="0 0 24 24" class="w-7" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4 12.6111L8.92308 17.5L20 6.5" stroke="white" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li class="p-3 border rounded-lg text-center"> Tidak Ada Toko</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
