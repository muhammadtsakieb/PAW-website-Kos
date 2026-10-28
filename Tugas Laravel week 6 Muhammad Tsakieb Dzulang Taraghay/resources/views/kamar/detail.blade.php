@extends('layouts.app')

@section('title', 'Detail Kamar - Kos Tia')

@section('content')
@foreach ($kamar as $k)
<div class="kamar">
    <h1>{{ $k->nama_kamar }}</h1>

    <img src="{{ asset('img/' . $k->gambar) }}" alt="Gambar {{ $k->nama_kamar }}">

    <div class="deskripsi">
        <h2>Deskripsi</h2>
        <p>
            {{ $k->nama_kamar }} merupakan kamar {{ strtolower($k->tipe) }}
            dengan ukuran {{ $k->ukuran }}.
        </p>

        <p>Fasilitas:</p>
        <ol>
            @foreach ($k->daftar_fasilitas as $f)
                <li>{{ $f }}</li>
            @endforeach
        </ol>

        <p><strong>Harga:</strong> {{ $k->harga_rupiah }} / bulan</p>
    </div>
</div>
@endforeach

<div class="kembali-wrap">
    <a href="{{ route('kamar.index') }}" class="tombol">Kembali</a>
</div>
@endsection