
        <div class="{{$size}}">
            <div class="card">
                 <div class="card-header d-flex justify-content-between">
                     <div>{{$service->name}}</div>
                     <a href="{{route('Company-service.show',$service->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>New</a>
                 </div>
                  <div class="card-body">
                  <table class="table table-stripped">
                   @forelse ( $service->applications as $application )
                     <tr>
                         <td>{{$application->created_at}}</td>
                         <td>{{$application->invoicenumber}}</td>
                         <td class="text-right"><a href="{{route('tracking.show',$application->id)}}" class="btn btn-sm btn-success">track</a></td>
                     </tr>      
                     
                   @empty
                   <div class="alert alert-danger" role="alert">
                       Nothing found as yet
                    </div>   
                   @endforelse
                  </table>
                   
                </div>
            </div>
        </div>

