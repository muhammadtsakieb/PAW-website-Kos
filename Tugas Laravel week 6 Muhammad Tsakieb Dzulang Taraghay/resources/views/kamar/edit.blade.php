@extends('layouts.app')

@section('title', 'Edit Kamar - Kos Tia')
@section('judul', 'KOS TIA - Edit Kamar')

@section('content')
<div class="form-box">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('kamar.update', $kamar->id) }}">
        @csrf
        @method('PUT')

        <label>Nama Kamar</label>
        <input type="text" name="nama_kamar" value="{{ old('nama_kamar', $kamar->nama_kamar) }}" required>

        <label>Tipe</label>
        <input type="text" name="tipe" value="{{ old('tipe', $kamar->tipe) }}" required>

        <label>Ukuran</label>
        <input type="text" name="ukuran" value="{{ old('ukuran', $kamar->ukuran) }}" required>

        <label>Harga / Bulan</label>
        <input type="number" name="harga" min="0" value="{{ old('harga', $kamar->harga) }}" required>

        <label>Fasilitas</label>
        <textarea name="fasilitas" rows="3">{{ old('fasilitas', $kamar->fasilitas) }}</textarea>

        <label>Nama File Gambar</label>
        <input type="text" name="gambar" value="{{ old('gambar', $kamar->gambar) }}">

        <button type="submit" class="tombol">Simpan Perubahan</button>
        <a href="{{ route('kamar.admin') }}" class="tombol tombol-hapus">Batal</a>
    </form>
</div>
@endsection