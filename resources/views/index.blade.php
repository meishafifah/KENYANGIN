@extends('templates/master')
@section('content')

    <!-- hero -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 txt">
                    <h1 class="p-700">Makan apa hari ini?</h1>
                    <p>Kamu bingung mau makan apa hari ini? Coba deh kamu cek menu-menu enak dengan klik tombol dibawah ini</p>
                    <a href="#menu" class="btn btn-warning">KUY!</a>
                </div>
                <div class="row col-md-6">
                    <img class="w-100" src="img/hero.png" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Menu -->
    <section id="menu" class="menu">
        <div class="block-hr">
            <h2>Menu KENYANG.IN</h2>
        </div>
        <div class="container">
            {{-- pastikan admin --}}
            @if (Auth::user())
                @if (Auth::user()->role == "admin")
                    <a class="btn btn-kenyang" href=" {{ route('restaurant.create') }} ">Tambah restoran</a>
                @endif
            @endif

            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Banyak Promo</h2>
                </div>
            </div>
            <div class="row">
            @foreach ($restaurantsPromo as $restaurant)
                <div class="col-md-3 mb-3">
                    <a href=" {{ route('restaurant.show', $restaurant->slug) }} ">
                        <div class="card">
                            <img src="{{asset('storage/'. $restaurant->picture)}}" class="ic-toko card-img-top" alt="...">
                            <div class="card-body">
                            <p class="card-text p-300">0.5 km</p>
                            <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                            <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> {{ $restaurant->rating }}</p>
                            
                            @if (Auth::user())
                            @if (Auth::user()->role == 'admin')
                            <div class="d-flex mt-3">  
                                <a href=" {{ route('restaurant.edit', $restaurant->slug) }} " class="btn btn-kenyang me-2">Edit</a>
                                
                                <form action="{{ route('restaurant.destroy', $restaurant->slug) }} " method="post">
                                    @method('delete')
                                    @csrf

                                    <button type="submit" class="btn btn-kenyang">Hapus</button>
                                </form>
                            </div> 
                            @endif
                            @endif
                            
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>


            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Toko Ter-Populer</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($restaurantsPopuler as $restaurant)
                    <div class="col-md-3 mb-3">
                        <a href=" {{ route('restaurant.show', $restaurant->slug) }} ">
                            <div class="card">
                                <img src="{{asset('storage/'. $restaurant->picture)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <p class="card-text p-300">0.5 km</p>
                                <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                                <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> {{ $restaurant->rating }}</p>
                                
                                @if (Auth::user())
                                @if (Auth::user()->role == 'admin')
                                <div class="d-flex mt-3">  
                                    <a href=" {{ route('restaurant.edit', $restaurant->slug) }} " class="btn btn-kenyang me-2">Edit</a>
                                    
                                    <form action="{{ route('restaurant.destroy', $restaurant->slug) }} " method="post">
                                        @method('delete')
                                        @csrf
    
                                        <button type="submit" class="btn btn-kenyang">Hapus</button>
                                    </form>
                                </div> 
                                @endif
                                @endif

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>

            <div class="row">
                <div class="col-md-12">
                        <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Rekomendasi</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($restaurantsRekomendasi as $restaurant)
                    <div class="col-md-3 mb-3">
                        <a href=" {{ route('restaurant.show', $restaurant->slug) }} ">
                            <div class="card">
                                <img src="{{asset('storage/'. $restaurant->picture)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <p class="card-text p-300">0.5 km</p>
                                <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                                <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> {{ $restaurant->rating }}</p>
                                
                                @if (Auth::user())
                                @if (Auth::user()->role == 'admin')
                                <div class="d-flex mt-3">  
                                    <a href=" {{ route('restaurant.edit', $restaurant->slug) }} " class="btn btn-kenyang me-2">Edit</a>
                                    
                                    <form action="{{ route('restaurant.destroy', $restaurant->slug) }} " method="post">
                                        @method('delete')
                                        @csrf
    
                                        <button type="submit" class="btn btn-kenyang">Hapus</button>
                                    </form>
                                </div> 
                                @endif
                                @endif

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>
            
        </div>
    </section>

@endsection