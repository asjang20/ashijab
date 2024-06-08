<x-app-layout>
    <div class="space-y-3 bg-white p-5 rounded-lg">
        <a href="{{ route('user.create') }}" class="bg-green-500 hover:bg-green-400 text-white rounded-lg border shadow px-10 py-2"> Tambah User</a>
        <div class="relative">
            <div class="rounded-lg overflow-hidden">
                <table class="w-full">
                    <thead class="bg-green-500 text-white">
                        <tr>
                            <td class="px-3 py-1">No.</td>
                            <td class="px-3 py-1">Nama User</td>
                            <td class="px-3 py-1">Email</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td class="px-3 py-1">{{$loop->index+1}}</td>
                                <td class="px-3 py-1">{{$item->name}}</td>
                                <td class="px-3 py-1">{{$item->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>