@extends('layout-home.main')
@section('body')
    <div class="container mt-5 md-3" id="home">
        <div class="row">
            <div class="col">
                <div class="card bg-dark text-white md-3" id="card1">
                    <img src="image/image.png" class="card-img" alt="bg">
                    <div class="card-img-overlay">
                        <div class="row">
                            <div class="col-5 md-3">
                                <img src="image/original.jpeg" alt="me">
                                <div class="me md-3">
                                    <ul style="list-style: none">
                                        <li>Nama : Shulhan Hasya</li>
                                        <li>Umur : 23 Tahun</li>
                                        <li>Pekerjaan : Mencari Kerja</li>
                                        <li>Pemilik dari restaurant KING RESTO BANDUNG yang belum ada tapi insyal Allah ada AMIN!</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-7 mt-3 md-3" style="text-align: center">
                              @auth
                              {{ auth()->user()->name }}  
                              
              <form action="/logout" method="POST">
                @csrf
              <button class="btn btn-dark" type="submit">Log Out</button> </a>
            </form>
            <h2 class="card-title">KING RESTO BANDUNG</h2>
            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat dicta delectus tempora odit facere eos beatae voluptate quo cum unde sed possimus ex, aut molestias distinctio autem, perferendis quidem fugit. Quis cupiditate, ex facere, dignissimos aut natus amet, iusto eveniet consequatur modi accusamus qui? Impedit unde ut vero atque eum tenetur sunt, consequatur ipsa itaque saepe a quidem cum id, eveniet sapiente maiores quibusdam, delectus at totam! Deserunt perspiciatis, quod quam nobis repudiandae iure inventore velit, rerum quia soluta amet odit modi doloremque atque quibusdam? Tempora dolor eveniet consequuntur dolorem tenetur molestiae cupiditate mollitia iusto qui necessitatibus. Facere quaerat tempore impedit autem error nesciunt vitae, esse assumenda deserunt porro perferendis tempora sunt odio minima itaque omnis commodi veritatis vero accusantium, similique doloribus, eum ratione laboriosam cumque. Aspernatur sequi reiciendis architecto explicabo. Neque assumenda, tenetur iste, doloremque quas eaque sapiente omnis molestias illum atque dolore qui deleniti ipsa porro, tempora laudantium!.</p>
            <a href="allmenu" class="btn btn-dark">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@else
<h2 class="card-title">KING RESTO BANDUNG</h2>
<p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat dicta delectus tempora odit facere eos beatae voluptate quo cum unde sed possimus ex, aut molestias distinctio autem, perferendis quidem fugit. Quis cupiditate, ex facere, dignissimos aut natus amet, iusto eveniet consequatur modi accusamus qui? Impedit unde ut vero atque eum tenetur sunt, consequatur ipsa itaque saepe a quidem cum id, eveniet sapiente maiores quibusdam, delectus at totam! Deserunt perspiciatis, quod quam nobis repudiandae iure inventore velit, rerum quia soluta amet odit modi doloremque atque quibusdam? Tempora dolor eveniet consequuntur dolorem tenetur molestiae cupiditate mollitia iusto qui necessitatibus. Facere quaerat tempore impedit autem error nesciunt vitae, esse assumenda deserunt porro perferendis tempora sunt odio minima itaque omnis commodi veritatis vero accusantium, similique doloribus, eum ratione laboriosam cumque. Aspernatur sequi reiciendis architecto explicabo. Neque assumenda, tenetur iste, doloremque quas eaque sapiente omnis molestias illum atque dolore qui deleniti ipsa porro, tempora laudantium!.</p>
<a href="allmenu" class="btn btn-dark">Lihat Selengkapnya</a>
<p> <span>punya akun ? <a href="/login">login</a> sekarang!</span></p>
<p style="line-height: 0"> <span>ga punya akun ? yuk <a href="/register">register</a> sekarang!</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endauth
      

{{-- end Home --}}

<div class="container p-3 mt-5" id="menu">
    <h1 class="title-menu">Menu Favorite</h1>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
      </div>
</div>

{{-- konten end --}}

<div class="container p-3 mt-5 md-3" id="about">
    <div class="row row-cols-md-2 g-4">
        <div class="col-3 md-3">
           <h4>ABOUT US</h4> 
           <p>Manu</p>
           <p>My Brand</p>
           <p>Customer Services</p>
           <p>Give Away</p>
           <p>Lokasi</p>
        </div>
        <div class="col-3 md-3">
           <h3>MY ACCOUNT</h3> 
           <p>Manu</p>
           <p>My Brand</p>
           <p>Customer Services</p>
           <p>Give Away</p>
           <p>Lokasi</p>
        </div>
        <div class="col-3 md-3">
           <h3>SERVICE & POLICIES</h3> 
           <p>Manu</p>
           <p>My Brand</p>
           <p>Customer Services</p>
           <p>Give Away</p>
           <p>Lokasi</p>
        </div>
        <div class="col-3 md-3">
           <h3>CONNECT WITH US</h3> 
           <p>Manu</p>
           <p>My Brand</p>
           <p>Customer Services</p>
           <p>Give Away</p>
           <p>Lokasi</p>
        </div>
    </div>
</div>
<div class="row" id="footer">
    <p>Contact Us | Privacy Policy | Terms Of Use | copyright 2022 Shulhan hasya</p>
</div>
@endsection