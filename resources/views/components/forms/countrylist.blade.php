<div class="{{$size}}">
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{ $name }}" class="control-label">{{ $label }}</label>

   
        <select id="{{ $name }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name) }}" required>
        
             @for($i=0 ;$i< count($countrylist) ; $i++)
              <option value="{{$countrylist[$i]}}">{{$countrylist[$i]}}</option>   
             @endfor
    
        </select>

        @error($name)
          <p class="text-danger">{{ $message }}</p>           
        @enderror
    
</div>
</div>