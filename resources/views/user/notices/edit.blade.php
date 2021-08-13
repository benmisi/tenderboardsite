@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Procurement notice</li>
  </ol>
</nav>
    <div class="row">
        <div class="col-md-12 text-right mb-4">
<form method="POST" action="{{route('procurement-notice.destroy',$notice->uuid) }}">
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn  btn-sm btn-danger">
              Delete Notice
              </button>
            </form>
        </div>
    </div>
 <form method="POST" action="{{ route('procurement-notice.update',$notice->id) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="card">
    <div class="card-body">
      <x-alert/>
     
        <div class="row">
            <div class="col-md-8">
                <div class="row d-flex justify-content-between">
               
                <h3>Procurement Notice</h3>
                
                </div>
               
             
            </div>
          
        </div>
        <div  class ="row">

        <div class="col-md-8">
            <div class="row">
                <x-forms.inputedit  name="company" label="Company name" type="text" size="col-md-12" :value="$notice->company"/>
            </div>
            <div class="row">
                
                <x-forms.inputedit  name="title" label="Titlr" type="text" size="col-md-12" :value="$notice->title"/>
          
            </div>
            <div class="row">
                <x-forms.textareaedit  name="description" label="description"  size="col-md-12" :value="$notice->description"/>
            </div>
        </div>
        <div class="col-md-4">
             <div class="row">
            
             </div>
            <div class="row">
            <x-forms.select name="category" label="Category" :optionlist="$categories" size="col-md-12"/>
            </div>
            <div class="row">
            <x-forms.select name="type" label="type" :optionlist="$types" size="col-md-12"/>
            </div>
            <div class="row">
            <x-forms.inputedit  name="closingdate" label="Closing Date" type="date" size="col-md-12" :value="$notice->closing_date"/>
            </div>
            <div class="row">
            <x-forms.input  name="filename" label="Attach Advert" type="file" size="col-md-12"/>
            </div>
            <div class="row">
            <x-forms.selectraw name="status" label="Visibility" :options="$visibilitylist" size="col-md-12"/>
            </div>
        </div>

        </div>
       
     
    </div>
    <div class="card-footer text-right">
      <x-forms.button type="submit" color="success" size="btn-lg" label="Submit"/>
    </div>
  </div>
 </form>
</div>
@endsection