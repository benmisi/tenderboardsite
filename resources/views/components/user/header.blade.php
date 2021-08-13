<div class="jumbotron">
 
  <div class="row">
    <div class="col-md-9"> <h1 class="display-5">Welcome {{Auth::user()->name}}</h1></div>
      <div class="col-md-3">
        @if (!is_null($subscription))
         <div class="d-flex"><div>Package :</div><div class="ml-2"> <b>{{$subscription->package->name}}</b></div><div></div></div>
          <div class="d-flex"><div>Expiry Date:</div><div class="ml-2"><b> {{$subscription->expire_date}}</b></div></div>
          <div><a href="{{route('subscription.index')}}" class="btn btn-sm btn-block btn-info">Upgrade</a></div>
          @endif
         
      </div> 
  </div>
</div>