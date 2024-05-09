@extends('admin::example.layouts.main')
@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Checkbox</h3>
    </div>
    <div class="block-content block-content-full">
        <h4 class="">Example</h4>
        <div class="row">
            <div class="col-4">
                <div class="row mb-2">
                    <div class="col-12">
                        <x-backend::checkbox 
                            tag="chekbox"
                            text="Checkbox" 
                            name="checkbox" 
                            :required="true"
                            :disabled="false"
                            :checked="true"
                            value="checkbox" />
                        <code>
                            &lt;x-backend::checkbox 
                                text="Radio" 
                                name="radio" 
                                :required="true"
                                :disabled="false"
                                :checked="true"
                                value="checkbox" /&gt;
                        </code>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <table class="table table-bordered">
                    <tbody>
                        <tbody>
                            <tr>
                                <td class="text-center" colspan="2">通用參數</td>
                            </tr>
                            <tr>
                                <td class="text-center">參數</td>
                                <td class="text-center">必填</td>
                                <td class="text-center">說明</td>
                            </tr>
                            <tr>
                                <td class="text-center">tag</td>
                                <td class="text-center">是</td>
                                <td class="text-center">input</td>
                            </tr>
                            <tr>
                                <td class="text-center">type</td>
                                <td class="text-center">是</td>
                                <td class="text-center">text/date/number/file</td>
                            </tr>
                            <tr>
                                <td class="text-center">text</td>
                                <td class="text-center">是</td>
                                <td class="text-center">欄位名稱，可放置空則不顯示</td>
                            </tr>
                            <tr>
                                <td class="text-center">name</td>
                                <td class="text-center">是</td>
                                <td class="text-center">Html Input name</td>
                            </tr>
                            <tr>
                                <td class="text-center">placeholder</td>
                                <td class="text-center">是</td>
                                <td class="text-center">Html Input Placeholder</td>
                            </tr>
                            <tr>
                                <td class="text-center">required</td>
                                <td class="text-center">是</td>
                                <td class="text-center">input 是否必填</td>
                            </tr>
                            <tr>
                                <td class="text-center">disabled</td>
                                <td class="text-center">是</td>
                                <td class="text-center">input 是否禁止填寫</td>
                            </tr>
                            <tr>
                                <td class="text-center">value</td>
                                <td class="text-center">是</td>
                                <td class="text-center">input 預設值</td>
                            </tr>
                            <tr>
                                <td class="text-center">upCase</td>
                                <td class="text-center">否</td>
                                <td class="text-center">true 為全部英文轉大寫</td>
                            </tr>
                            <tr>
                                <td class="text-center">lowCase</td>
                                <td class="text-center">否</td>
                                <td class="text-center">true 為全部英文轉小寫</td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <tbody>
                        <tbody>
                            <tr>
                                <td class="text-center" colspan="2">number參數</td>
                            </tr>
                            <tr>
                                <td class="text-center">參數</td>
                                <td class="text-center">說明</td>
                            </tr>
                            <tr>
                                <td class="text-center">float</td>
                                <td class="text-center">否</td>
                                <td class="text-center">設定該欄位預設小數點</td>
                            </tr>
                            <tr>
                                <td class="text-center">min</td>
                                <td class="text-center">否</td>
                                <td class="text-center">最小值</td>
                            </tr>
                            <tr>
                                <td class="text-center">max</td>
                                <td class="text-center">否</td>
                                <td class="text-center">最大值</td>
                            </tr>
                            <tr>
                                <td class="text-center">int</td>
                                <td class="text-center">否</td>
                                <td class="text-center">true/false是否為整數</td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection