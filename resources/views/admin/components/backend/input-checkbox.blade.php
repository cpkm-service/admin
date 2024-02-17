<div class="mb-4 form-check form-switch">
    @if($text)
    <label class="form-check-label status" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @endif
    <input type="hidden" name="{{$name}}" value="0">
    <input 
        type="checkbox" 
        class="form-check-input status" 
        id="{{$name}}" 
        name="{{$name}}" 
        value="1"
        placeholder="{{__($placeholder)}}" 
        @if($required) required @endif
        @if($disabled) disabled @endif 
        @if($value) checked @endif
    >
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>