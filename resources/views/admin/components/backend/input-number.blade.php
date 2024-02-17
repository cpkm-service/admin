<div class="mb-4">
    @if($text)
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @endif
    <input 
        type="text" 
        class="form-control text-end input-number" 
        value="{{number_format(($value)?$value:0)}}"
        placeholder="{{__($placeholder)}}" 
        id="number-{{$name}}" 
        data-name="{{$name}}"
        @if($required) required @endif
        @if($disabled) disabled @endif 
        @if($int) int @endif
        @if($min) 
        min="{{$min}}"
        @endif
        @if($max) 
        max="{{$max}}"
        @endif
        @if($float !== false)
        data-float="{{$float}}"
        @endif
    >
    <input 
        type="number" 
        class="d-none" 
        id="{{$name}}" 
        name="{{$name}}" 
        value="{{($value)?$value:0}}"
        placeholder="{{__($placeholder)}}" 
        @if($required) required @endif
        @if($disabled) disabled @endif 
        @if($min) 
        min="{{$min}}"
        @endif
        @if($max) 
        max="{{$max}}"
        @endif
    >
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>