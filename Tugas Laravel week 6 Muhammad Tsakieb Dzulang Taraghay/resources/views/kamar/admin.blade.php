@extends('layouts.app')

@section('title', 'Admin - Kos Tia')

@section('content')
<div class="container">
    <p>
        <a href="{{ route('kamar.create') }}" class="tombol">+ Tambah Kamar</a>
        <a href="{{ route('kamar.index') }}" class="tombol">Lihat Halaman Utama</a>
    </p>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Kamar</th>
            <th>Tipe</th>
            <th>Ukuran</th>
            <th>Harga / Bulan</th>
            <th>Fasilitas</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach ($kamar as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->nama_kamar }}</td>
            <td>{{ $k->tipe }}</td>
            <td>{{ $k->ukuran }}</td>
            <td>{{ $k->harga_rupiah }}</td>
            <td>{{ $k->fasilitas }}</td>
            <td>{{ $k->gambar }}</td>
            <td class="aksi">
                <a href="{{ route('kamar.edit', $k->id) }}" class="tombol tombol-edit">Edit</a>
                <form method="POST" action="{{ route('kamar.destroy', $k->id) }}"
                      onsubmit="return confirm('Apakah kamu yakin sure ingin delete hapus {{ $k->nama_kamar }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="tombol tombol-hapus">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection