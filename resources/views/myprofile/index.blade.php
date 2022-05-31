@extends('layout-menu.main')
@section('body')
    <style>
        .col-8{
            border-radius: 20px
        }
        .form-control{
            
            border-radius: 20px
        }
        .btn{
            border-radius: 20px
        }
    </style>
        @foreach ($profile as $item)
    <div class="container">
        <form action="myprofile/{{ $item->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-4 px-5 mt-3">
                    <input type="hidden" name="oldImage" value="{{ $item->image }}">
                    @if ($item->image)
                    <img src="{{ asset('storage/'. $item->image) }}" class="img-thumbnail rounded-circle" alt="user">
                    @else
                    <img src="image/default.png" class="img-thumbnail rounded-circle" alt="user">
                    @endif
                    <div class="input-group mt-3">
                        <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" id="inputGroupFile02">
                    </div>
                    <ul >
                        <li><div style="color: red" class="form-text">file size : < 1mb </div></li>
                        <li><div style="color: red" class="form-text">image size : 200 x 200 px</div></li>
                    </ul>
                    @if(session()->has('succes'))
                    <div class="alert alert-success col-md-10" role="alert">
                     {{session('succes')}} 
                    </div>
                    @endif 
                </div>



                <div class="col-8 mb-3 mt-3 " style="background-color: #f6f7fb">
                        <div class="mt-3">
                            <b>Basic Infomation</b>
                        </div>
                        <div class="mt-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $item->name }}">
                        </div>
                        <div class="mt-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ $item->email }}" disabled>
                    </div>
                    <div class="mt-3">
                        <label for="exampleInputEmail1" class="form-label">Gender</label>
                        <select class="form-select" style="border-radius:20px" name="jk" id="jk">
                            @if ($item->jk)
                            <option selected>{{ $item->jk }}</option>
                            @endif
                            <option >Male</option>
                            <option >Famale</option>
                          </select>
                    </div>
                    <div class="mt-3">
                        <label for="exampleInputEmail1" class="form-label">Brithday</label>
                        <input type="date" class="form-control  @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ $item->tanggal }}">
                    </div>
                    <div class="mt-3">
                        <label for="exampleInputEmail1" class="form-label">Phone</label>
                        <input type="number" class="form-control  @error('nohp') is-invalid @enderror" id="nohp" name="nohp" value="{{ $item->nohp }}">
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="exampleInputEmail1" class="form-label">City</label>
                        <input type="text" class="form-control  @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ $item->kota }}">
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address</label>
                        <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ $item->alamat }}">
                    </div>
                    <div class="mt-3 mb-3">
                        <b>Sosial Media</b>
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Facebook</label>
                        <input type="text" class="form-control  @error('fb') is-invalid @enderror" id="fb" name="fb" value="{{ $item->fb }}">
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="exampleInputEmail1" class="form-label">instagram</label>
                        <input type="text" class="form-control  @error('ig') is-invalid @enderror" id="ig" name="ig" value="{{ $item->ig }}">
                    </div>
                    <div class="mt-3 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Twitter</label>
                        <input type="text" class="form-control  @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ $item->twitter }}">
                    </div>
                    @endforeach
                    <button class="btn btn-dark" type="submit" style="float: right">Save change</button>
                </div>
            </form>
        </div>
    </div>
@endsection
