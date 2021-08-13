@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <form method="POST" action="{{ route('vendor-registrations.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <x-alert/>
     
        <div class="row">
            <div class="col-md-8">
                <h3>Application Details</h3>
            </div>
          
        </div>
       <div class="row">
       <x-forms.input  name="company" label="Company name" type="text" size="col-md-6"/>
       <x-forms.selectraw  name="applicationtype" label="Application Type" :options="$types" size="col-md-6"/>
       </div>
       <div class="row">
       <x-forms.input  name="city" label="City" type="text" size="col-md-6"/>
       <x-forms.selectraw  name="country" label="Your Country" :options="$countries" size="col-md-6"/>
       </div>
       <div class="row">
       <x-forms.input  name="zipcode" label="Zipcode" type="text" size="col-md-6"/>
       <x-forms.input  name="state" label="State" type="text" size="col-md-6"/>
       </div>
       <h5 class="mt-4">Bank Details</h5>
       <div class="row mt-4">
       <x-forms.input  name="bank" label="Bank name" type="text" size="col-md-6"/>
       <x-forms.input  name="accountnumber" label="Accountnumber" type="text" size="col-md-6"/>
       </div>
       <div class="row">
       <x-forms.input  name="branch" label="Branch name" type="text" size="col-md-6"/>
       <x-forms.input  name="branchcode" label="Branch Code" type="text" size="col-md-6"/>
       </div>

       <h5 class="mt-4">Applicant Details</h5>
       <div class="row mt-4">
       <x-forms.input  name="name" label="Name" type="text" size="col-md-6"/>
       <x-forms.input  name="surname" label="surname" type="text" size="col-md-6"/>
       </div>
       <div class="row mt-4">
       <x-forms.input  name="email" label="Email" type="text" size="col-md-6"/>
       <x-forms.input  name="position" label="Position" type="text" size="col-md-6"/>
       </div>
       <div class="row mt-4">
       <x-forms.input  name="year" label="Application Year" type="number" size="col-md-6"/>
       <x-forms.textarea  name="address" label="Address" type="text" size="col-md-6"/>
       </div>
    </div>
    <div class="card-footer text-right">
      <x-forms.button type="submit" color="success" size="btn-lg" label="Submit"/>
    </div>
  </div>
 </form>
</div>
@endsection