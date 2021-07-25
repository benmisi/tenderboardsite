@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <form method="POST" action="{{ route('praz-service.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <x-alert/>
    <div class="row">
     
     <x-forms.input  name="company" label="Company Name" type="text" size="col-md-6"/>
     
      <x-forms.select  name="accounttype" label="Account Type " :optionlist="$companytypes" size="col-md-6"/>
  
    </div>
    <div class="row">
    <x-forms.countrylist  name="country" label="Country" size="col-md-6"/>  
    <x-forms.input  name="city" label="city" type="text" size="col-md-6"/>
    </div>
    <h5 class="mt-2"><strong>PRAZ login Credetials</strong></h5>
    <div class="row">
    <x-forms.selectraw  name="account" label="Do you have an active account on PRAZ Portal " :options="$options" size="col-md-4"/>
  
     <x-forms.input  name="email" label="Email" type="text" size="col-md-4"/> 
     <x-forms.input  name="password" label="Password" type="text" size="col-md-4"/> 
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