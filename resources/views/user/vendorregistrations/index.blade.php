@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Vendor number registration</li>
  </ol>
</nav>
    <x-alert/>

    <div class="card">
    <div class="card-header d-flex justify-content-between">
                     <div>Vendor  number Registrations</div>
                     <a href="{{route('vendor-registrations.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>New Registrations</a>
    </div>
    <div class="card-body">
    <table class="table table-stripped">
      <thead>
          <tr><th>Date</th><th>Order number</th><th>Company name</th><th>Status</th><th></th></tr>
      </thead>
      <tbody>
        
        @forelse ($applications as $application)
          <tr>
            <td>
              {{$application->created_at}}
            </td>
            <td>
              {{$application->invoicenumber}}
            </td>
            <td>
              {{$application->company}}
            </td>
            <td>
              {{$application->status}}
            </td>
            <td>
            <a href="{{route('vendor-registrations.show',$application->id)}}" class="btn btn-sm btn-primary">View</a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-danger">No data found</td>
          </tr>
        @endforelse
      </tbody>
    </table>
    </div>
    </div>
    

 </div>
@endsection