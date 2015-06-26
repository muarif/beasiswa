<script src="<?php echo config_item('assets'); ?>js/wizard/jquery.bootstrap.wizard.js"></script>
<script src="<?php echo config_item('assets'); ?>js/switch/dist/js/bootstrap-switch.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("textarea[name='alasan_lulus'],select[name='desc_status']").prop('disabled','disabled');
		var selected1 = $("input[name='id_lulus']:checked");
		if(selected1==1){
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

		var selected2 = $("input[name='status']:checked").val();
		
		if(selected2==1){
		    	$("select[name='desc_status']").prop('disabled','disabled');
		    }else{
		    	$("select[name='desc_status']").prop('disabled','');
		    }
		$("input[name='status']").on("change", function () {
		    if($(this).val()==1){
		    	$("select[name='desc_status']").prop('disabled','disabled');
		    }else{
		    	$("select[name='desc_status']").prop('disabled','');
		    }
		});

	})
</script>