@extends('layout-dashboard.main')
@section('body')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
      </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col">
            <form action="/product/{{ $product->slug }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Menu</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $product->title }}">
                    @error('title')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                  </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ $product->slug }}">
                    @error('slug')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3 mt-1">
                    <label for="exampleInputPassword1" class="form-label">Category</label>
                    <select class="form-select mb-3 @error('category') is-invalid @enderror" name="category_id" aria-label="Default select example">
                      @foreach ($category as $ct)
                      @if (old('category_id',$product->category_id == $ct->id))
                      <option value="{{ $ct->id }}" selected>{{ $ct->title }}</option>
                      @else
                      <option value="{{ $ct->id }}">{{ $ct->title }}</option>
                      @endif
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
                    <input type="text" name="harga" class="form-control @error('title') is-invalid @enderror" id="harga" value="{{ $product->harga }}">
                    @error('harga')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Deskripsi Singkat</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="exce" id="exce" value="{{ $product->exce }}">
                    @error('exce')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input class="form-control @error('title') is-invalid @enderror" placeholder="Leave a comment here" id="floatingTextarea2" name="deskripsi" style="height: 100px" value="{{ $product->deskripsi }}">
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
                        @if (old('status',$product->status == true))
                        <option value="1" selected>ready</option>
                        @else
                        <option value="0">restock</option>
                        @endif    
                            </select>
                        </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
        </div>
    </div>
</div>

@endsection