@extends('layouts.admin')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin-users.index')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Imports Users</li>
  </ol>
</nav>
    <x-alert/>
  
    <div class="row mt-4">
       <div class="col-md-6 offset-md-3">
       <form method="POST" action="{{ route('admin-users.store') }}" enctype="multipart/form-data">
         @csrf
           <div class="card">
               <div class="card-header d-flex justify-content-between">
                <div>Import Users</div>
               </div>
               <div class="card-body">
               <div class="row">     
     <x-forms.input  name="filename" label="Import Excel template" type="file" size="col-md-12"/>
    </div>
               </div>
               <div class="card-footer text-right">
                    <x-forms.button type="submit" color="success" size="btn-lg" label="Submit"/>
                </div>
           </div>
       </form>
       </div>
    </div>

</div>

@endsection