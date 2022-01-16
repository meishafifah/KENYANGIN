@extends('templates/master')

@section('content')
<section class="menu">
    <div class="block-hr">
        <h2>Menu KENYANG.IN</h2>
    </div>
    <div class="container">
        <a href=" {{ route('restaurant.create') }} ">Tambah restoran</a>
        <div class="row">
            <div class="col-md-12">
                    <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Banyak Promo</h2>
            </div>
        </div>
        <div class="row">
            {{-- looping data --}}
            @foreach ($restaurants as $restaurant)
            <div class="col-md-3">
                <a href=" {{ route('restaurant.show', $restaurant->slug) }} ">
                    <div class="card">
                        <img src="img/menu.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text p-300">0.5 km</p>
                          <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                          <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> {{ $restaurant->rating }}</p>
                          <div class="d-flex">
                              
                              <a href=" {{ route('restaurant.edit', $restaurant->slug) }} " class="btn btn-kenyang me-2">Edit</a>
                            
                              <form action="{{ route('restaurant.destroy', $restaurant->slug) }} " method="post">
                                  @method('delete')
                                  @csrf

                                  <button type="submit" class="btn btn-kenyang">Hapus</button>
                              </form>
                          </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


@endsection