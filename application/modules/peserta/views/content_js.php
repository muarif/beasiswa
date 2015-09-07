<script src="<?php echo config_item('assets'); ?>js/wizard/jquery.bootstrap.wizard.js"></script>
<script src="<?php echo config_item('assets'); ?>js/switch/dist/js/bootstrap-switch.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(".deleteButton").prop('onclick', null);
		$('.deleteButton').on('click',function(e){
			e.preventDefault();
		});
		$('#my_modal').on('show.bs.modal', function(e) {
		    var id = $(e.relatedTarget).data('id');
		    $(e.currentTarget).find('.delB').attr('href','<?php echo site_url('kandidat/hapus')?>/'+id);
		});
		$(function() {
	      	$('.table-responsive').responsiveTable({'addFocusBtn': false});
	   	});
	})
</script>