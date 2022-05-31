@extends('layout-menu.main')
@section('body')
{{-- <form action="/keranjang/{{ $product[0]->id}}" method="" enctype="multipart/form-data"> --}}
<form action="/cart-detail" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="int" id="product_id" name="product_id" value="{{ $product[0]->id }}" hidden>
    <div class="container">
        <div class="row" id="show">
            <div class="col-5 md-3"><img src="{{ asset('storage/'. $product[0]->image) }}" class="img-thumbnail" alt="image" style="border-radius:0% 60% 0% 60% "></div>
            <div class="col md-3">
                <table class="table table-borderless">
                    <thead>
                    </thead>
                    <tbody>
                      <tr>
                          @if ($product[0]->status == 1)
                          <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $product[0]->category->title }} <span class="badge bg-success text-light">{{ $product[0]->status ? 'ready' : 'restock'}}</span></div></th>
                          @else
                          <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $product[0]->category->title }} <span class="badge bg-danger text-light">{{ $product[0]->status ?  'ready' : 'restock'}}</span></div></th>
                      @endif</h5></th>
                        <td colspan="2"><a href="/allmenu"><span class="badge bg-info text-light">kembali</span></a></td>
                      </tr>
                      <tr>
                        <td colspan="4"><h2>{{ $product[0]->title }}</h2></td>
                      </tr>
                      <tr>
                        <td colspan="4"><p class="desk">{{ $product[0]->deskripsi }}</p></td>
                      </tr>
                      <tr>
                        <td colspan="4">
                            <div class="form-floating">
                                <input class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="catatan">
                                <label for="floatingTextarea2">Catatan Pemesanan</label>
                              </div>
                        </td>
                      </tr>
                      <tr>
                        <td class="ket" style="background-color: #fff">Makanan-Berat/Porsi</td>
                        <td class="ket" style="background-color: #fff">Makanan-Ringan/PCS</td>
                        <td colspan="2" class="ket" style="background-color: #fff">Minuman/Gelas</td>
                      </tr>
                      <tr>
                        <td> Rp {{ number_format($product[0]->harga,2,",",".") }}</td>
                        <td colspan="2">
                          <input type="number" name="quantity" id="quantity" value="1" style="width: 50%" >
                        
                            {{-- <div class="input-group w-auto justify-content-start align-items-center">
                                <input type="button" value="-" class="button-minus border  icon-shape icon-sm mx-1 " data-field="quantity">
                                {{-- <input type="int" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25" disabled> --}}
                                {{-- <input type="button" value="+" class="button-plus border icon-shape icon-sm " data-field="quantity"> --}}
                        </td>
                        <td><button class="btn btn-primary" type="submit"><i class="bi bi-cart3"></i> masuk keranjang </button></td>
                        {{-- <td><a href="/keranjang/{{ $product[0]->id }}" class="btn btn-primary" type="submit">masuk keranjang <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                            <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
                          </svg></a></td> --}}
                      </tr>
                      <tr>
                        <td colspan="4"></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</form>
    
@endsection