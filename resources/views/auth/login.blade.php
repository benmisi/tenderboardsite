@extends('layouts.app')

@section('content')
<section  class="header">
    <div class="container">
     <div class="row" id="header-body">
         <div class="col-md-6 offset-md-3 text-center">
             <div id="header-title">Sign In</div>
             <div id="header-subtitle">Please Sign in to access our services </div>
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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                   
                        <x-forms.input type="email" name="email" id="email" label="Email" size="col-md-12"/>
                        <x-forms.input type="password" name="password" id="password" label="Password" size="col-md-12"/>                 
                          <div class="form-group">
                            <x-forms.button type="submit" size="btn-block" color="primary" label="Sign Up"/>
                            </div>
                    </form>
                    </div>
                    <div class="card-footer text-center">
                         <p>Do not have an account? <a href="{{route('register')}}">Sign Up</a></p>
                         <p>Forgot your password? <a href="{{route('password.request')}}">Reset Password</a></p>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>

@endsection
