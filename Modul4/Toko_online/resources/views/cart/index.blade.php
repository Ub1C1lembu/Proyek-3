@extends('layouts.app')

@section('content')
<h2 class="mb-4">Keranjang Belanja</h2>

@if(session('cart') && count(session('cart')) > 0)
    <div class="table-responsive shadow-sm bg-white p-3 rounded">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah Beli</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cart') as $id => $details)
                <tr>
                    <td class="fw-bold">{{ $details['nama_barang'] }}</td>
                    <td>Rp {{ number_format($details['harga'], 0, ',', '.') }}</td>
                    <td style="width: 180px;">
                        <form action="{{ route('cart.update') }}" method="POST" class="d-flex">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="number" name="jumlah" value="{{ $details['jumlah'] }}" min="1" max="{{ $details['stok'] }}" class="form-control form-control-sm me-2">
                            <button type="submit" class="btn btn-sm btn-info text-white">Update</button>
                        </form>
                    </td>
                    <td>Rp {{ number_format($details['harga'] * $details['jumlah'], 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $id }}">
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="table-active">
                    <th colspan="3" class="text-end fs-5">Total Bayar:</th>
                    <th colspan="2" class="fs-5 text-success">Rp {{ number_format($total, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Kosongkan Keranjang</button>
        </form>

        <form action="{{ route('checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-lg px-5">Checkout Sekarang</button>
        </form>
    </div>
@else
    <div class="alert alert-warning text-center p-5">
        <h4>Keranjang belanja Anda masih kosong!</h4>
        <p>Ayo mulai belanja sekarang.</p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Mulai Belanja</a>
    </div>
@endif
@endsection
