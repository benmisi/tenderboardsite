@extends('layouts.user')

@section('content')
<div class="container">
 <div class="row">
     <div class="col-md-10 offset-md-1">
         <x-alert/>
         <div class="card">
             <div class="card-header">Paynow Payments</div>
             <div class="card-body">
                 <table class="table table-border">
                     <thead>
                         <tr>
                             <th>Date</th>
                             <th>Invoice number</th>
                             <th>Mode</th>
                             <th>Amount</th>
                             <th>Status</th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($onlinepayments as $online)
                         <tr>
                             <td>
                                 {{$online->created_at}}
                             </td>
                             <td>
                                 {{$online->invoicenumber}}
                             </td>
                             <td>
                                 {{$online->mode}}
                             </td>
                             <td>
                                 {{$online->amount}}
                             </td>
                             <td>{{$online->status}}</td>
                             <td>
                                 @if ($online->status !='paid')
                                 <a href="{{route('mobilepayments.edit',$online->id)}}" class="btn btn-block btn-primary">Sync</a> 
                                 @endif
                           
                             </td>
                         </tr>     
                         @empty
                          <tr>
                              <td colspan="5" class="text-center pt-3 pb-3"> No paynow payments </td>
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