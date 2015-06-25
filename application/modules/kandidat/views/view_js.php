<script src="<?php echo config_item('assets'); ?>js/wizard/jquery.bootstrap.wizard.js"></script>
<script src="<?php echo config_item('assets'); ?>js/switch/dist/js/bootstrap-switch.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("textarea[name='alasan_lulus'],input[name='status']").prop('disabled','disabled');
		var selected = $("input[name='id_lulus']:checked");
		if(selected==1){
		    	$("textarea[name='alasan_lulus']").prop('disabled','disabled');
		    }else{
		    	$("textarea[name='alasan_lulus']").prop('disabled','');
		    }
		$("input[name='id_lulus']").on("change", function () {
		    if($(this).val()==1){
		    	$("textarea[name='alasan_lulus']").prop('disabled','disabled');
		    }else{
		    	$("textarea[name='alasan_lulus']").prop('disabled','');
		    }
		});
	})
</script>