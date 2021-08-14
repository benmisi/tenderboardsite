@extends('layouts.app')

@section('content')
<section  class="header">
    <div class="container">
     <div class="row" id="header-body">
         <div class="col-md-6 offset-md-3 text-center">
             <div id="header-title">Supplier Directories</div>
             <div id="header-subtitle">This page show list of suppliers on our platform </div>
         </div>
     </div>
    </div>
    
    
</section>
<section class="content-body">
    <div class="container">
    <div class="card">
        <div class="card-body">
        <table class="table table-hover">
         <thead>
             <tr>
                 
                 <th>Company</th>
                 <th>Contact Details</th>
                 <th>Bio</th>
                 <th>Products/Services</th>
                
             </tr>
         </thead>
         <tbody>

            @forelse ($directorylist as $directory )

            <tr>
                
                 <td>{{$directory->company}}</td>
                 <td>
                     <div><b>Address</b></div>
                     <div>{{$directory->address}}</div>
                     <div><b>Emails</b></div>
                     <div>{{$directory->emails}}</div>
                     <div><b>Phones</b></div>
                     <div>{{$directory->phones}}</div>

                </td>
                 <td>{{$directory->bio}}</td>
                 <td>
                     <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>Image</th>
                                 <th>Name</th>
                             </tr>
                         </thead>
                         <tbody>
                             @forelse ($directory->products as $product )
                                <tr>
                                    <td><img src="{{$product->image}}" width="50"/></td>
                                    <td>{{$product->name}}</td>
                                </tr> 
                             @empty
                                 <tr>
                                     <td colspan="2" class="text-danger text-center">No Product or Services Found</td>
                                 </tr>
                             @endforelse
                         </tbody>
                     </table>
                 </td>
                 
             </tr>
                
            @empty
                <tr>
                    <td colspan="5" class="text-center text-danger mt-5 mb-5">No Procurement notices found as Yet</td>
                </tr>
            @endforelse
             
           
           
            
           
           
         </tbody>
     </table> 
        </div>
    </div>
    </div>
</section>

@endsection