<x-app-layout>
    <div class="space-y-3 bg-white p-5 rounded-lg">
        <div class="relative space-y-3">
            <button class="text-white bg-green-500 rounded-lg hover:bg-green-600 px-5 py-2"
                data-modal-target="confirm-store" data-modal-toggle="confirm-store">
                <p>
                    Konfirmasi Toko
                    <span class="text-xs">(
                        {{ $store->where('is_accept', false)->count() }} )</span>
                </p>
            </button>
            <x-modal.confirm-store :store="$store->where('is_accept', false)"> </x-modal.confirm-store>
            <div class="rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-green-500 text-white">
                        <tr>
                            <td class="px-3 py-1 text-center">No.</td>
                            <td class="px-3 py-1 text-center">Nama Toko</td>
                            <td class="px-3 py-1 text-center">Status</td>
                            <td class="px-3 py-1">Alamat</td>
                            <td class="px-3 py-1">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($store as $item)
                            <tr>
                                <td class="px-3 py-1 text-center">{{ $loop->index + 1 }}</td>
                                <td class="px-3 py-1 flex items-center gap-2 justify-center flex-col">
                                    <img class="h-20" src="{{ asset('storage/images/store/') }}/{{ $item->logo }}"
                                        alt="">
                                    <p>
                                        {{ $item->name }}
                                    </p>
                                </td>
                                <td class="px-3 py-1 text-center">{{ $item->is_accept ? 'Accept' : 'Pending' }}</td>
                                <td class="px-3 py-1">{{ $item->address }}</td>
                                <td class="px-3 py-1">
                                    <form action="{{ route('store.destroy', $item->id) }}" method="POST">
                                        <button type="submit" class="text-red-500">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
