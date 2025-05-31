@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengaduan</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Judul:</label><br>
        <input type="text" name="judul" value="{{ $pengaduan->judul }}"><br><br>

        <label>Isi:</label><br>
        <textarea name="isi">{{ $pengaduan->isi }}</textarea><br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="Menunggu" {{ $pengaduan->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="Diproses" {{ $pengaduan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="Selesai" {{ $pengaduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
