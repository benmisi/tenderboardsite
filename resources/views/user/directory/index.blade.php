@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">My Directory</li>
  </ol>
</nav>
    <x-alert/>

    <div class="card">
    <div class="card-header d-flex justify-content-between">
                     <div>My directory</div>
                     <a href="{{route('directory.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                     @if (is_null(Auth::user()->directory))
                       Add Data
                     @else
                     Update Data
                     @endif
                    
                    </a>
    </div>
    <div class="card-body">
        @if (!is_null(Auth::user()->directory))
        <table class="table table-stripped">
           <tbody>
               <tr>
                   <th>Company Name</th>
                   <td>{{Auth::user()->directory->company}}</td>
               </tr>
               <tr>
                   <th>Emails</th>
                   <td>{{Auth::user()->directory->emails}}</td>
               </tr>
               <tr>
                   <th>Phones</th>
                   <td>{{Auth::user()->directory->phones}}</td>
               </tr>
               <tr>
                   <th>Address</th>
                   <td>{{Auth::user()->directory->address}}</td>
               </tr>
           </tbody>
        </table>

        <div class="d-flex justify-content-between mt-4 mb-4">
            <h3>Our Products</h3>
            <a href="{{route('directory_products.show',Auth::user()->directory->id)}}" class="btn btn-sm btn-success">Add Product</a>
        </div>
         <table class="table table-bordered">
             <thead>
                 <tr>
                     <th>Image</th>
                     <th>Product</th>
                     <th></th>
                 </tr>
             </thead>
             <tbody>
           
             
                
           
              @forelse (Auth::user()->directory->products as $product )
                 <tr>
                     <td><img src="{{$product->image}}" width="50px"/></td>
                     <td>
                         {{$product->name}}
                     </td>
                     <td class="text-right">
                     <a href="{{route('directory_products.edit',$product->id)}}" class="btn btn-sm btn-danger">Delete</a>
     
                     </td>
                 </tr> 
                 @empty
                     <tr>
                         <td colspan="3" class="text-danger text-center">No products added as yet</td>
                     </tr>
                 @endforelse
               
                 
             </tbody>
         </table>

        @else
        <div class="alert alert-danger text-center" role="alert">
            No directory Data found as yet
        </div>
        @endif
    
    </div>
    </div>
    

 </div>
@endsection