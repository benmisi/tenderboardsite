@extends('layouts.admin')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
  </ol>
</nav>
    <x-alert/>
  
    <div class="row mt-4">
       <div class="col-md-10 offset-md-1">
           <div class="card">
               <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>Date</th>
                               <th>Name</th>
                               <th>Package</th>
                               <th>Duration</th>
                               <th>Expire date</th>
                               <th>Status</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($subscriptions as $subs )
                            
                           <tr>
                               <td>
                                   {{$subs->created_at}}
                               </td>
                               <td>
                                   <div>{{$subs->user->name}}{{$subs->user->surname}}</div>
                                   <div>{{$subs->user->email}}</div>
                               </td>
                               <td>
                                   {{$subs->package->name}}
                               </td>
                               <td>
                                   {{$subs->duration}}
                               </td>
                               <td>
                                   {{$subs->expire_date}}
                               </td>
                               <td>
                                   @if (Carbon\Carbon::now()->lt(Carbon\Carbon::parse($subs->expire_date)))
                                      <div class="text-success">ACTIVE</div>
                                   @else
                                   <div class="text-danger">EXPIRED</div>
                                   @endif
                               </td>
                             
                           </tr>
                           @empty
                             <tr>
                                 <td colspan="6" class="text-center text-danger">No Subscriptions found</td>
                             </tr>  
                           @endforelse
                       </tbody>

                   </table>
               </div>
           </div>
       </div>
    </div>

</div>

@endsection