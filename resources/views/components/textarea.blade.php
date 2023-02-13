

<label for="{{ $field }}" class="col-sm-2 col-form-label">{{ $label }}</label>
      <textarea name="{{ $field }}" 
      class="form-control" 
      id="{{ $field }}"
      placeholder="{{ $placeholder }}"
      value ="{{ $value }}"
       cols="100" rows="5" >{{ old($field, $value) }}</textarea>
    @error($field)
      <span class="text-danger">{{ $message }}</span>
    @enderror