<x-app-layout>
    <div class="bg-white p-5 rounded-lg text-sm">
        <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div class="flex flex-col gap-1">
                    <label for="name">Nama Produk</label>
                    <input type="text" name="name" id="name" class="rounded-lg" value="{{ $product->name }}"
                        required>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="price">Harga</label>
                    <input type="number" name="price" id="price" class="rounded-lg" value="{{ $product->price }}"
                        required>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="category_id">Kategori</label>
                    <select class="rounded-lg" name="category_id" id="category_id" required>
                        <option value="" disabled selected> Pilih Kategori</option>
                        @foreach ($category as $item)
                            <option {{ $product->category_id == $item->id ? 'selected' : '' }}
                                value="{{ $item->id }}">
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col gap-1 border rounded-lg p-3 border-black">
                    <label class="border-b pb-1">Foto Produk</label>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col gap-1">
                            <label class="text-center" for="foto">Thumbnail</label>
                            <input type="file" name="foto" id="foto" class="rounded-lg border border-black">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="text-center" for="gallery">Gallery</label>
                            <input type="file" name="gallery[]" id="gallery" class="rounded-lg border border-black"
                                multiple>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-1">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="rounded-lg" required>{{ $product->description }}</textarea>
                </div>

                <div>
                    <table class="table table-bordered col-span-2 w-full" id="dynamicTable">
                        <tr>
                            <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white">Name
                            </th>
                            <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white">Link
                            </th>
                            <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white"></th>
                        </tr>
                        @php
                            $indexLink = 0;
                        @endphp
                        @foreach ($product->link as $item)
                            <tr>
                                <td class="p-1">
                                    <input type="text" name="item[{{ $indexLink }}][name]"
                                        placeholder="Enter Link Name" value="{{ $item->name }}"
                                        class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required />
                                </td>
                                <td class="p-1">
                                    <input type="url" name="item[{{ $indexLink }}][link]"
                                        placeholder="Enter Link" value="{{ $item->link }}"
                                        class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required />
                                </td>
                                @if ($loop->first)
                                    <td class="p-1">
                                        <button type="button" name="add" id="add"
                                            class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-green-900 hover:bg-green-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5 text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">+</button>
                                    </td>
                                @else
                                    <td class="p-1"><button type="button"
                                            class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-green-900 hover:bg-green-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5  text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 remove-tr">-</button>
                                    </td>
                                @endif
                            </tr>
                            @php
                                $indexLink++;
                            @endphp
                        @endforeach
                    </table>
                </div>

                <div></div>
                <button class="text-white bg-green-500 hover:bg-green-400 rounded-lg px-10 py-2" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('#category_id').select2({
            tags: true
        });
    })
</script>
<script type="text/javascript">
    var i = {{ $indexLink }};

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append('<tr><td class="p-1"><input required type="text" name="item[' + i +
            '][name]" placeholder="Enter Link Name" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><input required type="url" name="item[' +
            i +
            '][link]" placeholder="Enter Link" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><button type="button" class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-green-900 hover:bg-green-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5  text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 remove-tr">-</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
