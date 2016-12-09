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
			</div>
			
			<br />
            
			<?php echo text_output($label['preferences'], 'h2', 'page-subhead');?>
            
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
            
			<p><?php echo form_button($button_submit);?></p>
		<?php echo form_close();?>
	</div>
	
	<div id="two">
		<?php #echo form_open('site/settings/1');?>
			<?php #echo text_output($label['header_system'], 'h2', 'page-subhead');?>
			
			<!--<div class="indent-left">
				<p>
					<kbd><?php #echo $label['maint'];?></kbd>
					<?php #echo form_radio($inputs['maintenance_on']) .' '. form_label($label['on'], 'maintenance_on');?>
					<?php #echo form_radio($inputs['maintenance_off']) .' '. form_label($label['off'], 'maintenance_off');?>
				</p>
				<p>
					<kbd><?php #echo $label['updates'];?></kbd>
					<?php #echo form_dropdown('updates', $values['updates'], $default['updates']);?>
				</p><br />
				
				<p>
					<kbd><?php #echo $label['date'];?></kbd>
					<p><?php #echo $label['date_format'];?></p>
					<?php #echo form_dropdown('formats', $values['date_format'], $default['date_format'], 'id="formats"');?>
					&nbsp;&nbsp;
					<?php #echo form_input($inputs['date_format']);?><br />
					<p class="fontSmall">
						<strong><?php #echo $label['sample_output'];?></strong>:
						<span id="format_output"><?php #echo mdate($inputs['date_format']['value'], now());?></span>
					</p>
				</p>
				<p>
					<kbd><?php #echo $label['timezone'];?></kbd>
					<?php #echo timezone_menu($default['timezone'], '', 'timezone');?>
				</p>
				<p>
					<kbd><?php #echo $label['dst'];?></kbd>
					<?php #echo form_radio($inputs['dst_y']) .' '. form_label($label['yes'], 'dst_y');?>
					<?php #echo form_radio($inputs['dst_n']) .' '. form_label($label['no'], 'dst_n');?>
				</p><br />
				
				<p>
					<kbd><?php #echo $label['allowed_chars'];?></kbd>
					<?php #echo form_input($inputs['allowed_playing_chars']);?>
				</p>
				<p>
					<kbd><?php #echo $label['allowed_npcs'];?></kbd>
					<?php #echo form_input($inputs['allowed_npcs']);?>
				</p><br />
				
				<p>
					<kbd>
						<?php #echo $label['online'];?>&nbsp;
						<a href="#" rel="tooltip" class="fontTiny image" title="<?php #echo $label['tt_online_timespan'];?>"><?php #echo img($images['help']);?></a>
					</kbd>
					<?php #echo form_input($inputs['online_timespan']);?>
					<span class="gray"><?php #echo $label['minutes'];?>
				</p>
				<p>
					<kbd>
						<?php #echo $label['requirement'];?>&nbsp;
						<a href="#" rel="tooltip" class="fontTiny image" title="<?php #echo $label['tt_posting_requirement'];?>"><?php #echo img($images['help']);?></a>
					</kbd>
					<?php #echo form_input($inputs['posting_req']);?>
					<span class="gray"><?php #echo $label['days'];?>
				</p>
				<p>
					<kbd>
						<?php #echo $label['posts_participants'];?>&nbsp;
						<a href="#" rel="tooltip" class="fontTiny image" title="<?php #echo $label['tt_posting_participants'];?>"><?php #echo img($images['help']);?></a>
					</kbd>
					<?php #echo form_radio($inputs['participants_y']) .' '. form_label($label['yes'], 'participants_y');?>
					<?php #echo form_radio($inputs['participants_n']) .' '. form_label($label['no'], 'participants_n');?>
				</p>
			</div><br />
			
			<?php #cho text_output($label['header_email'], 'h2', 'page-subhead');?>
			
			<div class="indent-left">
				<p>
					<kbd><?php #echo $label['sysemail'];?></kbd>
					<?php #echo form_radio($inputs['sys_email_on']) .' '. form_label($label['on'], 'sys_email_on');?>
					<?php #echo form_radio($inputs['sys_email_off']) .' '. form_label($label['off'], 'sys_email_off');?>
				</p>
				<p>
					<kbd><?php #echo $label['emailsubject'];?></kbd>
					<?php #echo form_input($inputs['email_subject']);?>
				</p>
				<p>
					<kbd><?php #echo $label['emailname'];?></kbd>
					<?php #echo form_input($inputs['email_name']);?>
				</p>
				<p>
					<kbd><?php #echo $label['emailaddress'];?></kbd>
					<?php #echo form_input($inputs['email_address']);?>
				</p>
			</div>
			
			<br />
			<p><?php #echo form_button($button_submit);?></p>-->
		<?php #echo form_close();?>
	</div>
</div>