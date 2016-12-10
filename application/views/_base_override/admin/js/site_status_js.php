<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabs').tabs();
		$('#tabs').tabs('select', <?php echo $tab;?>);
		
		$('.slider_control > .slider').each(function() {
			var value = parseInt($(this).text());
			var id = parseInt($(this).attr('id'));
			
			$(this).empty();
			$(this).slider({
				range: 'min',
				value: value,
				min: 0,
				max: 100,
				step: 25,
				slide: function(event, ui) {
					$('#' + parseInt(ui.handle.parentNode.id) + '_amount').html(ui.value);
					$('#' + parseInt(ui.handle.parentNode.id) + '_percent').val(ui.value);
				}
			});
		});
	});
</script>