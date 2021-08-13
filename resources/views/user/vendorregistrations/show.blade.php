@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('vendor-registrations.index')}}">Vendor Number Applications </a></li>
    <li class="breadcrumb-item active" aria-current="page">Vendor Number Application</li>
  </ol>
</nav>
    <x-alert/>

    <div class="card">
    <div class="card-header d-flex justify-content-between">
                     <div>Vendor Number Application</div>
    </div>
    <div class="card-body">
    <table class="table table-stripped">
     
      <tbody>
         <tr><th>Company Name</th><td>{{$application->company}}</td></tr>  
         <tr><th>Invoice number</th><td>{{$application->invoicenumber}}</td></tr> 
         <tr><th>Status</th><td>{{$application->status}}</td></tr> 
         <tr><th>Address</th><td>{{$application->address}}</td></tr>
         <tr><th>City</th><td>{{$application->city}}</td></tr>
         <tr><th>Country</th><td>{{$application->country}}</td></tr>
         <tr><th>State</th><td>{{$application->state}}</td></tr>
         <tr><th>Zipcode</th><td>{{$application->zipcode}}</td></tr>
         <tr><th>Bank name</th><td>{{$application->bank}}</td></tr>
         <tr><th>Account number</th><td>{{$application->accountnumber}}</td></tr>
         <tr><th>Branch</th><td>{{$application->branch}}</td></tr>
         <tr><th>Branch code</th><td>{{$application->branchcode}}</td></tr>
         <tr><th>Applicant name</th><td>{{$application->name}} {{$application->surname}}</td></tr>
         <tr><th>Applicant Position</th><td>{{$application->position}}</td></tr>
         <tr><th>Registration Year</th><td>{{$application->year}}</td></tr>
         <tr><th>Application Status</th><td>{{$application->status}}</td></tr>
      </tbody>
    </table>

   
   

    </div>
    </div>
    

 </div>
@endsection