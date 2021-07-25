@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <div class="row">
     <div class="col-md-12">
         <x-alert/>
         <x-errors/>
         <div class="card">
             <div class="card-header">Upload Required Documents</div>
             <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr><th>Document</th><th></th></tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
                </table>
              
             </div>
         </div>
     </div>
 </div>
</div>
@endsection