<?php

namespace App\Http\Controllers;

use App\Models\CartDetail;
use App\Models\Pesanan;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Pesanan $pesanan, Request $request)
    {
        $product1 = Product::with('category')->where('category_id', '=', 1);
        $product2 = Product::with('category')->where('category_id', '=', 2);
        $product3 = Product::with('category')->where('category_id', '=', 3);
        // if (request('search') != $product2 | !$product3) {
        //     $product1->where('title', 'like', '%' . request('search') . '%');
        // } elseif (request('search') != $product1 | !$product3) {
        //     $product2->where('title', 'like', '%' . request('search') . '%');
        // } elseif (request('search') != $product1 | !$product2) {
        //     $product3->where('title', 'like', '%' . request('search') . '%');
        // }
        if (request('search') != $product2 || !$product3) {
            $product1->where('title', 'like', '%' . request('search') . '%');
        }
        if (request('search') != $product1 | !$product3) {
            $product2->where('title', 'like', '%' . request('search') . '%');
        }
        if (request('search') != $product1 | !$product2) {
            $product3->where('title', 'like', '%' . request('search') . '%');
        }
        $cartdetail = CartDetail::with('user', 'product')->where('user_id', auth()->user()->id);
        $pesananku = Pesanan::with('product')->where('user_id', auth()->user()->id);
        // return $keranjang;
        // session()->forget('keranjang');
        return view('menu.index', [
            'title' => 'Menu',
            'berat' => $product1->get(),
            'ringan' => $product2->get(),
            'minuman' => $product3->get(),
            'pesanan' => $pesanan::latest()->paginate(''),
            'cart' => $cartdetail->get(),
            'pesananku' => $pesananku->get()

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($berat, Product $product)
    {
        // return $product::with('category')->where('slug', '=', $berat)->get();
        return view('menu.show', [
            'title' => 'menu',
            'product' => $product::with('category')->where('slug', '=', $berat)->get(),
            'pesananku' => $pesananku = Pesanan::with('product')->get()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function keranjang()
    {
    }
}
