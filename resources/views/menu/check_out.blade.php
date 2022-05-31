<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Chek Out Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/pesanan" method="POST">
      @csrf
        <div class="modal-body">
          @if (empty($cart) || count($cart)== 0 )
          Tidak ada menu!!!
          @else 
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Menu</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Catatan</th>
                      <th scope="col">Quantity</th>
                  </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                @foreach ($cart as $menu)
                <tr>
                  <input type="text" name="product_id" value="{{ $menu->product_id }}" hidden>
                  <td>{{ $i++ }}</td>
                  <td>{{ $menu->product->title }}</td>
                  <td>Rp {{ number_format($menu->product->harga,2,",",".") }}</td>
                  {{-- <td>{{ $menu->catatan }}</td> --}}
                  <td> <input type="text" name="catatan" id="catatan" value="{{ $menu->catatan }}"> </td>
                  {{-- <td>{{ $menu->quantity }}</td> --}}
                  <td> <input type="int" name="quantity" id="quantty" value="{{ $menu->quantity }}"> </td>
                </tr>  
                @endforeach
              </tbody>
              @endif
          </table>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
              </svg>  
            Keranjang</button>
          {{-- <a href="/transaksi" class="btn btn-primary"> <i class="bi bi-currency-dollar"></i>Beli</a> --}}
          <button type="submit" class="btn btn-primary"><i class="bi bi-currency-dollar"></i>Beli</button>
        </div>
      </div>
    </div>
  </div>
    </form>