@extends('templates.master')

@section('content')
        <!-- info makanan -->
        <section class="toko">
            <div class="cover">
                <img class="w-100" src="{{asset('storage/'. $restaurant->picture)}}" alt="">
            </div>
            <div class="container">
                <div class="row mt-4">
                    <div class="col-md-7">
                        <h1 class="p-700">{{ $restaurant->name }}</h1>
                        <p>{{ $restaurant->description }}</p>
                        <p>
                            <img src="{{asset('img/ic-star.png')}}" alt="">
                            <img src="{{asset('img/ic-star.png')}}" alt="">
                            <img src="{{asset('img/ic-star.png')}}" alt="">
                            <img src="{{asset('img/ic-star.png')}}" alt="">
                            <img src="{{asset('img/ic-star.png')}}" alt="">
                            {{ $restaurant->rating }} (100+)
                        </p>
                    </div>
    
                    <div class="col-md-5">
                        <div class="kupon mb-2">
                            <h3 class="righteous">kode : KENYANGIN</h3>
                        </div>
                        <p>masukkan kode KENYANGIN untuk mendapatkan diskon 30% , syarat dan ketentuan berlaku</p>
                    </div>
                </div>

                <hr class="mb-4">
                
                @if (Auth::user())
                @if (Auth::user()->role == 'admin')
                <div class="mb-5">
                    <a class="btn btn-kenyang" href="{{route('menu.create', $restaurant->slug)}}">Tambah menu</a>
                </div> 
                @endif
                @endif

                <div class="row">
                    @foreach ($menus as $index => $menu)
                        
                        <div class="col-md-4 mb-3">
                            <div class="block-menu">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="ic-menu" src="{{asset('storage/'.$menu->picture)}}" alt="">
                                    </div>
                                    <div class="col-md-6 align-self-center">
                                        <h4> {{ $menu->name }} </h4>
                                        <h4 class="biru">RP {{ $menu->price }}</h4>
                                    </div>
                                </div>
                                <p class="mt-2">{{ $menu->description }}</p>

                                @if (Auth::user())
                                    @if (Auth::user()->role == 'admin')
                                        <div class="d-flex mt-3">  
                                            <a href=" {{ route('menu.edit', $menu->id) }} " class="btn btn-kenyang me-2">Edit</a>
                                            
                                            <form action="{{ route('menu.destroy', $menu->id) }} " method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-kenyang">Hapus</button>
                                            </form>
                                        </div> 
                                    @else
                                    <form action="{{route('addToCart', [$restaurant->id, $menu->id])}}" method="post">
                                        @csrf
                                        <div class="row">
                                                <div class="col-md-8">
                                                    <div class="d-flex justify-content-end">
                                                        <div class="no-btn" onclick="decrement({{$index}})">
                                                            <img src="{{asset('img/ic-minus.png')}}" alt="">
                                                        </div>

                                                        <input class="text-center" id="quantity{{$index}}" name="quantity" type="number" min=1 value="1">
                                                        
                                                        <div class="no-btn" onclick="increment({{$index}})">
                                                            <img src="{{asset('img/ic-plus.png')}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn">
                                                        <img src="{{asset('img/ic-cart.png')}}" alt="">
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <script>
            function increment(urutan) {
                document.getElementById(`quantity${urutan}`).stepUp();
            }
            function decrement(urutan) {
                document.getElementById(`quantity${urutan}`).stepDown();
            }
        </script>
    
@endsection