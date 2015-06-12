<script src="<?php echo config_item('assets'); ?>js/datatable/media/js/jquery.dataTables.js"></script>
<script src="<?php echo config_item('assets'); ?>js/dataTables.bootstrap.js"></script>
<script>
	//datatables
	$(document).ready(function () {
		$('#userTable').dataTable({
            'processing': true,
            'serverSide': true,
           	'ajax': '<?php echo site_url('user/listUser')?>'
        });
        //Search input style
        $('.dataTables_filter input').attr('placeholder','Search');
	});
	
	
</script>