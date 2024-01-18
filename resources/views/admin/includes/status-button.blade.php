<label class="switchz">
    <input type="checkbox"
        onclick="change_status(this,{{ $data->id }})" '.(@if (!empty($data->status)) checked @endif).'>
    <span class="sliderz round"></span>
</label>
<script type="text/javascript">
    function change_status(selector, id) {
        var status = $(selector).prop('checked') == true ? 1 : 0;
        var x = new Ajx;
        x.actionUrl('{{ route($route_name . '.store') }}');
        x.passData('id', id);
        x.passData('action', 'UPDATE_STATUS');
        x.passData('status', status);
        x.globalAlert(true);
        x.start();
    }
</script>
