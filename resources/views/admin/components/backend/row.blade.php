
<div class="{{$row['class']}}">
    @foreach($row['col'] as $item)
        <div class="{{$item['class']}}">
            @foreach($item['col'] as $sub_item)
                @if($sub_item['class'] == 'row')
                    <x-backend::row :row="$sub_item" />
                @elseif($sub_item['class'] == 'slots')
                    @yield($sub_item['field'])
                @elseif($sub_item['class'] == 'fields')
                    @switch($fields[$sub_item['field']]['tag'])
                        @case('radio')
                        <x-backend::radio
                            :direction="$fields[$sub_item['field']]['tag']"
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :options="$fields[$sub_item['field']]['options']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="($fields[$sub_item['field']]['required']??false)"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="($fields[$sub_item['field']]['value']??'')" />
                        @break
                        @case('select')

                        <x-backend::select 
                            :children="($fields[$sub_item['field']]['children']??[])" 
                            :options="$fields[$sub_item['field']]['options']" 
                            :selected="($fields[$sub_item['field']]['selected']??[])"
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :multiple="($fields[$sub_item['field']]['multiple']??false)"
                            :source="($fields[$sub_item['field']]['source']??'')"
                            :class="($fields[$sub_item['field']]['class']??'')"
                            :templateResult="($fields[$sub_item['field']]['templateResult']??'')"
                            :templateSelection="($fields[$sub_item['field']]['templateSelection']??'')"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('textarea')
                        <x-backend::textarea 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('ckeditor5')
                        <x-backend::ckeditor5 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('input')
                        <x-backend::input 
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :type="$fields[$sub_item['field']]['type']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :float="($fields[$sub_item['field']]['float']??false)"
                            :int="($fields[$sub_item['field']]['int']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('currency-select')
                            <x-backend.currency-select 
                                :name="$fields[$sub_item['field']]['name']" 
                                :value="($fields[$sub_item['field']]['value']??'')"
                                :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            />
                        @break
                        @case('checkbox')
                        <x-backend::checkbox 
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :checked="($fields[$sub_item['field']]['checked']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('media')
                        <x-backend::media 
                            :tag="$fields[$sub_item['field']]['tag']" 
                            :type="$fields[$sub_item['field']]['type']" 
                            :text="$fields[$sub_item['field']]['text']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :info="$fields[$sub_item['field']]['info']"
                            :multiple="$fields[$sub_item['field']]['multiple']??false"
                            :id="$sub_item['field']"
                            :placeholder="$fields[$sub_item['field']]['placeholder']"
                            :required="$fields[$sub_item['field']]['required']??false"
                            :disabled="($fields[$sub_item['field']]['disabled']??false)"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('multiple')
                        <x-backend::multiple 
                            :text="$fields[$sub_item['field']]['text']" 
                            :key="$fields[$sub_item['field']]['key']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :parameters="$fields[$sub_item['field']]['parameters']"
                            :id="$sub_item['field']"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('multiple_table')
                        <x-backend::multiple_table 
                            :text="$fields[$sub_item['field']]['text']" 
                            :key="$fields[$sub_item['field']]['key']" 
                            :name="$fields[$sub_item['field']]['name']" 
                            :disabled="$fields[$sub_item['field']]['disabled']??false" 
                            :parameters="$fields[$sub_item['field']]['parameters']"
                            :id="$sub_item['field']"
                            :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                        @break
                        @case('ckeditor-print')
                            @if(collect(app()->getLoadedProviders())->has(\Cpkm\Print\PrintServiceProvider::class))
                            <x-print::ckeditor-print 
                                :text="$fields[$sub_item['field']]['text']" 
                                :name="$fields[$sub_item['field']]['name']" 
                                :placeholder="$fields[$sub_item['field']]['placeholder']"
                                :required="$fields[$sub_item['field']]['required']??false"
                                :disabled="($fields[$sub_item['field']]['disabled']??false)"
                                :value="(old($sub_item['field'])??($fields[$sub_item['field']]['value']??''))" />
                            @endif
                        @break
                    @endswitch
                @endif
            @endforeach
        </div>
    @endforeach
</div>