<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Category $category, Request $request)
    {
        $product = Product::with('category');
        if (request('search')) {
            $product->where('title', 'like', '%' . request('search') . '%');
        }

        return view('product.index', [
            'title' => 'product',
            'product' => $product->latest()->paginate(8),
            'category' => $category::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.add-product', [
            'title' => 'Add Product'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'exce' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'image' => 'image|file|max:1024'

        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('product-image');
        }

        Product::create($validated);
        return redirect('/product')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
        // return $product;
        return view('product.show-product', [
            'product' => $product,
            'title' => 'Show Product'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Category $category)
    {
        return view('product.edit-product', [
            'title' => 'product',
            // 'product' => $product::with('category')->get(),
            'product' => $product,
            'category' => $category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $validated = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'exce' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'image' => 'image|file|max:1024'

        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('product-image');
        }
        Product::where('id', $product->id)->update($validated);
        return redirect('/product')->with('success', 'data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect('/product')->with('success', 'menu deleted');
    }
}
