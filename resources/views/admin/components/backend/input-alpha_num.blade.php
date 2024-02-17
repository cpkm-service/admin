<div class="mb-4">
    @if($text)
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @endif
    <input 
        type="text" 
        name="{{$name}}" 
        class="form-control" 
        value="{{($value)?$value:''}}"
        placeholder="{{__($placeholder)}}" 
        id="alpha_number-{{$name}}" 
        @if($required) required @endif
        @if($disabled) disabled @endif 
        onkeyup="this.value=this.value.replace(/[^a-zA-z0-9_-]/g,'')"
    >
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>