<x-app-layout>
    <div class="bg-white p-5 rounded-lg">



        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                data-tabs-toggle="#default-tab-content" role="tablist">
                <li class="me-2" role="presentation">
                    <button
                        class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                        aria-controls="dashboard" aria-selected="false">Merchant Link</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                        data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                        aria-selected="false">Store
                        Information</button>
                </li>
            </ul>
        </div>
        <div id="default-tab-content">
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                aria-labelledby="profile-tab">
                <form action="{{ route('store.update', $store->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-4">
                        <div class="flex flex-col gap-1">
                            <label for="name">Nama Toko</label>
                            <input type="text" name="name" id="name" class="rounded-lg"
                                value="{{ $store->name }}">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="description">Deskripsi Toko</label>
                            <textarea name="description" id="description" class="rounded-lg" required>{{ $store->description }}</textarea>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="address">Alamat Toko</label>
                            <input type="text" name="address" id="address" class="rounded-lg"
                                value="{{ $store->address }}">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="telp">No Telepon</label>
                            <input type="text" name="telp" id="telp" class="rounded-lg"
                                value="{{ $store->telp }}">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="rounded-lg">
                        </div>
                        <button class="text-white bg-green-900 hover:bg-green-700 rounded-lg px-10 py-2" type="submit">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                aria-labelledby="dashboard-tab">
                <div class="flex flex-wrap gap-3 justify-center w-full mb-10">
                    @foreach ($store->merchant as $merchant)
                        <div class="border rounded-lg p-3 relative">
                            <div class="absolute top-1 right-1">
                                <form action="{{ route('merchant.destroy', $merchant->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class=" rounded-full w-5 h-5 bg-red-500 text-white text-xs">X</button>
                                </form>
                            </div>
                            <a href="{{ $merchant->link }}" class="flex items-center justify-center">
                                <img src="{{ asset('storage/images/merchant/icon') }}/{{ $merchant->icon }}"
                                    class="h-10 object-contain" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
                <form action="{{ route('merchant.store', $store->id) }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="space-y-3 ">
                        <div>
                            <table class="table table-bordered col-span-2 w-full" id="dynamicTable">
                                <tr>
                                    <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white">Name
                                    </th>
                                    <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white">Icon
                                    </th>
                                    <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white">Link
                                    </th>
                                    <th class=" mb-2 sm:text-sm text-xs font-medium text-gray-900 dark:text-white"></th>
                                </tr>
                                <tr>
                                    <td class="p-1">
                                        <input type="text" name="item[0][name]" placeholder="Enter Name Merchant"
                                            class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required />
                                    </td>
                                    <td class="p-1">
                                        <input type="file" name="item[0][icon]" placeholder="Enter Merchant Icon"
                                            class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required />
                                    </td>
                                    <td class="p-1">
                                        <input type="url" name="item[0][link]" placeholder="Enter Merchant Link"
                                            class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required />
                                    </td>
                                    <td class="p-1">
                                        <button type="button" name="add" id="add"
                                            class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-green-900 hover:bg-green-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5    text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900">+</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="px-1">
                            <button class="text-white bg-green-900 hover:bg-green-700 rounded-lg px-10 py-2"
                                type="submit">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</x-app-layout>
<script type="text/javascript">
    var i = 0;

    $("#add").click(function() {

        ++i;

        $("#dynamicTable").append('<tr><td class="p-1"><input required type="text" name="item[' + i +
            '][name]" placeholder="Enter Merchant Name" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><input required type="file" name="item[' +
            i +
            '][icon]" placeholder="Enter Merchant Icon" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><input required type="url" name="item[' +
            i +
            '][link]" placeholder="Enter Merchant Link" class="form-control bg-gray-200 border border-gray-300 text-gray-900 text-xs sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" /></td><td class="p-1"><button type="button" class="dark:bg-gray-600 text-gray-200 p-3 rounded shadow-sm focus:outline-none bg-green-900 hover:bg-green-700 dark:hover:bg-gray-2000 inline-flex items-center px-5 py-2.5  text-xs sm:text-sm font-medium text-center focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 remove-tr">-</button></td></tr>'
        );
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>
