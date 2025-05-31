<x-app-layout>
    <!-- Navbar -->
    <div class="bg-white shadow-md sticky top-0 z-20">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-700 flex items-center gap-2">
                🎓 User Dashboard
            </h1>
            <ul class="flex space-x-6 text-gray-700 text-sm font-medium">
                <li><a href="#tambah" class="hover:text-indigo-600">Tambah Pengaduan</a></li>
                <li><a href="#pengaduan-sendiri" class="hover:text-indigo-600">Pengaduan Saya</a></li>
                <li><a href="#semua-pengaduan" class="hover:text-indigo-600">Semua Pengaduan</a></li>
            </ul>
        </div>
    </div>

    <!-- Background -->
    <div class="bg-gradient-to-br from-gray-100 via-white to-gray-200 min-h-screen py-10">
        <div class="max-w-7xl mx-auto px-6 space-y-12">

            <!-- Tambah Pengaduan -->
            <div id="tambah" class="bg-white p-6 rounded-xl shadow-lg border">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">📝 Tambah Pengaduan / Aspirasi</h3>
                <form action="{{ route('pengaduan.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul" class="w-full border px-4 py-2 rounded-lg mt-1" required>
                    </div>
                    <div class="mb-4">
                        <label for="isi" class="block text-sm font-medium text-gray-700">Isi</label>
                        <textarea name="isi" id="isi" rows="4" class="w-full border px-4 py-2 rounded-lg mt-1" required></textarea>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Kirim Pengaduan
                    </button>
                </form>
            </div>

            <!-- Pengaduan Saya -->
            <div id="pengaduan-sendiri" class="bg-white p-6 rounded-xl shadow-lg border">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">📋 Pengaduan Saya</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($pengaduanSaya as $item)
                        <div class="border rounded-lg p-4 bg-gray-50 shadow hover:shadow-md transition duration-200">
                            <h4 class="font-bold text-lg text-gray-800 mb-1">{{ $item->judul }}</h4>
                            <p class="text-sm text-gray-600 mb-2">
                                {{ $item->created_at->diffForHumans() }}
                            </p>
                            <p class="text-gray-700 mb-3">{{ $item->isi }}</p>
                            <div class="flex gap-2">
                                <a href="{{ route('pengaduan.edit', $item->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white text-sm px-3 py-1 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-1 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada pengaduan yang Anda buat.</p>
                    @endforelse
                </div>
            </div>

            <!-- Semua Pengaduan -->
            <div id="semua-pengaduan" class="bg-white p-6 rounded-xl shadow-lg border">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">🌐 Semua Pengaduan Mahasiswa</h3>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($semuaPengaduan as $item)
                        <div class="border rounded-lg p-4 bg-gray-50 shadow hover:shadow-md transition duration-200">
                            <h4 class="font-bold text-lg text-gray-800 mb-1">{{ $item->judul }}</h4>
                            <p class="text-sm text-gray-600 mb-2">
                                Oleh: {{ $item->user->name }} | {{ $item->created_at->diffForHumans() }}
                            </p>
                            <p class="text-gray-700">{{ $item->isi }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada pengaduan yang dikirim mahasiswa.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
