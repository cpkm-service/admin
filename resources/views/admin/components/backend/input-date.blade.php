<div class="mb-4">
    @if($text)
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @endif
    <input 
        type="date" 
        class="form-control" 
        id="{{$name}}" 
        name="{{$name}}" 
        value="{{$value}}"
        placeholder="{{__($placeholder)}}" 
        @if($required) required @endif
        @if($disabled) disabled @endif 
    >
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>