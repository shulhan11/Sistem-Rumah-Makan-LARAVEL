
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Keranjang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
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
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <form action="/cart-detail" method="POST">
                @method('put')
                @csrf
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($cart as $menu)
                <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $menu->product->title }}</td>
                <td>Rp {{ number_format($menu->product->harga,2,",",".") }}</td>
                {{-- <td>{{ $menu->catatan }}</td> --}}
                <td><input type="text"  class="form-control" name="catatan" value="{{ $menu->catatan }}"></td>
                {{-- <td>{{ $menu->quantity }}</td> --}}
                <td><input type="text"  class="form-control" name="quantity" value="{{ $menu->quantity }}"></td>
                <form action="/cart-detail/{{ $menu->id }}" method="POST">
                    @method('delete')
                    @csrf
                    {{-- <td><a class="badge bg-danger" href="{{ url('hapus/'  . $menu) }}">Batal</a> </td> --}}
                    <td> <button class="badge rounded-pill bg-danger" type="submit" onclick="return confirm('yakiin')" >delete</button></td>
                    </form>
                </tr>  
                @endforeach
            </tbody>
            @endif
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info" disabled>Updated</button>
        </form>
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                <i class="bi bi-cart-check"></i>
            Check Out</button>
        </div>
    </div>
    </div>
</div>