<div>
@forelse ($errors->all() as $message)
<div class="alert alert-danger" role="alert">
{{$message}}
</div> 
    
@empty
    
@endforelse 
    

</div>