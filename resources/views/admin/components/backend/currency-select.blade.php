<x-backend.select 
    :options="$options" 
    text="backend.common.customer_currency" 
    :name="$name" 
    placeholder="backend.common.customer_currency"
    :required="(true)"
    :disabled="($disabled)"
    :multiple="(false)"
    :value="($value??'')" />

@push('javascript')
<script>
    var currencies = @json($currencies);
    
    $(`select[name="{{$name}}"]`).change(function(){
        setFormFloat($(this).val());
    });

    function setFormFloat(id) {
        let currency = currencies[id];
        form_input_unit_price_float = currency.unit_price_float;
        form_input_price_float      = currency.price_float;
        exchange      = currency.exchange;
        $('.input-number').trigger('keyup');
    }
    @if($value) 
        setFormFloat({{$value}})
    @endif
</script>
@endpush