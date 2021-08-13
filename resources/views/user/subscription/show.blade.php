@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Subscription</li>
  </ol>
</nav>
    <x-alert/>
     <div class="row">
      
         <div class="col-md-6 offset-md-3">
         <form method="POST" action="{{ route('subscription.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="card">
                <div class="card-header">
                <div><b>{{$package->name}}</b></div>
                <div>{{$package->currency}}{{$package->amount}} per month</div>
                </div>
                <div class="card-body">
                 <table class="table">                    
                    <tr>
                        <td colspan="2">
                     <x-forms.selectraw name="duration" label="Duration" :options="$durationlist" size="col-md-12"/>
                      </td>
                    </tr>
                 </table>
                 <input type="hidden" name="id" value="{{$id}}"/>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-block btn-primary">Subscribe</button>
                </div>
                </div>
         </form>
         </div> 
        
     </div>
    

 </div>
@endsection