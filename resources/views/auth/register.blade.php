@extends('layouts.app')

@section('content')
<section  class="header">
    <div class="container">
     <div class="row" id="header-body">
         <div class="col-md-6 offset-md-3 text-center">
             <div id="header-title">Account Creation</div>
             <div id="header-subtitle">Create an account with us to enjoy our services </div>
         </div>
     </div>
    </div>
   
    
</section>
<section class="main_body">
<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-lg">
                    <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name">
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Suname') }}</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" aria-describedby="surname">
                        @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('Email') }}</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('Password') }}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" aria-describedby="password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" aria-describedby="password_confirmation">
                       
                    </div>

                  
                    <div class="form-group">
                            
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Sign Up') }}
                                </button>
                            <p>By clicking the 'Sign Up' button, you confirm that you accept our
Terms of use and Privacy Policy</p>
                    </div>
                    </form>
                    </div>
                    <div class="card-footer text-center">
                         <p>Have an account? <a href="{{route('login')}}">Log In</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

 

@endsection