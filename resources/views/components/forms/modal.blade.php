<div>
<button type="button" class="btn btn-{{$color}}" data-toggle="modal" data-target="#{{$modalname}}">
  {{$label}}
</button>

<!-- Modal -->
<div class="modal fade" id="{{$modalname}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {{ $slot }}
      </div>
      
    </div>
  </div>
</div>
</div>