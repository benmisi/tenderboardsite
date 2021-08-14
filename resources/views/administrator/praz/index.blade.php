@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Praz Registration</li>
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
              
                 <th>Name</th>
                 <th>Has Account</th>
                 <th>Email</th>
                 <th>Password</th>
                 <th>Company</th>
                 <th>Categories</th>
                 <th>Status</th>
                 <th>

                 </th>
             </tr>
         </thead>
         <tbody>

            @forelse ($applications as $application)

            <tr>
            <td>
                <div>{{$application->user->name}}{{$application->user->surname}}</div>
                <div>{{$application->user->email}}</div>


            </td>
            <td>
                {{$application->hasaccount}}
            </td>
            <td>
                {{$application->email}}
            </td>
            <td>
                {{$application->password}}
            </td>
            <td>{{$application->companyname}}</td>
                 <td>
                  
                    @forelse ($application->items as $item )
                          <div>
                              <div>{{$item->category->code}}</div>
                          </div>
                     @empty
                         <p>No categories found</p>
                     @endforelse
                
                 </td>
                
                 <td>{{$application->status}}</td>
                
                 <td>
                     <a href="{{route('admin-prazregistrations.show',$application->id)}}" class="btn btn-sm btn-primary">View</a>
                 </td>
             </tr>
                
            @empty
                <tr>
                    <td colspan="3" class="text-center text-danger mt-5 mb-5">No Applications found as Yet</td>
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