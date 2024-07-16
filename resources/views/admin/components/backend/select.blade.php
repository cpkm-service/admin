
<div class="mb-4 {{$class??''}}">
    @if($text)
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @endif
    @if($readonly)
    <input type="hidden" name="{{$name}}" value="{{$value}}">
    @endif
    <select
        class="js-select2 form-select"
        id="{{$name}}" name="{{$name}}"
        style="width: 100%;"
        data-placeholder="{{__($placeholder)}}"
        @if($disabled || $readonly) disabled @endif
        @if($multiple) multiple @endif
        @if($required) required @endif
        @if($templateResult) data-templateResult="{{$templateResult}}" @endif
        @if($templateSelection) data-templateSelection="{{$templateSelection}}" @endif
        lang="zh-CN"
    >
        @if(!$multiple)
        <option></option>
        @endif
        @foreach($options as $option)
    <option value="{{$option['value']}}"
            @if($multiple && is_array($value) && in_array($option['value'], $value)) selected @endif
            @if(!$multiple && $value == $option['value']) selected @endif
            
            @if(isset($option['extends']))
                @foreach($option['extends'] as $key => $extend)
                    {{$key}}="{{$extend}}"
                @endforeach
            @endif
    >{{$option['name']}}</option>
    @endforeach
    </select>
    @error($name)
        <div id="{{$name}}-error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
    @enderror
</div>
@push('javascript')
<script>
    @if($children)
        $(`select[name="{{$name}}"]`).change(function(){
            sendApi(
                '{{route($children['ajax']['url'],[],false)}}','{{$children['ajax']['method']}}',
                {
                    @foreach($children['ajax']['data'] as $key => $value)
                    {{$key}}:@if($value=='value') $(this).text() @else '{{$value}}' @endif
                    @endforeach
                },function(result){
                let str = '';
                result.data.children.map((item)=>{
                    str += `<option value="${item.id}">${item.name}</option>`
                });
                $(`select[name="{{$children['name']}}"]`).html(str);
            });
        });
    @endif
    @if($ajax)
    $(`form select[name="{{$name}}"]`).select2({
        allowClear: true,
        ajax: {
            url: "{{$ajax}}",
            data: function (params) {
                return { search: params.term };
            },
            processResults: function(data, page) {
                select_all_data[name] = data;
                return {
                    results: data.map(item => { return {
                        id: item.id,
                        text: item.name
                    } })
                }
            },
        }
    });
    @else
    $(document).ready(function(){
        $(`form select[name="{{$name}}"]`).select2({
            allowClear: true,
            @if($templateResult)
            templateResult: {{$templateResult}},
            @endif
            @if($templateSelection)
            templateSelection: {{$templateSelection}},
            @endif
        });
    })
    @endif
    @if($readonly)
    $(`form select[name="{{$name}}"]`).change(function(){
        $(`form input[name="{{$name}}"]`).val($(this).val());
    });
    @endif
</script>
@endpush