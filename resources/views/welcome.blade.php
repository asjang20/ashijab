<x-layouts.user>

    <div>
        <div class=" max-w-5xl mx-auto w-full mb-7">
            <div class="swiper">
                <div class="swiper-wrapper">

                    @for ($i = 0; $i < 5; $i++)
                        <div class="swiper-slide">
                            <img src="https://cdn.shopify.com/s/files/1/0323/3808/3979/files/Banner_website_3cea3acb-3e08-45d6-89f8-c2cd48e4d5c0_1024x1024.jpg?v=1717583424"
                                alt="" class="w-full max-h-60 h-full object-cover">
                        </div>
                    @endfor
                </div>
                <div class="swiper-scrollbar">
                </div>
            </div>
        </div>
        <div class="mb-10">
            <div class="mb-5">
                <div class="flex gap-2 items-center mb-3">
                    <div class="h-6 w-3 bg-green-500 rounded-sm">
                    </div>
                    <p class="text-green-500 text-sm font-bold">
                        Categories
                    </p>
                </div>
                <p class="text-xl font-bold">Kategori</p>
            </div>
            <div class="flex flex-wrap justify-center items-end gap-4 text-sm">
                @foreach ($category as $item)
                    <div class=" border rounded-md p-5 border-gray-400">
                        <p>{{$item->name}}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-full border-t border-gray-300 mb-7">
        </div>

        <div class="mb-7">
            <div class="mb-5">
                <div class="flex gap-2 items-center mb-3">
                    <div class="h-6 w-3 bg-green-500 rounded-sm">
                    </div>
                    <p class="text-green-500 text-sm font-bold">
                        New Product
                    </p>
                </div>
                <p class="text-xl font-bold">Product Terbaru</p>
            </div>
            <div class="w-full flex justify-end">
                <button
                    class="px-10 py-2 bg-green-500 text-white  rounded-lg text-sm my-7 hover:bg-green-400 transition-all duration-500">
                    View All
                    Products</button>
            </div>
            <div>
                <div class="grid grid-cols-4 gap-10">
                    @foreach ($product as $item)
                        <div class="shadow-lg rounded-lg">
                            <img src="{{asset('storage/images/product/')}}/{{$item->foto}}"
                                alt="" class="aspect-square object-cover rounded-t-lg mb-1">
                            <div class="p-3">
                                <p class="mb-1 font-bold line-clamp-1">{{$item->name}}</p>
                                <div class="flex gap-3 items-end">
                                    <p class="text-green-500 font-bold text-sm">Rp. {{$item->price}}</p>
                                    <p class="line-through text-gray-600 text-xs">Rp. {{$item->price + 2000}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="mb-7">
            <div class="mb-5">
                <div class="flex gap-2 items-center mb-3">
                    <div class="h-6 w-3 bg-green-500 rounded-sm">
                    </div>
                    <p class="text-green-500 text-sm font-bold">
                        Our Products
                    </p>
                </div>
                <p class="text-xl font-bold">Explore Our Products</p>
            </div>
            <div>
                <div class="grid grid-cols-4 gap-10">
                    @foreach ($product as $item)
                        <div class="shadow-lg rounded-lg">
                            <img src="{{asset('storage/images/product/')}}/{{$item->foto}}"
                                alt="" class="aspect-square object-cover rounded-t-lg mb-1">
                            <div class="p-3">
                                <a href="" class="mb-1 font-bold line-clamp-1 text-lg">{{$item->store->name}}</a>
                                <p class="mb-1 font-bold line-clamp-1">{{$item->name}}</p>
                                <div class="flex gap-3 items-end">
                                    <p class="text-green-500 font-bold text-sm">Rp. {{$item->price}}</p>
                                    <p class="line-through text-gray-600 text-xs">Rp. {{$item->price + 2000}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-full flex justify-center">
                <button
                    class="px-10 py-2 bg-green-500 text-white  rounded-lg text-sm my-7 mx-auto hover:bg-green-400 transition-all duration-500">
                    View All
                    Products</button>
            </div>
        </div>
    </div>


</x-layouts.user>
<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
</script>
