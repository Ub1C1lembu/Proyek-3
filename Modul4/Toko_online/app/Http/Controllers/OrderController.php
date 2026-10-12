<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect('/cart')->with('error', 'Keranjang Anda kosong.');
        }

        $totalHarga = 0;
        foreach ($cart as $item) {
            $totalHarga += $item['harga'] * $item['jumlah'];
        }

        DB::beginTransaction();

        try {
            $orderId = 'ORD-' . strtoupper(uniqid());

            // 1. Buat record di tabel orders
            $order = Order::create([
                'id_order' => $orderId,
                'id_user' => Auth::user()->id_user,
                'tanggal_order' => now(),
                'total_harga' => $totalHarga,
                'alamat_pengiriman' => Auth::user()->alamat,
            ]);

            // 2. Simpan order detail dan kurangi stok produk
            foreach ($cart as $id => $details) {
                OrderDetail::create([
                    'id_order' => $orderId,
                    'id_barang' => $id,
                    'harga_satuan' => $details['harga'],
                    'jumlah_beli' => $details['jumlah'],
                ]);

                $product = Product::find($id);
                $product->stok -= $details['jumlah'];
                $product->save();
            }

            DB::commit();

            // 3. Kosongkan keranjang belanja
            session()->forget('cart');

            return redirect('/orders')->with('success', 'Checkout berhasil! Pesanan Anda telah diproses.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/cart')->with('error', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $orders = Order::where('id_user', Auth::user()->id_user)->orderBy('tanggal_order', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('orderDetails.product')->where('id_order', $id)->where('id_user', Auth::user()->id_user)->firstOrFail();
        return view('orders.show', compact('order'));
    }
}
