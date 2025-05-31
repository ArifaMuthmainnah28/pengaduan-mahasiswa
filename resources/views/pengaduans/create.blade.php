@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengaduan</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengaduans.store') }}" method="POST">
        @csrf
        <label>Judul:</label><br>
        <input type="text" name="judul" value="{{ old('judul') }}"><br><br>

        <label>Isi:</label><br>
        <textarea name="isi">{{ old('isi') }}</textarea><br><br>

        <button type="submit">Kirim</button>
    </form>
</div>
@endsection
