<a class="btn btn-sm btn-outline-danger fs-4 delete__btn" onclick="delete_id({{$data->id}})">Delete</a>

<script type="text/javascript">
    function delete_id(id) {
        if (confirm("Are you sure want to delete..!") == true) {
            var x = new Ajx;
            x.actionUrl('{{ route($route_name . '.store') }}');
            x.passData('id', id);
            x.passData('action', 'DELETE');
            x.globalAlert(true);
            x.start(function(response) {
                if (response.status == true) {
                    location.reload();
                }
            });
        }
    }
</script>
