<x-app-layout>
    <div class="bg-white p-5 rounded-lg">
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="space-y-4">
            <div class="flex flex-col gap-1">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" id="name" class="rounded-lg" required>
            </div>
        <div class="space-y-4">
            <div class="flex flex-col gap-1">
                <label for="foto">Foto Produk</label>
                <input type="file" name="foto" id="foto" class="rounded-lg" required>
            </div>
            <div class="flex flex-col gap-1">
                <label for="price">Harga</label>
                <input type="number" name="price" id="price" class="rounded-lg" required>
            </div>
            <div class="flex flex-col gap-1">
                <label for="category_id">Kategori</label>
                <select class="rounded-lg" name="category_id" id="category_id" required>
                    <option value="" disabled selected> Pilih Kategori</option>
                    @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-1">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="rounded-lg" required></textarea>            </div>
            <button class="text-white bg-green-500 hover:bg-green-400 rounded-lg px-10 py-2" type="submit">
                Simpan
            </button>
        </div>
        </form>
    </div>
</x-app-layout>
<script>
    $(document).ready(function(){
        $('#category_id').select2({
            tags:true
        });
    })
</script>