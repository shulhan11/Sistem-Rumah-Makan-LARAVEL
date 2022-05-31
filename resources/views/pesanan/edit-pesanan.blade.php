@extends('layout-dashboard.main')
@section('body')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Pesanan</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>

    <form action="/pesanan/{{ $pesanan->id }}" method="POST">
        @method('put')
        @csrf
    <div class="container">
        <div class="row">
            <div class="col-sm-6 md-3">
                <label for="menu" class="form-label">Menu</label>
                <input type="text" class="form-control" id="menu" value="{{ $pesanan->product->title }}" disabled>
                <div id="emailHelp" class="form-text"></div>
                    
                <label for="harga" class="form-label">Harga</label>
                <input type="numeric" class="form-control" id="harga" value="{{ $pesanan->product->harga }}" disabled>
                <div id="emailHelp" class="form-text"></div>
                
                <label for="catatan" class="form-label">Catatan</label>
                <input type="text" class="form-control" id="catatan" value="{{ $pesanan->catatan }}" name="catatan">
                <div id="emailHelp" class="form-text"></div>
                
            </div>
            <div class="col-auto md-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="numeric" class="form-control" id="quantity" value="{{ $pesanan->quantity }}" name="quantity">
                <div id="emailHelp" class="form-text"></div>
                    
                <label for="status_pembayran" class="form-label">Status Pembayaran</label>
                <select class="form-select mb-3" name="status_pembayaran" aria-label="Default select example">
                    @foreach ($stb as $item)
                    @if ($item == $pesanan->status_pembayaran)
                    <option value="{{ $item }}" selected>{{ $item == 1 ? 'Lunas' : 'waiting' }}</option>
                    @else
                    <option value="{{ $item }}">{{ $item == 1 ? 'Lunas' : 'waiting' }}</option>
                    @endif
                    @endforeach
                    </select>
                    
                    <label for="status_pembayran" class="form-label">Status Pemesanan</label>
                    <select class="form-select mb-3" name="status_pesanan" aria-label="Default select example">
                        @foreach ($stb as $item)
                        @if ($item == $pesanan->status_pesanan)
                        <option value="{{ $item }}" selected>{{ $item == 1 ? 'selesai' : 'waiting' }}</option>
                        @else
                        <option value="{{ $item }}">{{ $item == 1 ? 'selesai' : 'waiting' }}</option>
                        @endif
                        @endforeach
                        </select>
                        
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
    </form>
@endsection