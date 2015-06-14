<script type="text/javascript">
	$(document).ready(function(){
		$('.deleteButton').on('click',function(e){
			e.preventDefault();
		});
		$('#my_modal').on('show.bs.modal', function(e) {
		    var bookId = $(e.relatedTarget).attr('href');
		    $(e.currentTarget).find('.delB').attr('href',bookId);
		});
	})
</script>