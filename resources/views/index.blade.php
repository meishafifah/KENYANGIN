@extends('templates/master')
@section('content')

    <!-- hero -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 txt">
                    <h1 class="p-700">Makan apa hari ini?</h1>
                    <p>Kamu bingung mau makan apa hari ini? Coba deh kamu cek menu-menu enak dengan klik tombol dibawah ini</p>
                    <div class="btn btn-warning">KUY!</div>
                </div>
                <div class="row col-md-6">
                    <img class="w-100" src="img/hero.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Menu -->
    <section class="menu">
        <div class="block-hr">
            <h2>Menu KENYANG.IN</h2>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Banyak Promo</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($restaurants as $restaurant)
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> {{ $restaurant->rating }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>


            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Banyak Promo</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Toko Ter-Populer</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Rekomendasi</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-3">
                    <a href="#">
                        <div class="card">
                            <img src="img/menu.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                              <p class="card-text p-300">0.5 km</p>
                              <h5 class="card-title p-700">Ndok Dadar, Klaten</h5>
                              <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> 4.9</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection