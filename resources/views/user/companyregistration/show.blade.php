@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('Company-service.index')}}">Company Deeds Registrations </a></li>
    <li class="breadcrumb-item active" aria-current="page">Company Deeds registration</li>
  </ol>
</nav>
    <x-alert/>

    <div class="card">
    <div class="card-header d-flex justify-content-between">
                     <div>Company Deeds Registration</div>
    </div>
    <div class="card-body">
    <table class="table table-stripped">
     
      <tbody>
         <tr><th>Invoice Number</th><td>{{$application->invoicenumber}}</td></tr>  
         <tr><th>Status</th><td>{{$application->status}}</td></tr> 
      </tbody>
    </table>
    <h3>Registration Data</h3>
    <table class="table">
     <thead>
         <tr>
             <th>Name</th>
             <th>Directors</th>
             <th>Status</th>
         </tr>
     </thead>
     <tbody>
     <tr>
              <td>
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tbody>
        @forelse ($application->fields['names'] as $field )
          <tr><td>{{$field['name']}}</td><td>{{$field['status']}}</td></tr>
        @empty
            
        @endforelse
                      </tbody>
                  </table>
        </td>
        <td>
        <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>National id</th>
                              <th>Address</th>
                              <th>Shares</th>
                          </tr>
                      </thead>
                      <tbody>
        @forelse ($application->fields['directors'] as $field )
          <tr>
              <td>{{$field['name']}}</td>
              <td>{{$field['national_id']}}</td>
              <td>{{$field['address']}}</td>
              <td>{{$field['shares']}}</td>
        </tr>
        @empty
            
        @endforelse
                      </tbody>
        </table>
        </td>
        <td>
            {{$application->status}}
        </td>
          </tr> 
     </tbody>
   </table

    </div>
    </div>
    

 </div>
@endsection