@error($var_name)
<small for="{{ $var_name }}" class="help-block text-danger">{{ $message  }}</small>
<!-- <div class="alert alert-danger">{{ $message }}</div> -->
@enderror

<!-- @error('username')
<div class="alert alert-danger">{{ $message }}</div>
@enderror -->
