@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Procurement Notices</li>
  </ol>
</nav>
    <x-alert/>
  
    <div class="row mt-4">
       <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                    
                <table class="table table-hover">
         <thead>
             <tr>
              <th>Title</th>
                 <th>Title</th>
                 <th>Closing Date</th>
                 <th>Type</th>
                 <th>Category</th>
                 <th>

                 </th>
             </tr>
         </thead>
         <tbody>

            @forelse ($notices as $notice )

            <tr>
            <td>{{$notice->user->name}}</td>
                 <td>{{$notice->title}}</td>
                 <td>{{$notice->closing_date}}</td>
                 <td>{{$notice->procurementtype->name}}</td>
                 <td>{{$notice->categorylist->name}}</td>
                 <td>
                     <button class="btn btn-sm btn-primary">View</button>
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
    </div>

</div>

@endsection