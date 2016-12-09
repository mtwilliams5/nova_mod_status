<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<script type="text/javascript">
	function set_sample_output(value)
	{
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('ajax/info_format_date');?>",
			data: { format: value },
			success: function(data){
				$('#format_output').html(data);
			}
		});
	}
	
	$(document).ready(function(){
		$('#tabs').tabs();
		$('#tabs').tabs('select', <?php echo $tab;?>);
		
		$('table.zebra tbody > tr:nth-child(odd)').addClass('alt');
		
		$('.slider_control > .slider').each(function() {
			var value = parseInt($(this).text());
			var id = parseInt($(this).attr('id'));
			
			$(this).empty();
			$(this).slider({
				range: 'min',
				value: value,
				min: 0,
				max: 100,
				slide: function(event, ui) {
					$('#' + parseInt(ui.handle.parentNode.id) + '_amount').html(ui.value);
					$('#' + parseInt(ui.handle.parentNode.id) + '_open').val(ui.value);
				}
			});
		});
	});
</script>