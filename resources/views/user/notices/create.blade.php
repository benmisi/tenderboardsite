@extends('layouts.user')

@section('content')
<div class="container">
 <form method="POST" action="{{ route('procurement-notice.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="card">
    <div class="card-body">
      <x-alert/>
     
        <div class="row">
            <div class="col-md-8">
                <h3>Procurement Notice</h3>
            </div>
          
        </div>
        <div  class ="row">

        <div class="col-md-8">
            <div class="row">
                <x-forms.input  name="company" label="Company name" type="text" size="col-md-12"/>
            </div>
            <div class="row">
                <x-forms.input  name="title" label="Title" type="text" size="col-md-12"/>
            </div>
            <div class="row">
                <x-forms.textarea  name="description" label="description"  size="col-md-12"/>
            </div>
        </div>
        <div class="col-md-4">
            
            <div class="row">
            <x-forms.select name="category" label="Category" :optionlist="$categories" size="col-md-12"/>
            </div>
            <div class="row">
            <x-forms.select name="type" label="type" :optionlist="$types" size="col-md-12"/>
            </div>
            <div class="row">
            <x-forms.input  name="closingdate" label="Closing Date" type="date" size="col-md-12"/>
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