<div class="mb-4 multiple_table" id="{{$name}}_multiple_table">
    <label class="form-label" for="{{$name}}">{{__($text)}}@if($required)<span class="text-danger">*</span>@endif</label>
    @if(!($disabled??false))
    <button type="button" class="ms-2 btn btn-sm btn-danger" id="{{$name}}_template_add">{{__('admin::Admin.insert')}}</button>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped js-dataTable-full mt-2">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    @foreach($parameters as $item)
                    <th class="text-center @if(($item['width']??false) == '0px') d-none @endif" @if($item['width']??false) style="min-width: {{$item['width']}};" @endif>
                        {{__($fields[$item['field']]['text'])}}
                        @if($fields[$item['field']]['required'])
                        <span class="text-danger">*</span>
                        @endif
                    </th>
                    @endforeach
                    <th></th>
                </tr>
            </thead>
            <tbody id="{{$name}}_area"></tbody>
        </table>
    </div>
</div>
@pushonce('style')
<style>
    .multiple_table table td label  {
        display: none;
    }
    .multiple_table table td .mb-4 {
        margin-bottom: 0!important;
    }
    .multiple_table table {
        min-width: 100%;
    }
    @media (max-width: 992px) {
        .multiple_table table thead {
            display: none;
        }
        .multiple_table td {
            display:flex;
        }
        .multiple_table table td .mb-4 {
            display: flex;
            width: 100%;
        }
        .multiple_table table td label {
            display: flex;
            justify-content: right;
            padding-right: 20px;
            align-items: center;
            flex: 0.3;
        }
        .multiple_table table td .no {
            display: flex;
            flex: 1;
        }
        .multiple_table table td input {
            display: flex;
            flex: 1;
            align-items: center;
        }
        .multiple_table table td .select-item {
            display: flex;
            flex: 1;
            align-items: center;
        }
        .multiple_table table td:last-of-type {
            justify-content: right;
        }
    }
</style>
@endpushonce
@push('template')
<table class="{{$name}}_template " id="{{$name}}_template">
    <tbody>
        <tr class="template_area">
            <td>
                <div class="mb-4">
                    <label for="">
                    #
                    </label>
                    <span class="no">
                        $i
                    </span>
                    <input type="hidden" name="{{$name}}[$i][{{$key}}]" id="{{$name}}[$i][{{$key}}]">
                </div>
            </td>
            @foreach($parameters as $item)
            <td class="@if(($item['width']??false) == '0px') d-none @endif">
                @switch($fields[$item['field']]['tag'])
                    @case('select')
                    <x-backend::select 
                        :id="$item['field']"
                        :children="($fields[$item['field']]['children']??[])" 
                        :options="$fields[$item['field']]['options']" 
                        :text="$fields[$item['field']]['text']" 
                        :name="$fields[$item['field']]['name']" 
                        :placeholder="$fields[$item['field']]['placeholder']"
                        :required="$fields[$item['field']]['required']??false"
                        :disabled="($fields[$item['field']]['disabled']??false)"
                        :multiple="($fields[$item['field']]['multiple']??false)"
                        :source="($fields[$item['field']]['source']??'')"
                        :class="($fields[$item['field']]['class']??'')"
                        :templateResult="($fields[$item['field']]['templateResult']??'')"
                        :templateSelection="($fields[$item['field']]['templateSelection']??'')"
                        :value="(old($item['field'])??($fields[$item['field']]['value']??''))" />
                    @break
                    @case('textarea')
                    <x-backend::textarea 
                        :id="$item['field']"
                        :text="$fields[$item['field']]['text']" 
                        :name="$fields[$item['field']]['name']" 
                        :placeholder="$fields[$item['field']]['placeholder']"
                        :required="$fields[$item['field']]['required']??false"
                        :disabled="($fields[$item['field']]['disabled']??false)"
                        :value="(old($item['field'])??($fields[$item['field']]['value']??''))" />
                    @break
                    @case('input')
                    <x-backend::input 
                        :id="$item['field']"
                        :tag="$fields[$item['field']]['tag']" 
                        :type="$fields[$item['field']]['type']" 
                        :text="$fields[$item['field']]['text']" 
                        :name="$fields[$item['field']]['name']" 
                        :placeholder="$fields[$item['field']]['placeholder']"
                        :required="$fields[$item['field']]['required']??false"
                        :disabled="($fields[$item['field']]['disabled']??false)"
                        :float="($fields[$item['field']]['float']??false)"
                        :int="($fields[$item['field']]['int']??false)"
                        :value="(old($item['field'])??($fields[$item['field']]['value']??''))" />
                    @break
                    @case('media')
                    <x-backend::media 
                        :id="$item['field']"
                        :tag="$fields[$item['field']]['tag']" 
                        :type="$fields[$item['field']]['type']" 
                        :text="$fields[$item['field']]['text']" 
                        :name="$fields[$item['field']]['name']" 
                        :info="$fields[$item['field']]['info']"
                        :multiple="$fields[$item['field']]['multiple']??false"
                        :id="$item['field']"
                        :placeholder="$fields[$item['field']]['placeholder']"
                        :required="$fields[$item['field']]['required']??false"
                        :disabled="($fields[$item['field']]['disabled']??false)"
                        :value="(old($item['field'])??($fields[$item['field']]['value']??''))" />
                    @break
                    @case('span')
                        <div class="text-center">
                            <span id="{{$fields[$item['field']]['name']}}" >
                                {{($fields[$item['field']]['value']??'')}}
                            </span>
                        </div>
                    @break
                    @case('slot')
                        <div class="text-center">
                            {!!($fields[$item['field']]['value']??'')!!}
                        </div>
                    @break
                @endswitch
            </td>
            @endforeach
            <td>
                @if(!($disabled??false))
                <button class="btn btn-sm btn-danger delete_multiple_template" type="button">
                    <i class="fa fa-x"></i>
                    {{-- {{__('admin::Admin.delete')}} --}}
                </button>
                @endif
            </td>
        </tr>
    </tbody>
</table>
@endpush
@pushonce('javascript')
<script>
    var multiple_data = [];
    function seqCheck(seq, name) {
        let check = false;
        $(`[id="${name}_area"] .template_area`).each(function() {
            let regexp = new RegExp(`${name}\\[${seq}\\]`,'gs');
            if($(this).prop("outerHTML").match(regexp) != null) {
                check = true;
            }
        });
        if(check) {
            return seqCheck((seq+1), name);
        }
        return seq;
    }
    function makeItem(id, name) {
        id = seqCheck(id, name);
        $(`[id="${name}_area"]`).append($(`[id="${name}_template"] tr`).clone().removeClass(`${name}_template`).prop("outerHTML").replace(/\$i/ig,id));
        $(`[id="${name}_area"] select`).each(function(){
            if(!$(this).data('select2')) {
                let select2_option = {
                    allowClear: true,
                };
                if($(this).data('templateresult')) {
                    select2_option['templateResult'] = eval($(this).data('templateresult'));
                }
                if($(this).data('templateselection')) {
                    select2_option['templateSelection'] = eval($(this).data('templateselection'));
                }
                $(this).select2(select2_option);
            }
        });
    }
    $(document).on('click', '.delete_multiple_template', function(){
        $(this).parents('tr').remove();
    });
</script>
@endpushonce
@push('javascript')
<script>
    multiple_data['{{$name}}'] = @json($value);
    
    $('[id="{{$name}}_template_add"]').click(function(){
        let add_length = ($('[id="{{$name}}_area"] .template_area').length + 1);
        makeItem(add_length, '{{$name}}');
        $(this).trigger('multiple_table_add', [add_length, '{{$name}}']);
    }); 
    $(document).ready(function(){
        $('[id="{{$name}}_template"] select').each(function(){
            if($(this).data('select2')) {
                $(this).select2("destroy");
            }
        });

        multiple_data['{{$name}}'].map((item, key) => {
            let id = key + 1;
            makeItem(id, '{{$name}}');
            Object.keys(item).map((key) => {
                let element = $(`[id="{{$name}}[${id}][${key}]"]`);
                if(element.length > 0 ) {
                    switch (element.prop("tagName")) {
                        case 'A':
                            element.attr('href', item[key])
                            break;
                        case 'SPAN':
                            element.text(item[key])
                            break;
                        case 'TEXTAREA':
                            element.text(item[key])
                            break;
                        case 'SELECT':
                            element.attr('transfer', true);
                            element.val(item[key]).trigger('change')
                            element.removeAttr('transfer');
                            break;
                        default:
                            if(element.prop('type') == 'checkbox') {
                                if(!item[key]) {
                                    element.removeAttr('checked');
                                }
                            }else{
                                if(element.attr('type') == 'number') {
                                    let id = element.attr('id');
                                    $(`[id="number-${id}"]`).val(item[key]).trigger('keyup')
                                }else{
                                    if(element.attr('type') != 'file') {
                                        element.val(item[key]).trigger('change')
                                    }else{
                                        if(item[key]){
                                            makeImage(element.attr('name'), item[key]);
                                        }
                                    }
                                }
                            }
                            break;
                    }
                }
            });
        })
    })
</script>
@endpush