@extends('layouts.admin')

@section('content')
<div class="container-fluid">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Vendor Registration</li>
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
                 <th>company</th>
                 <th>Type</th>
                 <th>
                   Address
                 </th>
                 <th>
                     Banking Details
                 </th>
                 <th>
                     Applicant name
                 </th>
                 <th>Year</th>
                 <th>Status</th>
                 <th></th>
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
                {{$application->company}}
            </td>
            <td>
                {{$application->applicationtype}}
            </td>
            <td>
                <div>{{$application->address}}</div>
                <div>{{$application->city}}</div>
                <div>{{$application->state}}</div>
                <div>{{$application->country}}</div>
                <div>{{$application->zipcode}}</div>
            </td>
            <td>
            <div>{{$application->bank}}</div>
            <div>{{$application->branch}}</div>
            <div>{{$application->branchcode}}</div>
            <div>{{$application->accountnumber}}</div>
            </td>
                 <td>
                 <div>{{$application->name}}{{$application->surname}}</div>
                 <div>{{$application->email}}</div>
                 <div>{{$application->position}}</div>
                 </td>
                 <td>
                     {{$application->year}}
                 </td>
                 <td>
                     {{$application->status}}
                 </td>
                 <td>
                     <a href="{{route('admin-vendorregistrations.show',$application->id)}}" class="btn btn-sm btn-primary">View</a>
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