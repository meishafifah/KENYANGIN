@extends('templates.master')
@section('content')
    
<section>
    <div class="container keranjang">
        <div class="row mt-4 mb-4">
            <div class="col-md-12">
                <h1 class="righteous">Pesan Sekarang Juga !</h1>
            </div>
        </div>
        <div class="block-white">
            @foreach ($carts as $cart)
                    <div class="row">
                        <h3 class="righteous mb-4">{{$cart->menu->restaurant->name}}</h3>
                        <div class="col-md-3">
                            <img src="{{asset('storage/'. $cart->menu->picture)}}" alt="">
                        </div>
                        <div class="col-md-6">
                            <h4 class="righteous">{{$cart->menu->name}}</h4>
                            <p class="p-300">{{$cart->quantity}} x</p>
                            <h4 class="p-500 biru">Rp {{$cart->menu->price}}</h4>
                        </div>
                        <div class="col-md-3 kanan">
                        <form action="{{route('cart.destroy', $cart->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="no-btn p-300 biru" type="submit">hapus</button>
                            </form>
                        </div>
                        <form action="{{route('cart.update', $cart->id)}}" method="POST">
                            @method('put')
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="note" id="note" value="{{$cart->note}}">
                                </div>
                                <div class="col-md-2 kanan">
                                    <button class="btn btn-kenyang" type="submit">Add Note</button>
                                </div>
                            </div>
                        </form>
                        <hr class="mt-3">
                    </div>
            @endforeach
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="p-300">Total : <span class="p-500 biru">RP {{$total}}</span></h4>
                    </div>
                    <div class="col-md-3 kanan">
                        <a href=" {{route('cart.checkout')}} " class="btn btn-kenyang">Checkout</a>
                    </div>
                </div>
        </div>
    </div>
</section>


@endsection