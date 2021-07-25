@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <div class="row">
     <div class="col-md-8 offset-md-2">
         <x-errors name="filename"/>
         <div class="card">
             <div class="card-header">Invoice Settlement</div>
             <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr><th>Date</th><th>Description</th><th>Amount</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{$invoice->created_at}}
                            </td>
                            <td>
                                {{$invoice->description}}
                            </td>
                            <td>
                                {{$invoice->currency}}{{$invoice->amount}}
                            </td>
                        </tr>
                        <tr><td colspan="2" class="text-center text-primary"><h5>Total Due</h5></td><td>{{$invoice->currency}}{{$invoice->amount}}</td></tr>
                        <tr><td colspan="2" class="text-center text-success"><h5>Total Paid</h5></td>
                        <td>
                            @php
                                $totalreceipts = count($invoice->receipts)>0 ? $invoice->receipts->sum('amount') : 0;
                            @endphp
                            {{$invoice->currency}} {{$totalreceipts}}
                        </td>
                        </tr>
                        <tr><td colspan="2" class="text-center text-danger"><h5>Balance</h5></td><td>{{$invoice->currency}}{{$invoice->amount-$totalreceipts}}</td></tr>
                    
                    </tbody>
                </table>
                <div class="row">
                    <div class="col"><a href="{{route('invoicing.show',$invoice->id)}}" class="btn btn-block btn-secondary">Download invoice</a></div>
                    <div class="col">
                    <x-forms.modal title="Paynow" label="Use Paynow" color="primary"  modalname="paynow">
                        <form method="POST" action="{{ route('mobilepayments.store') }}">
                            @csrf
                                <x-forms.input  size="col-md-12" name="phonenumber" type="text" label="Enter ecocash/Onemoney number"/>
                                <x-forms.input  size="col-md-12" name="amount" type="number" label="Amount"/>
                                <div class="form-group d-flex justify-content-between">
                                    <x-forms.btnclose/>
                                    <x-forms.hidden name="id" :value="$invoice->id"/>
                                    <x-forms.hidden name="mode" value="ECOCASH"/>
                                    <x-forms.button type="submit" size="" color="primary" label="Submit"/>
                                </div>
                        </form>
                        </x-forms.modal>
                    </div>
                    <div class="col">
                        <x-forms.modal title="Upload Proof of Payment" label="Upload POP" color="success" modalname="pop">
                        <form method="POST" action="{{ route('uploadpop.store') }}" enctype="multipart/form-data">
                            @csrf
                                <x-forms.input  size="col-md-12" name="filename" type="file" label="Attach POP"/>
                                <x-forms.input  size="col-md-12" name="bank" type="text" label="Bank name"/>
                                <x-forms.input  size="col-md-12" name="paymentdate" type="date" label="Transfer Date"/>
                               
                                <div class="form-group d-flex justify-content-between">
                                    <x-forms.btnclose/>
                                    <x-forms.hidden name="id" :value="$invoice->id"/>
                                    <x-forms.button type="submit" size="" color="primary" label="Submit"/>
                                </div>
                        </form>
                        </x-forms.modal>

                        </div>
                </div>
             </div>
         </div>
     </div>
 </div>
</div>
@endsection