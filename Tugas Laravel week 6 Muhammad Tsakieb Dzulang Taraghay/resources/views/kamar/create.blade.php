@extends('layouts.app')

@section('title', 'Tambah Kamar - Kos Tia')
@section('judul', 'KOS TIA - Tambah Kamar')

@section('content')
<div class="form-box">
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('kamar.store') }}">
        @csrf

        <label>Nama Kamar</label>
        <input type="text" name="nama_kamar" value="{{ old('nama_kamar') }}" required>

        <label>Tipe</label>
        <input type="text" name="tipe" value="{{ old('tipe') }}" placeholder="Standard / Premium" required>

        <label>Ukuran</label>
        <input type="text" name="ukuran" value="{{ old('ukuran') }}" placeholder="3 x 3 m" required>

        <label>Harga / Bulan</label>
        <input type="number" name="harga" min="0" value="{{ old('harga') }}" required>

        <label>Fasilitas</label>
        <textarea name="fasilitas" rows="3" placeholder="Kasur, Lemari, Meja">{{ old('fasilitas') }}</textarea>

        <label>Nama File Gambar</label>
        <input type="text" name="gambar" value="{{ old('gambar') }}" placeholder="kamar_c.webp">

        <button type="submit" class="tombol">Simpan</button>
        <a href="{{ route('kamar.admin') }}" class="tombol tombol-hapus">Batal</a>
    </form>
</div>
@endsection