@extends('layouts.app')

@section('content')
<h1>Pesanan Baru</h1>

<table class="table">
    <thead>
        <tr>
            <th>No Order</th>
            <th>Nama Pelanggan</th>
            <th>Total Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pesanan as $item)
        <tr>
            <td>{{ $item->no_order }}</td>
            <td>{{ $item->nama_pelanggan }}</td>
            <td>Rp {{ number_format($item->total_harga,0,',','.') }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="4">Tidak ada pesanan baru</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
