@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Application Tracking</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-8 offset-md-2">
    <div class="card">
             <div class="card-header">Application Tracker</div>
             <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr><th>#</th><th>Stage</th><th>Status</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Invoice Settlement</td><td> 
                        @if (!is_null($application->invoice))
                           @if ($application->invoice->status=='PAID')
                             <div class="text-success">Invoice has been successfully settled</div>
                             @elseif ($application->invoice->status=='AWAITING')
                             <div class="text-warning">Your payment is yet to be confirmed</div> 
                           @else
                           <div class="text-danger">Invoice has not yet been successfully settled</div> 
                           @endif 
                        @else
                        <div class="text-danger">Invoice has not yet been initiated</div> 
                        @endif
                    </td></tr>

                    <tr>
                        <td>2</td>
                        <td>{{$application->service->name}}</td>
                        <td>
                        @if ($application->status=='COMPLETED')
                             <div class="text-success">Application successfully completed please check your email </div>
                             @elseif ($application->status=='AWAITING')
                             <div class="text-warning">Application awaiting payment confirmation</div> 
                           @else
                           <div class="text-danger">Application incomplete</div> 
                           @endif 
                        </td>
                    </tr>
                    </tbody>
                </table>
             </div>
    </div>
    </div>
</div>

  
</div>
@endsection