@extends('layouts.admin')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin-companyregistrations.index')}}">Company Registrations</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registration</li>
  </ol>
</nav>
 <form method="POST" action="{{ route('admin-companyregistrations.store') }}">
  @csrf
  <div class="card">
    <div class="card-body">
      <x-alert/>
      <div class="row">
          <div class="col-md-12">
              <div>Applied Names</div>
           <ol> 
                    @forelse ($application->fields['names'] as $field )
                          <li>{{$field['name']}}({{$field['status']}})</li>
                     @empty
                         <p>No company names found</p>
                     @endforelse
          </ol>
          </div>
      </div>
    <div class="row">
     
     <x-forms.input  name="name" label="Approved Company Name" type="text" size="col-md-12"/>
  
    </div>
    <x-forms.hidden name="id" :value="$application->id"/>
    </div>
    <div class="card-footer text-right">
      <x-forms.button type="submit" color="success" size="btn-lg" label="Submit"/>
    </div>
  </div>
 </form>
</div>
@endsection