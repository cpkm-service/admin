<ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
    @foreach ($form['tabs'] as $key => $tab)
    <li class="nav-item" role="presentation">
        <button type="button" class="nav-link @if($key == 0) active @endif" id="{{$tab['key']}}-tab" data-bs-toggle="tab" data-bs-target="#{{$tab['key']}}" role="tab" aria-controls="{{$tab['key']}}" aria-selected="false" tabindex="-1">
            {{ __($tab['key']) }}
        </button>
    </li>
    @endforeach
    
    @if($show??false)
    <li class="nav-item audit-tab" role="presentation">
        <button type="button" class="nav-link" id="btabs-static-profile-tab" data-bs-toggle="tab" data-bs-target="#btabs-static-profile" role="tab" aria-controls="btabs-static-profile" aria-selected="false" tabindex="-1">
            {{ __('audit') }}
        </button>
    </li>
    @endif
</ul>
<form action="{{$form['action']}}" method="POST" name="{{$form['name']}}" enctype="multipart/form-data">
    <div class="block-content tab-content">
        <input type="hidden" name="_method" value="{{$form['method']}}">
        @csrf
        @foreach ($form['tabs'] as $key => $tab)
        <div class="tab-pane @if($key == 0) active @endif" id="{{$tab['key']}}" role="tabpanel" aria-labelledby="btabs-alt-static-home-tab">
            <x-backend::row :row="$tab['tab']" />
            <div class="row">
                <div class="mb-4">
                    @if(!($show??false))
                    <button type="submit" class="btn btn-primary">{{__('admin::Admin.sent')}}</button>
                    @endif
                    @if($form['back'] !== false)
                    <a href="{{$form['back']}}" class="btn btn-secondary">{{__('admin::Admin.back')}}</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        @error('error')
            <div id="error" class="invalid-feedback animated fadeIn" style="display:block">{{$message}}</div>
        @enderror
        <div id="template_area" class="d-none">
        @stack('template')    
        </div>
        @if($show??false)
        <div class="tab-pane " id="btabs-static-profile" role="tabpanel" aria-labelledby="btabs-alt-static-home-tab">
            @include('backend.layouts.audits', [ 'table' => $table, 'table_id' => $detail->id ])
        </div>
        @endif
    </div>
</form>
@push('javascript')
<script>
    Codebase.onLoad((
        ()=>class{
            static initValidation(){
                Codebase.helpers("jq-validation"),
                $(`form[name="{{$form['name']}}"]`).validate({
                    rules:@json(collect($fields)->map(function($item){ return $item['rules'];})),
                    submitHandler: function() {
                        Codebase.block('state_toggle','.block-rounded');
                        return true;
                    },
                })
            }
            static init(){
                this.initValidation()
            }
        }.init()
    ));
</script>
@endpush