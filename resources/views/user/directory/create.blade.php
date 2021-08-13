@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('directory.index')}}">My Directory</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Directory</li>
  </ol>
</nav>
 <form method="POST" action="{{ route('directory.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <x-alert/>
    <div class="row">     
     <x-forms.input  name="company" label="Company" type="text" size="col-md-12"/>
    </div>
    <div class="row">     
     <x-forms.input  name="emails" label="Emails" type="text" size="col-md-12"/>
    </div>
    <div class="row">     
     <x-forms.input  name="phones" label="Phone numbers" type="text" size="col-md-12"/>
    </div>
    <div class="row">     
     <x-forms.textarea  name="address" label="Addresses" type="text" size="col-md-12"/>
    </div>
    <div class="row">     
     <x-forms.textarea  name="bio" label="Company Bio" type="text" size="col-md-12"/>
    </div>
    
 


    </div>
    <div class="card-footer text-right">
      <x-forms.button type="submit" color="success" size="btn-lg" label="Submit"/>
    </div>
  </div>
 </form>
</div>
@endsection