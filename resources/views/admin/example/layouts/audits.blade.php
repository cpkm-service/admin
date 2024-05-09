<div class="block block-rounded">
    <div class="block-content block-content-full">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="data-audit">
            <thead></thead>
            <tbody></tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
$(function() {
    var tableList = $('#data-audit');
    var table = tableList.DataTable({
        autoWidth:false,
        processing: true,
        serverSide: true,
        responsive: true,
        language: { url: '{{ asset('zh-Hant.json') }}' },
        stateSave: true,
        order: [[4, 'desc']],
        ajax: {
            url: '{{ route('backend.audits.index') }}',
            data: {
                table: '{{ $table }}',
                table_id: '{{ $table_id }}',
            }            
        },
        columns: [
            { width: '7%', data: 'id', title: '#', bSearchable: false, bSortable: false, render: function ( data, type, row , meta ) {
                return  meta.row + 1;
            }},
            { width: '15%', data: 'admin.name', title: '{{ __("backend.audits.admin_user") }}', defaultContent: '' } ,
            { width: '10%', data: 'event', title: '{{ __("backend.audits.event") }}' } ,
            { width: '53%', data: 'auditing', title: '{{ __("backend.audits.auditing") }}', render: function ( data, type, row , meta ) {
                return `<pre style="margin: 0">${ data.map(item => decodeEntities(item)).join("\n") }</pre>`;
            } },          
            { width: '20%', data: 'updated_at', title: '{{ __('updated_at') }}' },
        ],
        fnDrawCallback: function () {
            $('.img-link').each(function(){
                $(this).attr('href', $(this).children().attr('src'));
            })
            $('.img-link').magnificPopup({
                type: 'image'
            });
        },
    });

    $('.nav-tabs').on('shown.bs.tab', function (e) {
        table.columns.adjust().draw();
    });
});
</script>
@endpush
