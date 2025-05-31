<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Kelola Pengguna</h2>
    </x-slot>

    <div class="py-6 px-4 space-y-6">

        {{-- Admin --}}
        <div>
            <h3 class="text-lg font-bold">Daftar Admin</h3>
            <ul class="list-disc pl-6">
                @foreach($admins as $admin)
                    <li>{{ $admin->name }} ({{ $admin->email }})</li>
                @endforeach
            </ul>
        </div>

        {{-- User --}}
        <div>
            <h3 class="text-lg font-bold">Daftar User</h3>
            <ul class="list-disc pl-6">
                @foreach($users as $user)
                    <li class="flex justify-between">
                        <span>{{ $user->name }} ({{ $user->email }})</span>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</x-app-layout>
