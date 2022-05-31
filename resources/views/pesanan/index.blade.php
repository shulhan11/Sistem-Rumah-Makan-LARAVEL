@extends('layout-dashboard.main')
@section('body')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Pesanan</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>

    <div class="row mt-3">
      <div class="col">
          <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Pemesan</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Status Pembayaran</th>
                  <th scope="col">Status pesanan</th>
                  <th scope="col">aksi</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($pesanan as  $item)    
                  <tr>
                  <th scope="row">{{ $loop->iteration  }}</th>
                  <td>{{ $item->user->name }}</td>
                  <td>{{ $item->product->title }}</td>
                  <td> Rp {{ number_format($item->product->harga,2,",",".") }}</td>
                  <td>{{ $item->quantity }}</td>
                  <td>{{ $item->status_pembayaran == 1 ? 'ready' : 'belum bayar'}}</td>
                  <td>{{ $item->status_pesanan == 1 ? 'ready' : 'waiting'}}</td>
                  <td style="inline">
                    <a href="pesanan/{{ $item->id }}/edit" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>
                    <form action="/pesanan/{{ $item->id }}" method="POST">
                      @method('delete')
                      @csrf
                      <button  class="btn btn-primary" onclick="return confirm('yakiin')" type="submit"><i class="bi bi-trash"></i>
                      </button>
                    </form>
                  </td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
@endsection