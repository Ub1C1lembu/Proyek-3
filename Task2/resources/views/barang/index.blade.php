<h1>Toko Alat Tulis</h1>
<a href="/keranjang">[ Keranjang ({{ $totalItem }}) ]</a>

<h2>Daftar barang</h2>
<ul>
    @foreach ($barangs as $barang)
        <li>
            {{ $barang->nama }} <br>
            Rp {{ number_format($barang->harga, 0, ',', '.') }} 
            <a href="/tambah/{{ $barang->id }}">[Masukkan ke krj]</a>
        </li>
        <hr>
    @endforeach
</ul>