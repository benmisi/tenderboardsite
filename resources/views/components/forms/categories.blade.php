<div class="{{$size}}">
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="control-label">{{ $label }}</label>

   
        <select id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name) }}" required>
        
             @forelse ($optionlist as $option )
              <option value="{{$option->id}}">{{$option->code}}-{{$option->description}}</option>   
             @empty
                 
             @endforelse
     
        </select>

        @error($name)
          <p class="text-danger">{{ $message }}</p>           
        @enderror
    
</div>
</div>