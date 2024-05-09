@extends('admin::example.layouts.main')
@section('content')
<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Radio</h3>
    </div>
    <div class="block-content block-content-full">
        <h4 class="">Example</h4>
        <div class="row">
            <div class="col-4">
                <div class="row mb-2">
                    <div class="col-12">
                        <x-backend::radio
                            direction="horizontal"
                            text="Radio" 
                            name="Radio" 
                            :options="[
                                ['name'=>'Option 1', 'value'=>'1'],
                                ['name'=>'Option 2', 'value'=>'2'],
                                ['name'=>'Option 3', 'value'=>'3']
                            ]" 
                            :required="true"
                            :disabled="false"
                            value="" />
                        <code>
                            &lt;x-backend::radio
                                direction="horizontal"
                                text="Radio" 
                                name="Radio" 
                                :options="[
                                    ['name'=>'Option 1', 'value'=>'1'],
                                    ['name'=>'Option 2', 'value'=>'2'],
                                    ['name'=>'Option 3', 'value'=>'3']
                                ]" 
                                :required="true"
                                :disabled="false"
                                value="" /&gt;
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
                                <td class="text-center">direction</td>
                                <td class="text-center">否</td>
                                <td class="text-center">horizontal:水平/vertical: 垂直</td>
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
                                <td class="text-center">options</td>
                                <td class="text-center">否</td>
                                <td class="text-center">Radio 選項</td>
                            </tr>
                        </tbody>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection