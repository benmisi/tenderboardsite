@extends('layouts.user')

@section('content')
<div class="container">
 <div class="row">
     <div class="col-md-10 offset-md-1">
         <x-alert/>
         <div class="card">
             <div class="card-header">Invoices Reports</div>
             <div class="card-body">
                 <table class="table table-border">
                     <thead>
                         <tr>
                             <th>Date</th>
                             <th>Description</th>
                             <th>Amount</th>
                             <th>Status</th>
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
                                 {{$invoice->description}}
                             </td>
                             <td>
                                 {{$invoice->amount}}
                             </td>
                             <td>
                                 {{$invoice->status}}
                             </td>
                             <td class="d-flex">
                             <a href="{{route('invoicing.show',$invoice->id)}}" class="btn btn-sm btn-primary mr-1">Print</a>
                               
                                 @if($invoice->status =="PAID")
                                 <x-forms.modal color="success" title="Receipts" label="receipts" modalname="receiptModal">
                                     <table class="table table-striped">
                                         <thead>
                                             <tr>
                                                 <th>Invoice number</th>
                                                 <th>Receipt number</th>
                                                 <th>Amount</th>
                                                 <th></th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @forelse ($invoice->receipts as $receipt )
                                              <tr>
                                                  <td>{{$receipt->invoicenumber}}</td>
                                                  <td>{{$receipt->receiptnumber}}</td>
                                                  <td>{{$receipt->currency}}{{$receipt->amount}}</td>
                                                  <td>
                                                      <a href="{{route('report-receipt',$receipt->id)}}" class="btn btn-sm btn-primary">Print</a>
                                                  </td>
                                              </tr>   
                                             @empty
                                                 
                                             @endforelse
                                         </tbody>
                                     </table>
                                 </x-forms.modal>
                                 @elseif ($invoice->status =="PENDING")
                                  <a href="{{route('invoicing.index')}}" class="btn btn-sm btn-secondary">SETTLE</a>
                                 @else

                                 @endif
                             </td>
                         </tr>     
                         @empty
                          <tr>
                              <td colspan="5" class="text-center pt-3 pb-3"> No invoices</td>
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