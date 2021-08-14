@extends('layouts.admin')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
  </ol>
</nav>
    <x-alert/>
  
    <div class="row mt-4">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header d-flex justify-content-between">
                <div>Users List</div>
                <a href="{{route('admin-users.create')}}" class="btn btn-sm btn-primary">Import Users</a>
               </div>
               <div class="card-body">
                   <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th>Name</th>
                               <th>Surname</th>
                               <th>Email</th>
                               <th>Role</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                           @forelse ($users as $user)
                            
                           <tr>
                               <td>
                                   {{$user->name}}
                               </td>
                               <td>
                               {{$user->surname}}
                               </td>
                               <td>
                               {{$user->email}}
                               </td>
                               <td>
                               {{$user->role}}
                               </td>
                             
                           </tr>
                           @empty
                             <tr>
                                 <td colspan="4" class="text-center text-danger">No Users found</td>
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