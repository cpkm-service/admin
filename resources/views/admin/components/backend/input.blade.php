<div class="mb-4 @if($type=='checkbox') form-check form-switch @endif">
    @if($text)
    <label class="@if($type=='checkbox') form-check-label status @else form-label @endif" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @endif
    @if($type=='checkbox')
    <input type="hidden" name="{{$name}}" value="0">
    @endif
    <input 
        type="{{$type}}" 
        class="
            @if($type=='checkbox')
                form-check-input status
            @else
                form-control
            @endif
            @if($type=='number')
                text-end
            @elseif($type=='text')
                text-start
            @endif" 
        id="{{$name}}" 
        name="{{$name}}" 
        @if($type=='checkbox')
            value="1"
        @elseif($type=='number')
            value="{{($value)?$value:0}}"
        @else
            value="{{$value}}"
        @endif
        placeholder="{{__($placeholder)}}" 
        @if($required) required @endif @if($disabled) disabled @endif 
        @if($type=='checkbox' && $value) checked @endif
    >
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
    @if($type == 'file')
        <img src="{{($value)?asset('storage/'.$value):''}}" class="rounded w-100 mt-2" data-image-id="image-{{$name}}">
    @endif
</div>
@push('javascript')
@if($type == 'file')
<script>
    $(document).on('change', 'input[type="file"]', function() {
        let input = $(this);
        let files = event.target.files;
        var image = files[0]
        let reader = new FileReader();
        reader.onload = function(file) {
            $(`[data-image-id="image-${input.attr('name')}"]`).attr('src', file.target.result);
        }
        reader.readAsDataURL(image);
    });
</script>
@endif
@endpush