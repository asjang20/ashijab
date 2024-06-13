<x-app-layout>
    <div class="bg-white p-5 rounded-lg">
        <form action="{{ route('store.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('POST')

            <div class="space-y-4">
                <div class="flex flex-col gap-1">
                    <label for="name">Nama Toko</label>
                    <input type="text" name="name" id="name" class="rounded-lg">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="description">Deskripsi Toko</label>
                    <textarea name="description" id="description" class="rounded-lg" required></textarea>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="address">Alamat Toko</label>
                    <input type="text" name="address" id="address" class="rounded-lg">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="telp">No Telepon</label>
                    <input type="text" name="telp" id="telp" class="rounded-lg">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="rounded-lg">
                </div>
                <button class="text-white bg-green-500 hover:bg-green-400 rounded-lg px-10 py-2" type="submit">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
