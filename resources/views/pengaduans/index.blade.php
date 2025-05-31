@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pengaduan</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pengaduans.create') }}">+ Tambah Pengaduan</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        @foreach($pengaduans as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->isi }}</td>
            <td>{{ $p->status }}</td>
            <td>
                <a href="{{ route('pengaduans.edit', $p->id) }}">Edit</a>
                <form action="{{ route('pengaduans.destroy', $p->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
