@extends('layouts.app')

@section('content')
<h2 class="mb-4">Riwayat Pesanan</h2>

@if($orders->count() > 0)
    <div class="table-responsive shadow-sm bg-white p-3 rounded">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID Order</th>
                    <th>Tanggal Checkout</th>
                    <th>Total Pembayaran</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td class="fw-bold">{{ $order->id_order }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->tanggal_order)->format('d M Y H:i') }}</td>
                    <td class="text-success fw-bold">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <a href="{{ route('orders.show', $order->id_order) }}" class="btn btn-sm btn-primary">Lihat Detail & Nota</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-secondary text-center p-5">
        <h4>Anda belum pernah melakukan pemesanan.</h4>
    </div>
@endif
@endsection
