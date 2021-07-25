@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <form method="POST" action="{{ route('Company-service.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <x-alert/>
    <div class="row">
     
     <x-forms.input  name="corebusiness" label="Company Core Business" type="text" size="col-md-6"/>
     <x-forms.select  name="companytype" label="Company Type" :optionlist="$companytypes" size="col-md-6"/>
    </div>
    <div class="row mt-5 mb-3">
      <div class="col-md-12">
        <h5><strong>Company Names</strong></h5>
      </div>
    </div>
    <div class="row">   
    <x-forms.input  name="names[]" label="First Prefered Company Name" type="text" size="col-md-12"/>
    </div>
    <div class="row"> 
    <x-forms.input  name="names[]" label="Second Prefered Company Name" type="text" size="col-md-12"/>
    </div>
    <div class="row"> 
    <x-forms.input  name="names[]" label="Third Prefered Company Name" type="text" size="col-md-12"/>
    </div>
    <div class="row mt-5 mb-3">
      <div class="col-md-12">
        <h5><strong>Company Directors</strong></h5>
      </div>
    </div>
    <div class="row">
    <x-forms.input  name="directors[]" label="Director Name" type="text" size="col-md-3"/>
    <x-forms.input  name="nationalID[]" label="Director NationalID" type="text" size="col-md-3"/>
    <x-forms.input  name="address[]" label="Director Address" type="text" size="col-md-3"/>    
    <x-forms.input  name="shares[]" label="Shares Allocated" type="number" size="col-md-3"/>
    </div>
    <div class="row">
    <x-forms.input  name="directors[]" label="Director Name" type="text" size="col-md-3"/>
    <x-forms.input  name="nationalID[]" label="Director NationalID" type="text" size="col-md-3"/>
    <x-forms.input  name="address[]" label="Director Address" type="text" size="col-md-3"/>    
    <x-forms.input  name="shares[]" label="Shares Allocated" type="number" size="col-md-3"/>
    </div>

    <div class="row">
    <x-forms.input  name="directors[]" label="Director Name" type="text" size="col-md-3"/>
    <x-forms.input  name="nationalID[]" label="Director NationalID" type="text" size="col-md-3"/>
    <x-forms.input  name="address[]" label="Director Address" type="text" size="col-md-3"/>    
    <x-forms.input  name="shares[]" label="Shares Allocated" type="number" size="col-md-3"/>
    </div>
    <div class="row">
    <x-forms.input  name="directors[]" label="Director Name" type="text" size="col-md-3"/>
    <x-forms.input  name="nationalID[]" label="Director NationalID" type="text" size="col-md-3"/>
    <x-forms.input  name="address[]" label="Director Address" type="text" size="col-md-3"/>    
    <x-forms.input  name="shares[]" label="Shares Allocated" type="number" size="col-md-3"/>
    </div>
    <div class="row">
    <x-forms.input  name="directors[]" label="Director Name" type="text" size="col-md-3"/>
    <x-forms.input  name="nationalID[]" label="Director NationalID" type="text" size="col-md-3"/>
    <x-forms.input  name="address[]" label="Director Address" type="text" size="col-md-3"/>    
    <x-forms.input  name="shares[]" label="Shares Allocated" type="number" size="col-md-3"/>
    </div>
 
 <x-forms.hidden name="id" :value="$id"/>

    </div>
    <div class="card-footer text-right">
      <x-forms.button type="submit" color="success" size="btn-lg" label="Submit"/>
    </div>
  </div>
 </form>
</div>
@endsection