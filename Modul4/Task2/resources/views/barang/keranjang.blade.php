<a href="/">[ Kembali ke Daftar Barang ]</a>
<h1>Keranjang belanja (Tanpa login)</h1>

<ul>
    @foreach ($items as $item)
        <li>
            {{ $item['nama'] }} <br>
            Rp {{ number_format($item['harga'], 0, ',', '.') }} x {{ $item['jumlah'] }} = Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
            
            <a href="/update/{{ $item['id'] }}?aksi=kurang">[-]</a>
            {{ $item['jumlah'] }}
            <a href="/update/{{ $item['id'] }}?aksi=tambah">[+]</a>
            
            <a href="/hapus/{{ $item['id'] }}">[hps]</a>
        </li>
        <hr>
    @endforeach
</ul>

<h3>Total: Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}</h3>
<a href="/kosongkan">[ Kosongkan keranjang ]</a>