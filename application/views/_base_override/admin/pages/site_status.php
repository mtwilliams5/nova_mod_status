<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php echo text_output($header, 'h1', 'page-head');?>

<div id="tabs">
	<ul>
		<li><a href="#one"><span><?php echo $label['mission_status'];?></span></a></li>
		<li><a href="#two"><span><?php echo $label['sim_status'];?></span></a></li>
	</ul>
	
	<div id="one">
		<?php echo form_open('site/status');?>
			<?php echo text_output($label['header_mission'], 'h2', 'page-subhead');?>
			
			<div class="indent-left">
				<p>
					<kbd><?php echo $label['alert'];?></kbd>
					<?php echo form_dropdown('alert', $values['alert'], $default['alert']);?>
				</p>
				<p>
					<kbd><?php echo $label['stardate'];?></kbd>
					<?php echo form_input($inputs['stardate']);?>
				</p>
				<p>
					<kbd><?php echo $label['mission'];?></kbd>
					<?php echo form_input($inputs['mission']);?>
				</p>
				<p>
					<kbd><?php echo $label['post'];?></kbd>
					<?php echo form_input($inputs['post']);?>
				</p>
				<p>
					<kbd><?php echo $label['custom'];?></kbd>
					<?php echo form_input($inputs['custom']);?>
				</p>
			</div><br />
			
			<?php echo text_output($label['preferences'], 'h2', 'page-subhead');?>
			
			<div class="indent-left">
            	<p>
					<kbd><?php echo $label['show_alertbar'];?></kbd>
					<?php echo form_radio($inputs['show_alertbar_on']) .' '. form_label($label['yes'], 'show_alertbar_on');?>
					<?php echo form_radio($inputs['show_alertbar_off']) .' '. form_label($label['no'], 'show_alertbar_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_post_title'];?></kbd>
					<?php echo form_radio($inputs['show_post_title_on']) .' '. form_label($label['yes'], 'show_post_title_on');?>
					<?php echo form_radio($inputs['show_post_title_off']) .' '. form_label($label['no'], 'show_post_title_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_post_timeline'];?></kbd>
					<?php echo form_radio($inputs['show_post_timeline_on']) .' '. form_label($label['yes'], 'show_post_timeline_on');?>
					<?php echo form_radio($inputs['show_post_timeline_off']) .' '. form_label($label['no'], 'show_post_timeline_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_post_date'];?></kbd>
					<?php echo form_radio($inputs['show_post_date_on']) .' '. form_label($label['yes'], 'show_post_date_on');?>
					<?php echo form_radio($inputs['show_post_date_off']) .' '. form_label($label['no'], 'show_post_date_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_post_authors'];?></kbd>
					<?php echo form_radio($inputs['show_post_authors_on']) .' '. form_label($label['yes'], 'show_post_authors_on');?>
					<?php echo form_radio($inputs['show_post_authors_off']) .' '. form_label($label['no'], 'show_post_authors_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_post_mission'];?></kbd>
					<?php echo form_radio($inputs['show_post_mission_on']) .' '. form_label($label['yes'], 'show_post_mission_on');?>
					<?php echo form_radio($inputs['show_post_mission_off']) .' '. form_label($label['no'], 'show_post_mission_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_stardate'];?></kbd>
					<?php echo form_radio($inputs['show_stardate_on']) .' '. form_label($label['yes'], 'show_stardate_on');?>
					<?php echo form_radio($inputs['show_stardate_off']) .' '. form_label($label['no'], 'show_stardate_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_custom'];?></kbd>
					<?php echo form_radio($inputs['show_custom_on']) .' '. form_label($label['yes'], 'show_custom_on');?>
					<?php echo form_radio($inputs['show_custom_off']) .' '. form_label($label['no'], 'show_custom_off');?>
				</p>
            </div>
            
			<p><?php echo form_button($button_submit);?></p>
		<?php echo form_close();?>
	</div>
	
	<div id="two">
		<?php echo form_open('site/status/1');?>
			<?php echo text_output($label['sim_status'], 'h2', 'page-subhead');?>
			
			<div class="indent-left">
				<p>
					<kbd><?php echo $label['location'];?></kbd>
					<?php echo form_input($inputs['location']);?>
				</p>
				<p>
					<kbd><?php echo $label['speed'];?></kbd>
					<?php echo form_input($inputs['speed']);?>
				</p>				
				<p>
					<kbd><?php echo $label['shields'];?></kbd>
					<?php echo form_input($inputs['shields']);?>
				</p>
				<p>
					<kbd><?php echo $label['hull'];?></kbd>
					<?php echo form_input($inputs['hull']);?>
				</p>
				<p>
					<kbd><?php echo $label['systems'];?></kbd>
					<?php echo form_input($inputs['systems']);?>
				</p>
			</div><br />
			
			<?php echo text_output($label['shield_status'], 'h2', 'page-subhead');?>
			
			<div class="indent-left">
				<p>
					<kbd><?php echo $label['shield_image_granular'];?></kbd>
					<?php echo form_radio($inputs['shield_image_granular_on']) .' '. form_label($label['yes'], 'shield_image_granular_on');?>
					<?php echo form_radio($inputs['shield_image_granular_off']) .' '. form_label($label['no'], 'shield_image_granular_off');?>
				</p><br />
                <?php if ($inputs['shield_image_granular_on']['checked']) { ?>
                <?php } else { ?>
                    <p>
                        <kbd><?php echo $label['shield_image'];?></kbd>
                        <?php echo form_dropdown('shield_image', $values['shield_image'], $default['shield_image']);?>
                    </p>
                <?php } ?>
			</div><br />
			
			<?php echo text_output($label['preferences'], 'h2', 'page-subhead');?>
			
			<div class="indent-left">
            	<p>
					<kbd><?php echo $label['show_shield_top_image'];?></kbd>
					<?php echo form_radio($inputs['show_shield_top_image_on']) .' '. form_label($label['yes'], 'show_shield_top_image_on');?>
					<?php echo form_radio($inputs['show_shield_top_image_off']) .' '. form_label($label['no'], 'show_shield_top_image_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_shield_side_image'];?></kbd>
					<?php echo form_radio($inputs['show_shield_side_image_on']) .' '. form_label($label['yes'], 'show_shield_side_image_on');?>
					<?php echo form_radio($inputs['show_shield_side_image_off']) .' '. form_label($label['no'], 'show_shield_side_image_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_location'];?></kbd>
					<?php echo form_radio($inputs['show_location_on']) .' '. form_label($label['yes'], 'show_location_on');?>
					<?php echo form_radio($inputs['show_location_off']) .' '. form_label($label['no'], 'show_location_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_speed'];?></kbd>
					<?php echo form_radio($inputs['show_speed_on']) .' '. form_label($label['yes'], 'show_speed_on');?>
					<?php echo form_radio($inputs['show_speed_off']) .' '. form_label($label['no'], 'show_speed_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_shields'];?></kbd>
					<?php echo form_radio($inputs['show_shields_on']) .' '. form_label($label['yes'], 'show_shields_on');?>
					<?php echo form_radio($inputs['show_shields_off']) .' '. form_label($label['no'], 'show_shields_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_hull'];?></kbd>
					<?php echo form_radio($inputs['show_hull_on']) .' '. form_label($label['yes'], 'show_hull_on');?>
					<?php echo form_radio($inputs['show_hull_off']) .' '. form_label($label['no'], 'show_hull_off');?>
				</p>
				<p>
					<kbd><?php echo $label['show_systems'];?></kbd>
					<?php echo form_radio($inputs['show_systems_on']) .' '. form_label($label['yes'], 'show_systems_on');?>
					<?php echo form_radio($inputs['show_systems_off']) .' '. form_label($label['no'], 'show_systems_off');?>
				</p>
            </div>
			
			<br />
			<p><?php echo form_button($button_submit);?></p>
		<?php echo form_close();?>
	</div>
</div>