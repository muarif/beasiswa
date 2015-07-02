<script type="text/javascript">
	$(document).ready(function(){
		$(".deleteButton").prop('onclick', null);
		$('.deleteButton').on('click',function(e){
			e.preventDefault();
		});
		$('#my_modal').on('show.bs.modal', function(e) {
		    var id = $(e.relatedTarget).data('id');
		    $(e.currentTarget).find('.delB').attr('href','<?php echo site_url('kanwil/hapus')?>/'+id);
		});
	})
</script>