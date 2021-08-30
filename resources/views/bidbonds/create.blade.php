@extends('layouts.user')

@section('content')
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Bid Bond Application</li>
  </ol>
</nav>
<div class="row">
    <div class="col-md-12">
    <form method="POST" action="{{ route('bidbonds.store') }}" enctype="multipart/form-data">
  @csrf
    <div class="card">
             <div class="card-header">Bid Bond Application </div>
             <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="control-label">Applicant Company Name</label>
                            <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" value="{{old('company')}}">
                            @error('company')
                                
                                    <p class="text-danger">  {{ $message }}</p>
                                
                            @enderror
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('profile') ? ' has-error' : '' }}">
                            <label for="profile" class="control-label">Company Profile</label>
                            <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" value="{{old('profile')}}">
                            @error('profile')
                                
                                    <p class="text-danger">  {{ $message }}</p>
                                
                            @enderror
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('tendernumber') ? ' has-error' : '' }}">
                            <label for="tendernumber" class="control-label">Tender number</label>
                            <input id="tendernumber" type="text" class="form-control @error('tendernumber') is-invalid @enderror" name="tendernumber" value="{{old('tendernumber')}}">
                            @error('tendernumber')
                                
                                    <p class="text-danger">  {{ $message }}</p>
                                
                            @enderror
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                            <label for="document" class="control-label">Tender document</label>
                            <input id="document" type="file" class="form-control @error('document') is-invalid @enderror" name="document" value="{{old('document')}}">
                            @error('document')
                                
                                    <p class="text-danger">  {{ $message }}</p>
                                
                            @enderror
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('entity') ? ' has-error' : '' }}">
                            <label for="entity" class="control-label">Procurement entity</label>
                            <input id="entity" type="text" class="form-control @error('entity') is-invalid @enderror" name="entity" value="{{old('entity')}}">
                            @error('entity')
                                
                                    <p class="text-danger">  {{ $message }}</p>
                                
                            @enderror
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group{{ $errors->has('pop') ? ' has-error' : '' }}">
                            <label for="pop" class="control-label">Proof of Payment</label>
                            <input id="pop" type="file" class="form-control @error('pop') is-invalid @enderror" name="pop" value="{{old('pop')}}">
                            @error('pop')
                                
                                    <p class="text-danger">  {{ $message }}</p>
                                
                            @enderror
                            
                        </div>
                    </div>
                </div>
             </div>
             <div class="card-footer">
             <x-forms.button type="submit" color="success" size="btn-lg" label="Submit"/>
             </div>
    </div>
</form>
    </div>
</div>

  
</div>
@endsection