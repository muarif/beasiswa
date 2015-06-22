<script src="<?php echo config_item('assets'); ?>js/wizard/jquery.bootstrap.wizard.js"></script>
<script>
	$(document).ready(function(){
		$('.dp').datepicker({format:'yyyy-mm-dd'});
		$('#rootwizard').bootstrapWizard({
			'tabClass': 'nav nav-pills',
			onInit:function(tab, navigation, index){
				$('#rootwizard .tab-pane').each(function(index,element){
					var total_error = $('.has-error',element).length;
					var getId = $(this).attr('id');
					// alert(getId);
					if(total_error>0){
						 var ele = $('#rootwizard').find(".nav a[href*='#"+getId+"']");
						 ele.append('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>');
						 ele.parent().addClass('has-error');
					}
				});
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