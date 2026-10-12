@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detail Pesanan #{{ $order->id_order }}</h2>
    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Kembali</a>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-primary text-white">Informasi Pengiriman</div>
            <div class="card-body">
                <p class="mb-1 text-muted">Tanggal Transaksi:</p>
                <p class="fw-bold">{{ \Carbon\Carbon::parse($order->tanggal_order)->format('d F Y - H:i') }}</p>
                
                <p class="mb-1 text-muted mt-3">Alamat Tujuan:</p>
                <p class="fw-bold">{{ $order->alamat_pengiriman ?? 'Alamat tidak dicantumkan' }}</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-8 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-dark text-white">Rincian Barang</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="table-light border-bottom">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Harga Satuan</th>
                                <th>Jumlah</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderDetails as $detail)
                            <tr class="border-bottom">
                                <td>{{ $detail->product->nama_barang ?? 'Produk Terhapus' }}</td>
                                <td>Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                                <td>x {{ $detail->jumlah_beli }}</td>
                                <td class="text-end">Rp {{ number_format($detail->harga_satuan * $detail->jumlah_beli, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="bg-light">
                                <th colspan="3" class="text-end py-3">TOTAL KESELURUHAN:</th>
                                <th class="text-end py-3 text-success fs-5">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
