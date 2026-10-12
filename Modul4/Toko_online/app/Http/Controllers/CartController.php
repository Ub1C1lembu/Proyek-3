<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $id => $details) {
            $total += $details['harga'] * $details['jumlah'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->stok <= 0) {
            return back()->with('error', 'Stok barang habis.');
        }

        $cart = session()->get('cart', []);
        
        // Jika barang sudah ada di keranjang, tambah jumlahnya
        if (isset($cart[$id])) {
            if ($cart[$id]['jumlah'] + 1 > $product->stok) {
                return back()->with('error', 'Jumlah melebihi stok yang tersedia.');
            }
            $cart[$id]['jumlah']++;
        } else {
            // Jika belum ada, jadikan item baru
            $cart[$id] = [
                "nama_barang" => $product->nama_barang,
                "jumlah" => 1,
                "harga" => $product->harga,
                "gambar" => $product->gambar,
                "stok" => $product->stok
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->jumlah) {
            $cart = session()->get('cart');
            $product = Product::findOrFail($request->id);

            if ($request->jumlah > $product->stok) {
                return back()->with('error', 'Jumlah melebihi stok yang tersedia.');
            }

            $cart[$request->id]["jumlah"] = $request->jumlah;
            session()->put('cart', $cart);
            return back()->with('success', 'Keranjang berhasil diperbarui.');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return back()->with('success', 'Barang dihapus dari keranjang.');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
