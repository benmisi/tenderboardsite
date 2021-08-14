@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Company Deeds registrations</li>
  </ol>
</nav>
    <x-alert/>

    <div class="card">
    <div class="card-header d-flex justify-content-between">
                     <div>Company Deeds Registrations</div>
                     <a href="{{route('Company-service.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>New Registrations</a>
    </div>
    <div class="card-body">
    <table class="table table-stripped">
      <thead>
          <tr><th>Date</th><th>Order number</th><th>Company names</th><th>Approved Name</th><td>Status</td><th></th></tr>
      </thead>
      <tbody>
          @forelse ($applications as $application )
                 <tr>
                     <td>{{$application->created_at}}</td>
                     <td>{{$application->invoicenumber}}</td>
                     <td>
                         <ol> 
                         @forelse ($application->fields['names'] as $field )
                          <li>{{$field['name']}}({{$field['status']}})</li>
                     @empty
                         <p>No company names found</p>
                     @endforelse
                         </ol>
                    </td>
                    <td>{{$application->approved}}</td>
                     <td>{{$application->status}}</td>
                     <td>
                     </td>
                 </tr> 
          @empty
             <tr>
                 <td colspan="4" class="text-center text-danger">No applications found</td>
             </tr>    
          @endforelse
      </tbody>
    </table>
    </div>
    </div>
    

 </div>
@endsection