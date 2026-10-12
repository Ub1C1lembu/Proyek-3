<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class KeranjangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $keranjang = session()->get('keranjang', []);
        
        $totalItem = 0;
        foreach ($keranjang as $item) {
            $totalItem += $item;
        }

        return view('barang.index', compact('barangs', 'totalItem'));
    }

    public function tambah($id)
    {
        $keranjang = session()->get('keranjang', []);
        
        if (isset($keranjang[$id])) {
            $keranjang[$id]++;
        } else {
            $keranjang[$id] = 1;
        }

        session()->put('keranjang', $keranjang);
        return redirect()->back();
    }

    public function keranjang()
    {
        $sessionKeranjang = session()->get('keranjang', []);
        $items = [];
        $totalKeseluruhan = 0;

        foreach ($sessionKeranjang as $id => $jumlah) {
            $barang = Barang::find($id);
            if ($barang) {
                $subtotal = $barang->harga * $jumlah;
                $totalKeseluruhan += $subtotal;
                $items[] = [
                    'id' => $barang->id,
                    'nama' => $barang->nama,
                    'harga' => $barang->harga,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal
                ];
            }
        }
        return view('barang.keranjang', compact('items', 'totalKeseluruhan'));
    }

    public function update(Request $request, $id)
    {
        $keranjang = session()->get('keranjang', []);
        
        if (isset($keranjang[$id])) {
            if ($request->aksi == 'tambah') {
                $keranjang[$id]++;
            } elseif ($request->aksi == 'kurang') {
                $keranjang[$id]--;
                if ($keranjang[$id] <= 0) {
                    unset($keranjang[$id]);
                }
            }
            session()->put('keranjang', $keranjang);
        }
        return redirect()->back();
    }

    public function hapus($id)
    {
        $keranjang = session()->get('keranjang', []);
        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
        }
        return redirect()->back();
    }

    public function kosongkan()
    {
        session()->forget('keranjang');
        return redirect()->back();
    }
}