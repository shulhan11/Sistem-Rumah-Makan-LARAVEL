<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Pesanan;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pesanan.index', [
            'title' => 'pesanan',
            'pesanan' => Pesanan::with('product')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $query = CartDetail::where('user_id', auth()->user()->id)->get();
        foreach ($query as $qr => $val) {
            Pesanan::create($data[] = array(
                'product_id' =>  $val->product_id,
                'user_id' => auth()->user()->id,
                'catatan' => $val->catatan,
                'quantity' => $val->quantity,
                'status_pesaan' => false,
                'status_pembayaran' => true,

            ));
        }
        CartDetail::where('user_id', auth()->user()->id)->delete();
        // DB::table('cart-details')->delete();
        // return $data;
        // Pesanan::create($data);



        // Pesanan::insert([
        //     'product_id' => $request['product_id'],
        //     'catatan' => 'wow',
        //     'quantity' => $request['quantity'],
        //     'catatan' => $request['catatan'],
        //     'status_pesanan' => false,
        //     'status_pembayaran' => true
        // ]);

        return redirect('/allmenu')->with('success', 'Tunggu Pesananmu Tiba, silahkan order menu yang lain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        return view('pesanan.edit-pesanan', [
            'title' => 'pesanan',
            'pesanan' => $pesanan,
            'stb' => [
                0, 1
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $validated = $request->validate([
            'catatan' => '',
            'status_pesanan' => '',
            'status_pembayaran' => ''

        ]);
        Pesanan::where('id', $pesanan->id)->update($validated);
        return redirect('/pesanan')->with('success', 'data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        Pesanan::destroy($pesanan->id);
        return redirect('/pesanan')->with('success', 'menu deleted');
    }

    function do_tambah_keranjang($id, Request $request, User $user)
    {
        $keranjang = session('keranjang');
        $menu = Product::detail_product($id);
        // $id = $user::where(auth()->user->id);


        // $menu = Product::detail_product($id)->with('user')->where('user_id', auth()->user()->id)->get();
        // $menu = Product::detail_product($id)->with('user')->get();

        $keranjang[$id] = [
            'user_id' => auth()->user()->id,
            'title' => $menu->title,
            'harga' => $menu->harga,
            'catatan' => $request->catatan,
            'quantity' => $request->quantity
        ];
        session(['keranjang' => $keranjang]);
        return redirect('allmenu');
    }

    function do_hapus_keranjang($id)
    {
        $keranjang = session('keranjang');
        unset($keranjang[$id]);
        session(['keranjang' => $keranjang]);
        return redirect('/allmenu');

        $keranjang = session_destroy();
    }

    function do_tambah_transaksi()
    {
        $keranjang = session('keranjang');
        foreach ($keranjang as $kj => $val) {
            $product_id = $kj;
            $quantity = $val['quantity'];
            $catatan = $val['catatan'];
            Pesanan::create([
                'product_id' => $product_id,
                'catatan' => 'wow',
                'quantity' => $quantity,
                'catatan' => $catatan,
                'status_pesanan' => false,
                'status_pembayaran' => true
            ]);
        }


        session()->forget('keranjang');
        return redirect('/allmenu')->with('success', 'Tunggu Pesananmu Tiba, silahkan order menu yang lain');
    }
}
