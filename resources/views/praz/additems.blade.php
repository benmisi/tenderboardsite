@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <div class="row">
     <div class="col-md-12">
         <form action="{{route('praz-item.store')}}" method="POST">
             @csrf
       <div class="card">
           <div class="card-header d-flex justify-content-between">
               <div>Choice PRAZ Category</div>
               <button type="submit" class="btn btn-sm btn-primary">Submit</button>
              
               
           </div>
           <div class="card-body">
            <input type="hidden" name="id" value="{{$application->id}}"/>
          
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('regyear') ? ' has-error' : '' }}">
                    <label for="regyear" class="control-label">Select Reg year</label>

                
                        <input id="regyear" type="number" class="form-control @error('regyear') is-invalid @enderror" name="regyear" value="{{ old('regyear') }}" min="{{Carbon\Carbon::now()->year}}" max="{{Carbon\Carbon::now()->year+1}}"required/>
                        
                        
                        @error("regyear")
                        <p class="text-danger">{{ $message }}</p>           
                        @enderror
                    
                </div>
            </div>
            <div class="alert alert-primary" role="alert">
            Please note you can select more than on category
            </div>
           @forelse ($categories as $category)
           <div class="form-check">
                <input class="form-check-input" name="selection[]" type="checkbox" value="{{$category->id}}" id="selection">
                <label class="form-check-label" for="defaultCheck1">
                     {{$category->description}}-<b>({{$category->code}})</b>
                </label>
                </div>
           @empty
               
           @endforelse
           
           </div>
       </div>
         </form>
     </div>
 </div>
</div>
@endsection