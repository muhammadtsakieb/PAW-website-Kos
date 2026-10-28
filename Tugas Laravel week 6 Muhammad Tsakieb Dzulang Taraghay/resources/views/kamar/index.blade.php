@extends('layouts.app')

@section('content')
<div class="container">
    <table>
        <tr>
            <th>Nama Kamar</th>
            <th>Tipe</th>
            <th>Ukuran</th>
            <th>Harga / Bulan</th>
            <th>Fasilitas</th>
        </tr>
        @foreach ($kamar as $k)
        <tr>
            <td>{{ $k->nama_kamar }}</td>
            <td>{{ $k->tipe }}</td>
            <td>{{ $k->ukuran }}</td>
            <td>{{ $k->harga_rupiah }}</td>
            <td>{{ $k->fasilitas }}</td>
        </tr>
        @endforeach
    </table>
    <p>
        <a href="{{ route('kamar.detail') }}" class="tombol">Selengkapnya</a>
        <a href="{{ route('kamar.admin') }}" class="tombol tombol-edit">Kelola Data</a>
    </p>
</div>
@endsection