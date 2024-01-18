<button type="button" class="btn btn-primary fs-4 mt-4 disable_btn" onclick="submit_form()">
    Save 
    {!! Hpx::spinner() !!}
</button>

<script>
	function submit_form(){
		var x = new Ajx;
		x.form = '#myForm';
		x.ajxLoader('#myForm .loaderx');
		x.disableBtn('#myForm .disable_btn');
		x.globalAlert(true);
		// x.reset = true;
		x.start(function(response){
			if(response.status == true){
				location.reload();
			}
		});
	}
</script>