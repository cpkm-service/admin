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
    <div id="file-show-{{$name}}">
        
        {{-- @if($type == 'file')
            @if(preg_match("/\.jpg|jpeg|png|bmp$/",$value))
            <img src="{{($value)?asset('storage/'.$value):''}}" class="rounded w-100 mt-2" data-image-id="image-{{$name}}">
            @else
            @php
            $inputFile = explode("/",$value);
            @endphp
            <p class="mt-1">{{array_pop($inputFile) }}</p>
            @endif
        @endif --}}
    </div>
</div>
@pushonce('javascript')
@if($type == 'file')
<script>
    function makeImage(name, file) {
        //file 驗證是不是base64
        if (!file.match(/^data:image\/(png|jpeg|jpg|gif|svg\+xml);base64,/)) {
            file = "{{asset('storage')}}/" + file;
        }
        $(`[id="file-show-${name}"]`).html(`<img src="${file}" class="rounded w-100 mt-2" data-image-id="image-${name}">`)
    }
    function makeFile(name, file) {
        var file = file.split('/');
        $(`[id="file-show-${name}"]`).html(`<p class="mt-1">${file.pop()}</p>`)
    }
    $(document).on('change', 'input[type="file"]', function(event) {
        let input = $(this);
        let files = event.target.files;
        var file = files[0]
        if(file.name.match('\.jpg|jpeg|png|bmp$')) {
            let reader = new FileReader();
            reader.onload = function(file) {
                makeImage(input.attr('name'), file.target.result);
            }
            reader.readAsDataURL(file);
        }else{
            makeFile(input.attr('name'), file.name);
        }
    });
    @if($value??false && preg_match("/\.jpg|jpeg|png|bmp$/",$value)) 
    makeImage('{{$name}}', '{{$value}}');
    @else
    makeFile('{{$name}}', '{{$value}}');
    @endif
</script>
@endif
@endpushonce