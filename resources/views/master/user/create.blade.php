<x-app-layout>
    <div class="bg-white p-5 rounded-lg">
        <form action="{{ route('user.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="space-y-4">
            <div class="flex flex-col gap-1">
                <label for="name">Nama User</label>
                <input type="text" name="name" id="name" class="rounded-lg">
            </div>
            <div class="flex flex-col gap-1">
                <label for="email">Email User</label>
                <input type="email" name="email" id="email" class="rounded-lg">
            </div>
            <div class="flex flex-col gap-1">
                <label for="password">Password User</label>
                <input type="text" name="password" id="password" class="rounded-lg">
            </div>
            <button class="text-white bg-green-500 hover:bg-green-400 rounded-lg px-10 py-2" type="submit">
                Simpan
            </button>
        </div>
        </form>
    </div>
</x-app-layout>