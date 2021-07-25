@extends('layouts.user')

@section('content')
<div class="container">
    <x-alert/>
<x-user.header/>   
<x-user.myadverts/>
   
 @forelse ($services as $service )
 <div class="row mt-4">
     <x-user.services :service="$service" size="col-md-12"/>
 </div>
 @empty
     
 @endforelse
  

  
</div>
@endsection
