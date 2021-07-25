@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <div class="row">
     <div class="col-md-12">
       <div class="card">
           <div class="card-header d-flex justify-content-between">
               <div>Choice PRAZ Category</div>
               <x-forms.modal title="Choose Category" label="Category List" modalname="chooseModal" color="primary">
               <form method="POST" action="{{ route('praz-item.store') }}">
                @csrf
               <x-forms.categories label="Category List" name="category" size="col-md-12" :optionlist="$categories"/>
               </form>
               </x-forms.modal>
               
           </div>
           <div class="card-body">

           </div>
       </div>
     </div>
 </div>
</div>
@endsection