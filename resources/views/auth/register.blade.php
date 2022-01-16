@extends('templates.master')

@section('content')
    <!-- body -->
    <section>
        <div class="container block-center">
            <div class="block-acc">
                <div class="row justify-content-center">
                    <img class="img-acc" src="img/img-acc.png" alt="">
                </div>
                <h1 class="righteous text-white">KENYANG.IN</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="input">
                      <div class="row">
                        <div class="col-md-1">
                          <img src="img/name.png" alt="">
                        </div>
                        <div class="col-md-11">
                          <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                  </div>
  
                  <div class="input">
                      <div class="row">
                        <div class="col-md-1">
                          <img src="img/email.png" alt="">
                        </div>
                        <div class="col-md-11">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                      </div>
                  </div>
  
                  <div class="input">
                      <div class="row">
                        <div class="col-md-1">
                          <img src="img/psswd.png" alt="">
                        </div>
                        <div class="col-md-11">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                  </div>

                  <div class="input">
                      <div class="row">
                        <div class="col-md-1">
                          <img src="img/psswd.png" alt="">
                        </div>
                        <div class="col-md-11">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                            </div>
                        </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-warning text-white mt-5">Sign Up</button>
                </form>
            </div>
        </div>
    </section>

@endsection
