<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/controllers/nova_site.php';

class Site extends Nova_site {

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Put your own methods below this...
	 */
	public function status()
	{
		Auth::check_access();
		
		// we need to create the necessary database tables if they don't already exist
		$add_tables = array(
			'status_fields' => array(
				'id' => 'status_id',
				'fields' => 'fields_status_fields'),
			'status_prefs' => array(
				'id' => 'prefs_id',
				'fields' => 'fields_status_prefs'),
		);
		
		$fields_status_fields = array(
			'status_id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'auto_increment' => TRUE),
			'status_key' => array(
				'type' => 'VARCHAR',
				'constraint' => 100),
			'status_value' => array(
				'type' => 'TEXT',
				'null' => TRUE),
			'status_label' => array(
				'type' => 'VARCHAR',
				'constraint' => 255),
			'status_type' => array(
				'type' => 'VARCHAR',
				'constraint' => 100)
		);
		
		$fields_status_prefs = array(
			'prefs_id' => array(
				'type' => 'INT',
				'constraint' => 5,
				'auto_increment' => TRUE),
			'prefs_key' => array(
				'type' => 'VARCHAR',
				'constraint' => 100),
			'prefs_value' => array(
				'type' => 'BOOLEAN'),
			'prefs_label' => array(
				'type' => 'VARCHAR',
				'constraint' => 255),
			'prefs_type' => array(
				'type' => 'VARCHAR',
				'constraint' => 100)
		);
		
		if ($add_tables !== null)
		{
			foreach ($add_tables as $key => $value)
			{
				$this->dbforge->add_field($$value['fields']);
				$this->dbforge->add_key($value['id'], true);
				$this->dbforge->create_table($key, true); // setting true here defines the 'IF NOT EXISTS' part of the 'CREATE TABLE' query
			}
		}
		
		// now let's check if the tables are populated
		$fields_rows = $this->db->count_all('status_fields');
		$prefs_rows = $this->db->count_all('status_prefs');
		
		if (($fields_rows < 1) || ($prefs_rows < 1))
		{ // If the tables aren't populated, fill them
			// now we need to populate the tables
			
			$data = array(
				'status_fields',
				'status_prefs'
			);
			
			$status_fields = array(
				array(
					'status_key' => 'alert',
					'status_value' => 'green',
					'status_label' => 'Alert Status',
					'status_type' => 'mission'
				),
				array(
					'status_key' => 'stardate',
					'status_value' => NULL,
					'status_label' => 'Stardate',
					'status_type' => 'mission'
				),
				array(
					'status_key' => 'mission',
					'status_value' => NULL,
					'status_label' => 'Restrict to Mission',
					'status_type' => 'mission'
				),
				array(
					'status_key' => 'post',
					'status_value' => NULL,
					'status_label' => 'Override Post Selection',
					'status_type' => 'mission'
				),
				array(
					'status_key' => 'custom',
					'status_value' => NULL,
					'status_label' => 'Custom Text',
					'status_type' => 'mission'
				),
				array(
					'status_key' => 'shield_image',
					'status_value' => 'off',
					'status_label' => 'Shield Status',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'ventral',
					'status_value' => '100',
					'status_label' => 'Ventral Shields Health',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'dorsal',
					'status_value' => '100',
					'status_label' => 'Dorsal Shields Health',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'port',
					'status_value' => '100',
					'status_label' => 'Port Shields Health',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'starboard',
					'status_value' => '100',
					'status_label' => 'Starboard Shields Health',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'fore',
					'status_value' => '100',
					'status_label' => 'Fore Shields Health',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'aft',
					'status_value' => '100',
					'status_label' => 'Aft Shields Health',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'location',
					'status_value' => NULL,
					'status_label' => 'Current Location',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'speed',
					'status_value' => NULL,
					'status_label' => 'Current Speed',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'shields',
					'status_value' => NULL,
					'status_label' => 'Current Shield Status',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'hull',
					'status_value' => NULL,
					'status_label' => 'Current Hull Status',
					'status_type' => 'ship'
				),
				array(
					'status_key' => 'systems',
					'status_value' => NULL,
					'status_label' => 'Current Systems Status',
					'status_type' => 'ship'
				)
			);
			$status_prefs = array(
				array(
					'prefs_key' => 'show_alertbar',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Alert Bar',
					'prefs_type' => 'mission'
				),
				array(
					'prefs_key' => 'show_post_title',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Post Title',
					'prefs_type' => 'mission'
				),
				array(
					'prefs_key' => 'show_post_timeline',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Post Timeline',
					'prefs_type' => 'mission'
				),
				array(
					'prefs_key' => 'show_post_date',
					'prefs_value' => FALSE,
					'prefs_label' => 'Show Posted Date',
					'prefs_type' => 'mission'
				),
				array(
					'prefs_key' => 'show_post_authors',
					'prefs_value' => FALSE,
					'prefs_label' => 'Show Post Authors',
					'prefs_type' => 'mission'
				),
				array(
					'prefs_key' => 'show_post_mission',
					'prefs_value' => FALSE,
					'prefs_label' => 'Show Post Mission',
					'prefs_type' => 'mission'
				),
				array(
					'prefs_key' => 'show_stardate',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Stardate',
					'prefs_type' => 'mission'
				),
				array(
					'prefs_key' => 'show_custom',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Custom Text',
					'prefs_type' => 'mission'
				),
				array(
					'prefs_key' => 'shield_image_granular',
					'prefs_value' => TRUE,
					'prefs_label' => 'Use Granular Shield Status',
					'prefs_type' => 'ship'
				),
				array(
					'prefs_key' => 'show_shield_top_image',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Top-Down Ship Image',
					'prefs_type' => 'ship'
				),
				array(
					'prefs_key' => 'show_shield_side_image',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Side-On Ship Image',
					'prefs_type' => 'ship'
				),
				array(
					'prefs_key' => 'show_location',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Location',
					'prefs_type' => 'ship'
				),
				array(
					'prefs_key' => 'show_speed',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Speed',
					'prefs_type' => 'ship'
				),
				array(
					'prefs_key' => 'show_shields',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Shield Status',
					'prefs_type' => 'ship'
				),
				array(
					'prefs_key' => 'show_hull',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Hull Status',
					'prefs_type' => 'ship'
				),
				array(
					'prefs_key' => 'show_systems',
					'prefs_value' => TRUE,
					'prefs_label' => 'Show Systems Status',
					'prefs_type' => 'ship'
				),
			);
			
			$insert = array();
			
			foreach ($data as $value)
			{
				foreach ($$value as $k => $v)
				{
					$insert[] = $this->db->insert($value, $v);
				}
			}
		}
		
		// Let's run the process of submitting the form
		
		if (isset($_POST['submit']))
		{
			$key_exceptions = array('submit');
			$key_prefs = array('show_alertbar','show_post_title','show_post_timeline','show_post_date','show_post_authors','show_post_mission','show_stardate','show_custom','shield_image_granular','show_shield_top_image','show_shield_side_image','show_location','show_speed','show_shields','show_hull','show_systems');
			
			foreach ($_POST as $key => $value)
			{
				if ( ! in_array($key, $key_exceptions))
				{
					if ( ! in_array($key, $key_prefs))
					{
						$update_array['status_value'] = $this->security->xss_clean($value);
						
						$update = $this->status_model->update_status($key, $update_array);
					} else {
						$update_prefs_array['prefs_value'] = $this->security->xss_clean($value);
						
						$update = $this->status_model->update_prefs($key, $update_prefs_array);
					}
				}
			}
			
			if ($update > 0)
			{				
				$message = sprintf(
					lang('flash_success_plural'),
					ucfirst(lang('labels_status') .' '. lang('labels_settings')),
					lang('actions_updated'),
					''
				);
				
				$flash['status'] = 'success';
				$flash['message'] = text_output($message);
			}
			else
			{
				$message = sprintf(
					lang('flash_failure_plural'),
					ucfirst(lang('labels_status') .' '. lang('labels_settings')),
					lang('actions_updated'),
					''
				);
				
				$flash['status'] = 'error';
				$flash['message'] = text_output($message);
			}
			
			// set the flash message
			$this->_regions['flash_message'] = Location::view('flash', $this->skin, 'admin', $flash);
		}
		
		// grab all status fields
		$s = $this->status_model->get_all_status_fields();
		
		if ($s->num_rows() > 0)
		{
			foreach ($s->result() as $value)
			{
				$status[$value->status_key] = $value->status_value;
			}
		}
			
			$data['button_submit'] = array(
				'type' => 'submit',
				'class' => 'button-main',
				'name' => 'submit',
				'value' => 'submit',
				'content' => ucwords(lang('actions_submit'))
			);
			
			$data['images'] = array(
				'help' => array(
					'src' => Location::img('help.png', $this->skin, 'admin'),
					'alt' => lang('whats_this')),
				'gear' => array(
					'src' => Location::img('gear.png', $this->skin, 'admin'),
					'alt' => '',
					'class' => 'image inline_img_left'),
				'view' => array(
					'src' => Location::img('icon-view.png', $this->skin, 'admin'),
					'alt' => '',
					'class' => 'image'),
				'loading' => array(
					'src' => Location::img('loading-circle.gif', $this->skin, 'admin'),
					'alt' => lang('actions_loading'),
					'class' => 'image'),
			);
			
		
		// grab all status preferences
		$p = $this->status_model->get_all_status_prefs();
		
		if ($p->num_rows() > 0)
		{
			foreach ($p->result() as $value)
			{
				$prefs[$value->prefs_key] = $value->prefs_value;
			}
		}
			
			$data['button_submit'] = array(
				'type' => 'submit',
				'class' => 'button-main',
				'name' => 'submit',
				'value' => 'submit',
				'content' => ucwords(lang('actions_submit'))
			);
			
			$data['images'] = array(
				'help' => array(
					'src' => Location::img('help.png', $this->skin, 'admin'),
					'alt' => lang('whats_this')),
				'gear' => array(
					'src' => Location::img('gear.png', $this->skin, 'admin'),
					'alt' => '',
					'class' => 'image inline_img_left'),
				'view' => array(
					'src' => Location::img('icon-view.png', $this->skin, 'admin'),
					'alt' => '',
					'class' => 'image'),
				'loading' => array(
					'src' => Location::img('loading-circle.gif', $this->skin, 'admin'),
					'alt' => lang('actions_loading'),
					'class' => 'image'),
			);
			
			/*
			|---------------------------------------------------------------
			| MISSION
			|---------------------------------------------------------------
			*/
			
			$data['inputs'] = array(
				'stardate' => array(
					'name' => 'stardate',
					'id' => 'stardate',
					'class' => 'medium',
					'value' => $status['stardate']),
				'post' => array(
					'name' => 'post',
					'id' => 'post',
					'class' => 'small',
					'value' => $status['post']),
				'custom' => array(
					'name' => 'custom',
					'id' => 'custom',
					'value' => $status['custom']),
				'show_alertbar_on' => array(
					'name' => 'show_alertbar',
					'id' => 'show_alertbar_on',
					'value' => true,
					'checked' => $prefs['show_alertbar']),
				'show_alertbar_off' => array(
					'name' => 'show_alertbar',
					'id' => 'show_alertbar_off',
					'value' => false,
					'checked' => ($prefs['show_alertbar'] == false) ? true : false),
				'show_post_title_on' => array(
					'name' => 'show_post_title',
					'id' => 'show_post_title_on',
					'value' => true,
					'checked' => $prefs['show_post_title']),
				'show_post_title_off' => array(
					'name' => 'show_post_title',
					'id' => 'show_post_title_off',
					'value' => false,
					'checked' => ($prefs['show_post_title'] == false) ? true : false),
				'show_post_timeline_on' => array(
					'name' => 'show_post_timeline',
					'id' => 'show_post_timeline_on',
					'value' => true,
					'checked' => $prefs['show_post_timeline']),
				'show_post_timeline_off' => array(
					'name' => 'show_post_timeline',
					'id' => 'show_post_timeline_off',
					'value' => false,
					'checked' => ($prefs['show_post_timeline'] == false) ? true : false),
				'show_post_date_on' => array(
					'name' => 'show_post_date',
					'id' => 'show_post_date_on',
					'value' => true,
					'checked' => $prefs['show_post_date']),
				'show_post_date_off' => array(
					'name' => 'show_post_date',
					'id' => 'show_post_date_off',
					'value' => false,
					'checked' => ($prefs['show_post_date'] == false) ? true : false),
				'show_post_authors_on' => array(
					'name' => 'show_post_authors',
					'id' => 'show_post_authors_on',
					'value' => true,
					'checked' => $prefs['show_post_authors']),
				'show_post_authors_off' => array(
					'name' => 'show_post_authors',
					'id' => 'show_post_authors_off',
					'value' => false,
					'checked' => ($prefs['show_post_authors'] == false) ? true : false),
				'show_post_mission_on' => array(
					'name' => 'show_post_mission',
					'id' => 'show_post_mission_on',
					'value' => true,
					'checked' => $prefs['show_post_mission']),
				'show_post_mission_off' => array(
					'name' => 'show_post_mission',
					'id' => 'show_post_mission_off',
					'value' => false,
					'checked' => ($prefs['show_post_mission'] == false) ? true : false),
				'show_stardate_on' => array(
					'name' => 'show_stardate',
					'id' => 'show_stardate_on',
					'value' => true,
					'checked' => $prefs['show_stardate']),
				'show_stardate_off' => array(
					'name' => 'show_stardate',
					'id' => 'show_stardate_off',
					'value' => false,
					'checked' => ($prefs['show_stardate'] == false) ? true : false),
				'show_custom_on' => array(
					'name' => 'show_custom',
					'id' => 'show_custom_on',
					'value' => true,
					'checked' => $prefs['show_custom']),
				'show_custom_off' => array(
					'name' => 'show_custom',
					'id' => 'show_custom_off',
					'value' => false,
					'checked' => ($prefs['show_custom'] == false) ? true : false),
			);
			
			$data['values']['alert'] = array(
					'red' => ucwords('red'),
					'yellow' => ucwords('yellow'),
					'green' => ucwords('green'),
					'blue' => ucwords('blue')
			);
			
			// let's get the list of missions
			$this->load->model('missions_model', 'mis');
			$missions = $this->mis->get_all_missions('current');
			
			if ($missions->num_rows() > 0)
			{	
				foreach ($missions->result() as $mission)
				{
					$data['missions'][$mission->mission_id] = $mission->mission_title;
				}
			}
			else
			{
				$data['missions'] = false;
			}
			
			$data['values']['mission'] = array(
				0 => ucwords(lang('labels_no') .' '. ucfirst(lang('global_mission')))
			);
			
			if ($data['missions'])
			{
				foreach($data['missions'] as $key => $value)
				{
					$data['values']['mission'][$key] = $value;
				}
			}
			
			$data['default']['alert'] = $status['alert'];
			$data['default']['mission'] = $status['mission'];
			
			/*
			|---------------------------------------------------------------
			| SIM
			|---------------------------------------------------------------
			*/
			
			$data['inputs'] += array(
				'location' => array(
					'name' => 'location',
					'id' => 'location',
					'value' => $status['location']),
				'speed' => array(
					'name' => 'speed',
					'id' => 'speed',
					'value' => $status['speed']),
				'shields' => array(
					'name' => 'shields',
					'id' => 'shields',
					'value' => $status['shields']),
				'hull' => array(
					'name' => 'hull',
					'id' => 'hull',
					'value' => $status['hull']),
				'systems' => array(
					'name' => 'systems',
					'id' => 'systems',
					'value' => $status['systems']),
				'shield_image_granular_on' => array(
					'name' => 'shield_image_granular',
					'id' => 'shield_image_granular_on',
					'value' => true,
					'checked' => $prefs['shield_image_granular']),
				'shield_image_granular_off' => array(
					'name' => 'shield_image_granular',
					'id' => 'shield_image_granular_off',
					'value' => false,
					'checked' => ($prefs['shield_image_granular'] == false) ? true : false),
				'show_shield_top_image_on' => array(
					'name' => 'show_shield_top_image',
					'id' => 'show_shield_top_image_on',
					'value' => true,
					'checked' => $prefs['show_shield_top_image']),
				'show_shield_top_image_off' => array(
					'name' => 'show_shield_top_image',
					'id' => 'show_shield_top_image_off',
					'value' => false,
					'checked' => ($prefs['show_shield_top_image'] == false) ? true : false),
				'show_shield_side_image_on' => array(
					'name' => 'show_shield_side_image',
					'id' => 'show_shield_side_image_on',
					'value' => true,
					'checked' => $prefs['show_shield_side_image']),
				'show_shield_side_image_off' => array(
					'name' => 'show_shield_side_image',
					'id' => 'show_shield_side_image_off',
					'value' => false,
					'checked' => ($prefs['show_shield_side_image'] == false) ? true : false),
				'show_location_on' => array(
					'name' => 'show_location',
					'id' => 'show_location_on',
					'value' => true,
					'checked' => $prefs['show_location']),
				'show_location_off' => array(
					'name' => 'show_location',
					'id' => 'show_location_off',
					'value' => false,
					'checked' => ($prefs['show_location'] == false) ? true : false),
				'show_speed_on' => array(
					'name' => 'show_speed',
					'id' => 'show_speed_on',
					'value' => true,
					'checked' => $prefs['show_speed']),
				'show_speed_off' => array(
					'name' => 'show_speed',
					'id' => 'show_speed_off',
					'value' => false,
					'checked' => ($prefs['show_speed'] == false) ? true : false),
				'show_shields_on' => array(
					'name' => 'show_shields',
					'id' => 'show_shields_on',
					'value' => true,
					'checked' => $prefs['show_shields']),
				'show_shields_off' => array(
					'name' => 'show_shields',
					'id' => 'show_shields_off',
					'value' => false,
					'checked' => ($prefs['show_shields'] == false) ? true : false),
				'show_hull_on' => array(
					'name' => 'show_hull',
					'id' => 'show_hull_on',
					'value' => true,
					'checked' => $prefs['show_hull']),
				'show_hull_off' => array(
					'name' => 'show_hull',
					'id' => 'show_hull_off',
					'value' => false,
					'checked' => ($prefs['show_hull'] == false) ? true : false),
				'show_systems_on' => array(
					'name' => 'show_systems',
					'id' => 'show_systems_on',
					'value' => true,
					'checked' => $prefs['show_systems']),
				'show_systems_off' => array(
					'name' => 'show_systems',
					'id' => 'show_systems_off',
					'value' => false,
					'checked' => ($prefs['show_systems'] == false) ? true : false),
			);
			$data['values']['shield_image'] = array(
					'off' => ucwords('inactive'),
					'up' => ucwords('active'),
					'dam' => ucwords('damaged'),
					'offline' => ucwords('offline')
			);
			$data['default']['shield_image'] = $status['shield_image'];
			
			$data['shields']['ventral'] = $status['ventral'];
			$data['shields']['dorsal'] = $status['dorsal'];
			$data['shields']['port'] = $status['port'];
			$data['shields']['starboard'] = $status['starboard'];
			$data['shields']['fore'] = $status['fore'];
			$data['shields']['aft'] = $status['aft'];
				
		
		$data['header'] = ucwords(lang('global_sim') .' '. lang('labels_status'));
		
		// grab all status field labels
		$s = $this->status_model->get_all_status_fields();
		
		if ($s->num_rows() > 0)
		{
			foreach ($s->result() as $value)
			{
				$status_label[$value->status_key] = $value->status_label;
			}
		}
		
		// grab all status preferences labels
		$p = $this->status_model->get_all_status_prefs();
		
		if ($p->num_rows() > 0)
		{
			foreach ($p->result() as $value)
			{
				$prefs_label[$value->prefs_key] = $value->prefs_label;
			}
		}
		
		$data['label'] = array(
			'sim_status' => ucwords(lang('global_sim') .' '. ucfirst(lang('labels_status'))),
			'mission_status' => ucwords(lang('global_mission') .' '. ucfirst(lang('labels_status'))),
			'header_mission' => ucwords(lang('global_mission') .' '. ucfirst(lang('labels_status'))),
			'header_sim' => ucwords(lang('global_sim') .' '. ucfirst(lang('labels_status'))),
			'alert' => $status_label['alert'],
			'mission' => $status_label['mission'],
			'post' => $status_label['post'],
			'stardate' => $status_label['stardate'],
			'custom' => $status_label['custom'],
			'preferences' => ucwords(lang('labels_preferences')),
			'show_alertbar' => $prefs_label['show_alertbar'],
			'show_post_title' => $prefs_label['show_post_title'],
			'show_post_timeline' => $prefs_label['show_post_timeline'],
			'show_post_date' => $prefs_label['show_post_date'],
			'show_post_authors' => $prefs_label['show_post_authors'],
			'show_post_mission' => $prefs_label['show_post_mission'],
			'show_stardate' => $prefs_label['show_stardate'],
			'show_custom' => $prefs_label['show_custom'],
			'no' => ucfirst(lang('labels_no')),
			'yes' => ucfirst(lang('labels_yes')),
			'location' => $status_label['location'],
			'speed' => $status_label['speed'],
			'shields' => $status_label['shields'],
			'hull' => $status_label['hull'],
			'systems' => $status_label['systems'],
			'shield_image' => $status_label['shield_image'],
			'ventral' => $status_label['ventral'],
			'dorsal' => $status_label['dorsal'],
			'port' => $status_label['port'],
			'starboard' => $status_label['starboard'],
			'fore' => $status_label['fore'],
			'aft' => $status_label['aft'],
			'shield_image_granular' => $prefs_label['shield_image_granular'],
			'show_shield_top_image' => $prefs_label['show_shield_top_image'],
			'show_shield_side_image' => $prefs_label['show_shield_side_image'],
			'show_location' => $prefs_label['show_location'],
			'show_speed' => $prefs_label['show_speed'],
			'show_shields' => $prefs_label['show_shields'],
			'show_hull' => $prefs_label['show_hull'],
			'show_systems' => $prefs_label['show_systems'],
			'shield_status' => ucwords('shield' .' '. ucfirst(lang('labels_status'))),
		);
		
		// set the js data
		$js_data['tab'] = $this->uri->segment(3, 0, true);
		
		$this->_regions['content'] = Location::view('site_status', $this->skin, 'admin', $data);
		$this->_regions['javascript'] = Location::js('site_status_js', $this->skin, 'admin', $js_data);
		$this->_regions['title'].= $data['header'];
		
		Template::assign($this->_regions);
		
		Template::render();
	}
}
