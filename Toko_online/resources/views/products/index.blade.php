@extends('layouts.app')

@section('content')
<h2 class="mb-4 border-bottom pb-2">Katalog Barang</h2>
<div class="row">
    @forelse ($products as $p)
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm">
            @if($p->gambar)
                <img src="{{ asset($p->gambar) }}" class="card-img-top" alt="{{ $p->nama_barang }}" style="height: 200px; object-fit: cover;">
            @else
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                    Tidak ada gambar
                </div>
            @endif
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $p->nama_barang }}</h5>
                <p class="card-text text-success fw-bold fs-5">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                <p class="card-text text-muted mb-3">Sisa Stok: {{ $p->stok }}</p>
                
                <div class="mt-auto">
                    @if ($p->stok > 0)
                        <form action="{{ route('cart.add', $p->id_barang) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary w-100">Masukkan Keranjang</button>
                        </form>
                    @else
                        <button class="btn btn-secondary w-100" disabled>Stok Habis</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">Belum ada barang yang tersedia di toko.</div>
    </div>
    @endforelse
</div>
@endsection
