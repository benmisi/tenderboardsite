<div>
@if (session('statusSuccess'))
    <div class="alert alert-success">
        {{ session('statusSuccess') }}
    </div>

@elseif (session('statusError'))
<div class="alert alert-danger">
        {{ session('statusError') }}
    </div>
@else
@endif
</div>