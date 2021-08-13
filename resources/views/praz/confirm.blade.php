@extends('layouts.user')

@section('content')
<div class="container">
 <x-wizard :steps="$steps"/>
 <div class="row">
     <div class="col-md-12">
         <x-errors name="filename"/>
         <div class="card">
             <div class="card-header d-flex justify-content-between">
                 <div>Confirm Category Selection</div>
                 <a href="{{route('praz-service.show',$application->id)}}" class="btn btn-sm btn-primary">Add More</a>
             </div>
             <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr><th>Date</th><th>Category</th><th>Year</th><th></th></tr>
                    </thead>
                    <tbody>
                        @forelse ($application->items as $invoice)
                        <tr>
                            <td>
                                {{$invoice->created_at}}
                            </td>
                            <td>
                                <div>{{$invoice->category->code}}</div>
                                <div>
                               <small>{{$invoice->category->description}}</small>
                                </div>
                            </td>
                            <td>
                                {{$invoice->regyear}}
                            </td>
                            <td>
                                
                                    <a href="{{route('praz-item.edit',$invoice->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                               
                            </td>
                        </tr>
                        @empty
                          <tr><td colspan="4" class="text-center text-danger">No items found</td></tr>  
                        @endforelse                       
                    
                    </tbody>
                </table>
              
             </div>
             <div class="card-footer d-flex justify-content-end">
             <a href="{{route('praz-service.edit',$application->id)}}" class="btn btn-sm btn-success">Confirm Registrations</a>
             </div>
         </div>
     </div>
 </div>
</div>
@endsection