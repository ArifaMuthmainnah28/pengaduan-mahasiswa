<x-app-layout>
    <!-- Navbar -->
    <div class="bg-white shadow-md sticky top-0 z20">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-700 flex items-center gap-2">
                🎓 Admin Dashboard
            </h1>
            <ul class="flex space-x-6 text-gray-700 text-sm font-medium">
                <li><a href="#statistik" class="hover:text-indigo-600">Statistik</a></li>
                <li><a href="#pengaduan" class="hover:text-indigo-600">Pengaduan</a></li>
                <li><a href="#pengguna" class="hover:text-indigo-600">Pengguna</a></li>
                <li><a href="{{ route('admin.users.index') }}" class="hover:text-indigo-600 text-indigo-700 font-semibold">Kelola Pengguna</a></li>
            </ul>
        </div>
    </div>

    <!-- Background -->
    <div class="bg-gradient-to-br from-gray-100 via-white to-gray-200 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-6 space-y-12">

            <!-- Statistik -->
            <div id="statistik" class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-lg text-center border">
                    <p class="text-gray-500 text-sm mb-1">Total Pengguna</p>
                    <h3 class="text-3xl font-extrabold text-blue-600">{{ $totalPengguna }}</h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center border">
                    <p class="text-gray-500 text-sm mb-1">Total Admin</p>
                    <h3 class="text-3xl font-extrabold text-green-600">{{ $totalAdmin }}</h3>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-lg text-center border">
                    <p class="text-gray-500 text-sm mb-1">Total Pengaduan</p>
                    <h3 class="text-3xl font-extrabold text-red-600">{{ $totalPengaduan }}</h3>
                </div>
            </div>

            <!-- Pengaduan -->
            <div id="pengaduan" class="bg-white p-6 rounded-xl shadow-lg border">
                <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">📣 Daftar Pengaduan</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($pengaduan as $item)
                        <div class="border rounded-lg p-4 bg-gray-50 shadow hover:shadow-md transition duration-200">
                            <h4 class="font-bold text-lg text-gray-800 mb-1">{{ $item->judul }}</h4>
                            <p class="text-sm text-gray-600 mb-2">
                                Oleh: {{ $item->user->name }} | {{ $item->created_at->diffForHumans() }}
                            </p>
                            <p class="text-gray-700 mb-3">{{ $item->isi }}</p>
                            <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengaduan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada pengaduan.</p>
                    @endforelse
                </div>
            </div>

            <!-- Pengguna -->
            <div id="pengguna" class="bg-white p-6 rounded-xl shadow-lg border">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">👥 Daftar Pengguna</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100 text-gray-700 text-left text-sm">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Nama</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Role</th>
                                <th class="px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i => $user)
                                <tr class="border-b hover:bg-gray-50 text-sm">
                                    <td class="px-4 py-2">{{ $i + 1 }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 rounded text-sm {{ $user->role === 'admin' ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">
                                        @if ($user->role !== 'admin')
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded">
                                                    Hapus
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 text-sm italic">Admin</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
