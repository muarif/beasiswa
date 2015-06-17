<script src="<?php echo config_item('assets'); ?>js/wizard/jquery.bootstrap.wizard.js"></script>
<script>
	$(document).ready(function(){
		$('.dp').datepicker();
		$('#rootwizard').bootstrapWizard({
			'tabClass': 'nav nav-pills',
			onInit:function(){

			},
			onTabShow: function(tab, navigation, index) {
				var $total = navigation.find('li').length;
				var $current = index+1;
				var $percent = ($current/$total) * 100;
				$('#rootwizard .progress-bar').css({width:$percent+'%'});
			}
		});
		
		
	})
</script>