<span>
    <div class="input-group mb-3" style="width:70px">
        <input type="text" class="form-control fs-4 re_ord{{ $data->id }}"
            value="{{ $data->serial_no }}" aria-label="Serial_no"
            aria-describedby="basic-addon1">
        <span class="input-group-text set-ord"
            onclick="reorder_slider('.re_ord{{ $data->id }}',{{ $data->id }})"
            id="basic-addon1"><i class="icofont-rounded-right fs-5"></i></span>
    </div>
</span>
<script type="text/javascript">
    function reorder_slider(selector, id) {
        var order_no = $(selector).val();
        var x = new Ajx;
        x.actionUrl('{{ route($route_name . '.store') }}');
        x.passData('id', id);
        x.passData('action', 'REORDER');
        x.passData('serial_no', order_no);
        x.globalAlert(true);
        x.start(function(response) {
            if (response.status == true) {
                location.reload();
            }
        });
    }
</script>
