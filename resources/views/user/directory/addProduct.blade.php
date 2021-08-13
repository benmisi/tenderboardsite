@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('directory.index')}}">My Directory</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
  </ol>
</nav>
  <div class="row">
    <div class="col-md-8 offset-md-2">
 <form method="POST" action="{{ route('directory_products.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="card">
    <div class="card-body">
      <x-alert/>
    <div class="row">     
     <x-forms.input  name="name" label="Product Name" type="text" size="col-md-12"/>
    </div>
    <div class="row">     
     <x-forms.input  name="image" label="Product Image" type="file" size="col-md-12"/>
    </div>
 
 <x-forms.hidden name="id" :value="$id"/>

    </div>
    <div class="card-footer text-right">
      <x-forms.button type="submit" color="success" size="btn-lg" label="Submit"/>
    </div>
  </div>
 </form>
    </div>
</div>
@endsection