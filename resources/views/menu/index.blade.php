@extends('layout-menu.main')
@section('body')
    <div class="row">
        <div class="col">
            @include('menu.status_pesanan')
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/image/image.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/image/image.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/image/image.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
              <div class="dropdown m-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  Menu
                </button>
{{-- ! Modal cart detail --}}
@include('menu.cart_detail')

{{--! Modal CheckOut --}}
@include('menu.check_out')

  {{--! Notofikasi --}}
  <a class="btn btn-dark position-relative" data-bs-toggle="modal" href="#exampleModalToggle "  role="button">
    <i class="bi bi-cart3"></i>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
       
        @if ($cart != null)
        {{ count($cart) }}
        @else
        {{ 0 }}
        @endif
        <span class="visually-hidden">unread messages</span>
      </span>
  </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#makanan-berat">Makanan Berat</a></li>
                  <li><a class="dropdown-item" href="#makanan-ringan">Makanan Kecil</a></li>
                  <li><a class="dropdown-item" href="#minuman">Minuman</a></li>
                </ul>

                <form action="/allmenu" class="d-flex mt-3">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form>

                  @if(session()->has('success'))
<div class="alert alert-success col-lg-5 mt-3" role="alert">
 {{session('success')}} 
</div>
@endif 
              </div>
        </div>
    </div>
 
    <div class="container p-5 mt-3" id="allmenu">
        <div class="row" id="makanan-berat">
            <div class="col">
                <div class="separator">
                    <span class="separator-text"><h4>MAKANAN BERAT</h4></span>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4 mb-5" id="makanan-berat-anak">
                    @foreach ($berat as $item)
                    <a href="/allmenu/{{ $item->slug }}">
                        <div class="col">
                            <div class="card h-100"  style="border-radius:30px 30px 20px 20px">
                                <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="image"  style="border-radius:200px 10px 200px 0px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}  <input type="hidden" value="{{$item->status }}">
                                        @if ($item->status == 1)
                                        <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $item->category->title }} <span class="badge bg-success text-light">{{ $item->status ? 'ready' : 'restock'}}</span></div></th>
                                        @else
                                        <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $item->category->title }} <span class="badge bg-danger text-light">{{ $item->status ?  'ready' : 'restock'}}</span></div></th>
                                    @endif</h5>
                                    <p class="card-text">{{ $item->exce }}</p>
                                </div>
                                <div class="card-footer" style="border-radius:0px 0px 20px 20px">
                                    <small class="text-muted">Di Update : {{ $item->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-5" id="makanan-ringan">
            <div class="col">
                <div class="separator">
                    <span class="separator-text"><h4>MAKANAN RINGAN</h4></span>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($ringan as $item)
                    <a href="/allmenu/{{ $item->slug }}">
                        <div class="col">
                            <div class="card h-100" style="border-radius:30px 30px 20px 20px">
                                <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="image" style="border-radius:200px 10px 200px 0px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}  <input type="hidden" value="{{$item->status }}">
                                        @if ($item->status == 1)
                                        <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $item->category->title }} <span class="badge bg-success text-light">{{ $item->status ? 'ready' : 'restock'}}</span></div></th>
                                        @else
                                        <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $item->category->title }} <span class="badge bg-danger text-light">{{ $item->status ?  'ready' : 'restock'}}</span></div></th>
                                    @endif</h5>
                                    <p class="card-text">{{ $item->exce }}</p>
                                  </div>
                                  <div class="card-footer"  style="border-radius:0px 0px 20px 20px">
                                    <small class="text-muted">Di Update : {{ $item->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-5 p-2" id="minuman">
            <div class="col">
                <div class="separator">
                    <span class="separator-text"><h4>MINUMAN</h4></span>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($minuman as $item)
                    <a href="/allmenu/{{ $item->slug }}">
                        <div class="col">
                            <div class="card h-100" style="border-radius:30px 30px 20px 20px">
                                <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="image" style="border-radius:200px 10px 200px 0px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}  <input type="hidden" value="{{$item->status }}">
                                        @if ($item->status == 1)
                                        <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $item->category->title }} <span class="badge bg-success text-light">{{ $item->status ? 'ready' : 'restock'}}</span></div></th>
                                        @else
                                        <th scope="row" colspan="2"><div id="emailHelp" class="form-text">{{ $item->category->title }} <span class="badge bg-danger text-light">{{ $item->status ?  'ready' : 'restock'}}</span></div></th>
                                    @endif</h5>
                                    <p class="card-text">{{ $item->exce }}</p>
                                </div>
                                <div class="card-footer"  style="border-radius:0px 0px 20px 20px">
                                    <small class="text-muted">Di Update : {{ $item->updated_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>







    <div class="container p-5 mt-3">
        <div class="row">
            <div class="col">
                <div class="arrow">
                    <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="check">
                      </div>
                </div>
            </div>
        </div>
    </div>



@endsection