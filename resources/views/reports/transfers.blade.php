@extends('layouts.user')

@section('content')
<div class="container">
 <div class="row">
     <div class="col-md-10 offset-md-1">
         <x-alert/>
         <div class="card">
             <div class="card-header">Bank transfers</div>
             <div class="card-body">
                 <table class="table table-border">
                     <thead>
                         <tr>
                             <th>Date</th>
                             <th>Invoice number</th>
                             <th>Bank</th>
                             <th>Payment Date</th>
                             <th>Status</th>
                             <th></th>
                         </tr>
                     </thead>
                     <tbody>
                         @forelse ($transfers as $transfer)
                         <tr>
                             <td>
                                 {{$transfer->created_at}}
                             </td>
                             <td>
                                 {{$transfer->invoice->invoicenumber}}
                             </td>
                             <td>
                                 {{$transfer->bank}}
                             </td>
                             <td>
                                 {{$transfer->payment_date}}
                             </td>
                             <td>                                
                                 {{$transfer->status}}
                             </td>
                             <td>

                             </td>
                         </tr>     
                         @empty
                          <tr>
                              <td colspan="6" class="text-center pt-3 pb-3"> No transfer payments </td>
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