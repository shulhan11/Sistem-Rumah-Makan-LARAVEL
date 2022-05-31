@extends('layout-dashboard.main')
@section('body')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0"></div>
    </div>

<div class="container">
        <div class="row">
            <div class="col-5 md-3"><img src="{{ asset('storage/'.$product->image) }}" class="img-thumbnail" alt="..."></div>
            <div class="col md-3">
                <table class="table table-borderless">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <input type="hidden" value="{{$product->status }}">
                        @if ($product->status == 1)
                        <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $product->category->title }} <span class="badge bg-success text-light">{{ $product->status ? 'ready' : 'restock'}}</span></div></th>
                        @else
                        <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $product->category->title }} <span class="badge bg-danger text-light">{{ $product->status ?  'ready' : 'restock'}}</span></div></th>
                    @endif
                    
                        <td colspan="2"><a href="/product"><span class="badge bg-info text-light">kembali</span></a></td>
                    </tr>
                    <tr>
                        <td colspan="4"><h2>{{ $product->title }}</h2></td>
                    </tr>
                    <tr>
                        <td colspan="4">{{ $product->deskripsi }}</p></td>
                    </tr>
                    <tr>
                        <td colspan="4">Rp{{ number_format($product->harga,2,",",".") }}</p></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection