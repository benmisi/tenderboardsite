<div class="{{$size}}">
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="control-label">{{ $label }}</label>
     <textarea id="{{ $name }}" class="form-control" name="{{ $name }}" rows="10" required>
        {{ $value }}
    </textarea>
        @error($name)
          <p class="text-danger">{{ $message }}</p>           
        @enderror
    
</div>
</div>