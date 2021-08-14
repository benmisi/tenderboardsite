@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Company Registration</li>
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
              <th>User</th>
                 <th>Names</th>
                 <th>Approved name</th>
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
                 <ol> 
                    @forelse ($application->fields['names'] as $field )
                          <li>{{$field['name']}}({{$field['status']}})</li>
                     @empty
                         <p>No company names found</p>
                     @endforelse
                 </ol>
                 </td>
                
                 <td>{{$application->approved}}</td>
                
                 <td>
                     <a href="{{route('admin-companyregistrations.show',$application->id)}}" class="btn btn-sm btn-primary">View</a>
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