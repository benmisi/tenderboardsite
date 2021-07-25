@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <div class="row">
     <div class="col-md-4 offset-md-4">
         <x-alert/>
         <div class="card">
             <div class="card-header">Confirm Transaction</div>
             <div class="card-body">
             <p>1 PLEASE CHECK YOUR PHONE AND ENTER YOUR PIN TO AUTHORIZE THE TRANSACTION</p>
            <p>2 WHEN YOU HAVE AUTHORIZED THE TRANSACTION PLEASE PRESS BUTTON BELOW TO COMPLETE THE TRANSACTION</p>
             <a href="{{route('mobilepayments.edit',$id)}}" class="btn btn-block btn-primary">Confirm Payment</a>
             </div>
         </div>
     </div>
 </div>
</div>
@endsection