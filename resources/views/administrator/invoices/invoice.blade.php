@extends('layouts.admin')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Invoices</li>
  </ol>
</nav
    <x-alert/>
  
    <div class="row mt-4">
       <div class="col-md-10 offset-md-1">
           <div class="card">
               <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>Date</th>
                               <th>Invoice number</th>
                               <th>Amount</th>
                               <th>Receipted</th>
                               <th>Balance</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($invoices as $invoice )
                            
                           <tr>
                               <td>
                                   {{$invoice->created_at}}
                               </td>
                               <td>
                                   {{$invoice->invoicenumber}}
                               </td>
                               <td class="text-danger">
                                   {{$invoice->amount}}
                               </td>
                               <td class="text-success">
                                   {{$invoice->receipts->sum('amount')}}
                               </td>
                               <td>
                                   {{$invoice->amount - $invoice->receipts->sum('amount')}}
                               </td>
                               <td class="d-flex">
                                   @php
                                       $filename = !is_null($invoice->transfer)?$invoice->transfer->filename:"";
                                   @endphp
                                 <a href="/{{$filename}}" class="btn btn-sm btn-info">Download</a>
                                 @if ($invoice->status =='AWAITING')
                                 <a href="{{route('admin-invoices.edit',$invoice->invoicenumber)}}" class="btn btn-sm btn-success">Approve</a>
                            
                                 @endif
                                  </td>
                           </tr>
                           @empty
                             <tr>
                                 <td colspan="6" class="text-center text-danger">No invoices found</td>
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