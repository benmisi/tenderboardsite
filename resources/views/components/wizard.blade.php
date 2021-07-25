<div>
<div class="row mb-3 text-center">
    @for ($i=0 ; $i< count($steps) ; $i++ )
    <div class="col card rounded-0 @if ($steps[$i]['status']=='active') text-white bg-primary @elseif($steps[$i]['status']=='completed') text-white bg-success @else text-white bg-secondary @endif">
     <div class="card-body">
   <span class="badge badge-light">{{$i+1}}</span> <div class="d-sm-none d-md-block d-none d-sm-block">{{$steps[$i]['name']}}</div>
     </div>
   </div>   
    @endfor
  
  
  
 
 </div>
</div>