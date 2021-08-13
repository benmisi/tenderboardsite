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
         @forelse ($packages  as $package )
         <div class="col-md-3">
                <div class="card">
                <div class="card-header">
                                <div><b>{{$package->name}}</b></div>
                                <div>{{$package->currency}}{{$package->amount}} per month</div>
                </div>
                <div class="card-body">
                 <table class="table">
                     <tr>
                         <th>Email Notifications</th>
                     <td>
                         @if ($package->email=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                            
                     </td>
                    </tr>
                    <tr>
                         <th>Whatsapp Notifications</th>
                     <td>
                            
                            @if ($package->whatsapp=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                     </td>
                    </tr>
                    <tr>
                         <th>Request For Quotations</th>
                     <td>
                            
                            @if ($package->rfqs=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                     </td>
                    </tr>
                    <tr>
                         <th>Tenders</th>
                     <td>
                            
                            @if ($package->tenders=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                     </td>
                    </tr>
                    <tr>
                         <th>Expression Of Interest</th>
                     <td>
                                                          
                            @if ($package->expression=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                     </td>
                    </tr>
                    <tr>
                         <th>Vendor Number application</th>
                     <td>
                            
                            @if ($package->vendor=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                     </td>
                    </tr>
                    <tr>
                         <th>PRAZ application</th>
                     <td>
                            
                              
                            @if ($package->praz=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                     </td>
                    </tr>
                    <tr>
                         <th>Company Deeds application</th>
                     <td>
                            
                            @if ($package->company=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                     </td>
                    </tr>
                    <tr>
                         <th>Directory listing</th>
                     <td>
                            
                            @if ($package->directory=="Y")
                             <i class="fa fa-check text-success"></i>
                          @else
                          <i class="fa fa-times text-danger"></i>
                         @endif
                     </td>                    
                    </tr>
                   
                 </table>
                
                </div>
                <div class="card-footer">
                    <a href="{{route('subscription.show',$package->id)}}" class="btn btn-block btn-primary">Subscribe</a>
                </div>
                </div>
         </div> 
         @empty
             
         @endforelse
         
     </div>
    

 </div>
@endsection