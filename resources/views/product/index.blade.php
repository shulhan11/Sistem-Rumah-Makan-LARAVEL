@extends('layout-dashboard.main')
@section('body')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Product</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>
    <form class="d-flex" action="/product">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="container">
        <div class="row mt-3">
            <div class="col">
              {{-- Input --}}
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Menu
  </button>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="/product" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Menu</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                @error('title')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
              </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug">
                @error('slug')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3 mt-1">
                <label for="exampleInputPassword1" class="form-label">Category</label>
                <select class="form-select mb-3 @error('category') is-invalid @enderror" name="category_id" aria-label="Default select example">
                  <option selected value=0>Pilih Category</option>
                  @foreach ($category as $ct)
                  <option value="{{ $ct->id }}">{{ $ct->title }}</option>
                  @endforeach
                </select>
                @error('category')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label ">Harga</label>
                <input type="text" name="harga" class="form-control @error('title') is-invalid @enderror" id="harga">
                @error('harga')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Deskripsi Singkat</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="exce" id="exce">
                @error('exce')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating">
                <textarea class="form-control @error('title') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" name="deskripsi" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Deskripsi</label>
                @error('deskripsi')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3 mt-1">
                <label for="exampleInputPassword1" class="form-label">Status</label>
                <select class="form-select mb-3" name="status" aria-label="Default select example">
                          <option selected>Pilih Status</option>
                          <option value="1">ready</option>
                          <option value="0">restock</option>
                        </select>
                    </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  {{-- EndInput --}}
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-10" role="alert">
   {{session('success')}} 
  </div>
  @endif 
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status</th>
                        <th scope="col">aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $key => $item)    
                        <tr>
                        <th scope="row">{{ $product->firstItem() + $key }}</th>
                        <td >{{ $item->Category->title }}</td>
                        <td >{{ $item->title }}</td>
                        <td >
                          <p hidden>{{ $item->status }}</p>
                          @if ($item->status == true)
                              {{ $item->status ? 'ready' : 'restock' }}
                              @else
                              {{ $item->status ? 'ready' : 'restock' }}
                          @endif
                        </td>
                        <td >
                          <div class="row">
                            <div class="col">
                              <a href="/product/{{ $item->slug }}" class="badge rounded-pill bg-info">show</a>
                            </div>
                            <div class="col">
                              <a href="/product/{{ $item->slug }}/edit" class="badge rounded-pill bg-primary">edit</a>
                            </div>
                            <div class="col">
                              <form action="/product/{{ $item->slug }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="badge rounded-pill bg-danger" type="submit" onclick="return confirm('yakiin')" >delete</button>
                              </form>
                            </div>
                          </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  {{ $product->links() }}
            </div>
        </div>
    </div>
@endsection
