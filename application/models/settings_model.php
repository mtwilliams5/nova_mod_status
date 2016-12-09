<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/models/nova_settings_model.php';

class Settings_model extends Nova_settings_model {

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Put your own methods below this...
	 */
	
	public function get_all_status_fields($type = '')
	{
		$this->db->from('status_fields');
		if ( !empty($type) )
		{
			$this->db->where('status_type', $type);
		}
		
		$query = $this->db->get();
		
		return $query;
	}
	
	public function get_all_status_prefs($type = '')
	{
		$this->db->from('status_prefs');
		if ( !empty($type) )
		{
			$this->db->where('prefs_type', $type);
		}
		
		$query = $this->db->get();
		
		return $query;
	}
	
	public function get_setting($value = '')
	{
		$query = $this->db->get_where('settings', array('setting_key' => $value));
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			
			return $row->setting_value;
		}
		
		return false;
	}
	
	public function get_setting_details($value = '', $identifier = 'setting_key')
	{
		$query = $this->db->get_where('settings', array($identifier => $value));
		
		return $query;
	}
	
	public function get_setting_label($value = '', $identifier = 'setting_key')
	{
		$query = $this->db->get_where('settings', array($identifier => $value));
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			
			return $row->setting_label;
		}
		
		return false;
	}
	
	public function get_settings($value = '')
	{
		$array = false;
		
		if (is_array($value))
		{
			$select = $value;
		}
		else
		{
			$select[] = $value;
		}
		
		$query = $this->db->get('settings');
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $item)
			{
				if (in_array($item->setting_key, $select))
				{
					$array[$item->setting_key] = $item->setting_value;
				}
			}
		}
		
		return $array;
	}
	
	public function get_status_field($field = 0, $type = '', $value_only = false)
	{
		if ( ! is_numeric($field))
		{
			$q = $this->db->get_where('status_fields', array('status_key' => $field));
			$r = ($q->num_rows() > 0) ? $q->row() : false;

			$field = ($r !== false) ? $r->status_id : false;
		}

		$this->db->from('status_fields');
		$this->db->where('status_id', $field);
		
		if ( ! empty($type))
		{
			$this->db->where('status_type', $type);
		}
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();

			if ($value_only)
			{
				return $row->status_value;
			}

			return $row;
		}
		
		return false;
	}
	
	public function get_status_fields($type = '')
	{
		$this->db->from('status_fields');
		if ( ! empty($type))
		{
			$this->db->where('status_type', $type);
		}
		
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
			$fields[$row->status_key]=$row->status_value;
		}
		
		return $fields;
	}
	
	public function get_status_pref($pref = 0, $type = '', $value_only = false)
	{
		if ( ! is_numeric($pref))
		{
			$q = $this->db->get_where('status_prefs', array('prefs_key' => $pref));
			$r = ($q->num_rows() > 0) ? $q->row() : false;

			$pref = ($r !== false) ? $r->prefs_id : false;
		}

		$this->db->from('status_prefs');
		$this->db->where('prefs_id', $pref);
		
		if ( ! empty($type))
		{
			$this->db->where('prefs_type', $type);
		}
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();

			if ($value_only)
			{
				return $row->prefs_value;
			}

			return $row;
		}
		
		return false;
	}
	
	public function get_status_prefs($type = '')
	{
		$this->db->from('status_prefs');
		if ( ! empty($type))
		{
			$this->db->where('prefs_type', $type);
		}
		
		$this->db->order_by('prefs_id', 'asc');
		
		$query = $this->db->get();
		
		foreach ($query->result() as $row)
		{
			$prefs[$row->prefs_key]=$row->prefs_value;
		}
		
		return $prefs;
	}
	
	
	public function get_sim_type($id = 2)
	{
		$this->db->from('sim_type');
		$this->db->where('simtype_id', $id);
		
		$query = $this->db->get();
		
		$row = $query->row();
		
		return $row->simtype_name;
	}
}
