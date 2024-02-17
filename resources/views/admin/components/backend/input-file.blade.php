<div class="mb-4">
    @if($text)
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @endif
    <input 
        type="file" 
        class="form-control input-file" 
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
    @if($type == 'file')
        @if(preg_match("/\.jpg|jpeg|png|bmp$/",$value))
        <img src="{{($value)?asset('storage/'.$value):''}}" class="rounded w-100 mt-2" data-image-id="image-{{$name}}">
        @else
        @php
        $inputFile = explode("/",$value);
        @endphp
        <p class="mt-1">{{array_pop($inputFile) }}</p>
        @endif
    @endif
</div>
@pushonce('javascript')
@if($type == 'file')
<script>
    $(document).on('change', 'input[type="file"]', function(event) {
        let input = $(this);
        let files = event.target.files;
        var file = files[0]
        if(file.name.match('\.jpg|jpeg|png|bmp$')) {
            let reader = new FileReader();
            reader.onload = function(file) {
                $(`[data-image-id="image-${input.attr('name')}"]`).attr('src', file.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endif
@endpushonce