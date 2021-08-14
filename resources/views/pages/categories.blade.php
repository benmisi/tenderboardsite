@extends('layouts.app')

@section('content')
<section  class="header">
    <div class="container">
     <div class="row" id="header-body">
         <div class="col-md-6 offset-md-3 text-center">
             <div id="header-title">Procurement Notices Categories</div>
             <div id="header-subtitle">This page show list of procurement notices by category</div>
         </div>
     </div>
    </div>
    
    
</section>
<section class="content-body">
    <div class="container">
    <div class="card">
        <div class="card-body">
        <div class="accordion" id="accordionExample">
            @forelse ( $categorylist as $category )
            <div class="card">
                <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$category->id}}" aria-expanded="true" aria-controls="collapseOne">
                     {{$category->name}}
                     <span class="badge badge-light">{{count($category->notices)}}</span>
                    </button>
                </h2>
                </div>

                <div id="collapse{{$category->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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

            @forelse ($category->notices as $notice )

            <tr>
                
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
            @empty
                
            @endforelse
           
  
  
      </div>
        </div>
    </div>
    </div>
</section>

@endsection