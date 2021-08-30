@extends('layouts.app')

@section('content')
<section  class="header">
    <div class="container">
     <div class="row" id="header-body">
         <div class="col-md-6 offset-md-3 text-center">
             <div id="header-title">Procurement Notices</div>
             <div id="header-subtitle">This page show list of procurement notices</div>
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
                
                <td>{{$notice->title}}</td>
                 <td>{{$notice->closing_date}}</td>
                 <td>{{$notice->procurementtype->name}}</td>
                 <td>{{$notice->categorylist->name}}</td>
                 <td>
                 <a href="{{route('show-notice',$notice->uuid)}}" class="btn btn-sm btn-primary">View</a>
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