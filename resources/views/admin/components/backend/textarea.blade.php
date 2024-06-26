
<div class="mb-4">
    @if($text)
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @endif
    <textarea class="form-control" name="{{$name}}" id="" cols="30" rows="10" placeholder="{{__($text)}}" @if($required) required @endif @if($disabled) disabled @endif>{{$value}}</textarea>
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>