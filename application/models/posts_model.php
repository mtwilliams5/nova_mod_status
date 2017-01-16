<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once MODPATH.'core/models/nova_posts_model.php';

class Posts_model extends Nova_posts_model {

	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Put your own methods below this...
	 */
	
	public function get_excluded_post_list($exclude = '', $order = 'desc', $limit = 0, $offset = 0, $status = '')
	{
		$this->db->from('posts');
		
		if ( ! empty($exclude))
		{
			$this->db->where('post_mission <>', $exclude);
		}
		
		if ( ! empty($status))
		{
			$this->db->where('post_status', $status);
		}
		
		$this->db->order_by('post_date', $order);
		
		if ( ! empty($limit))
		{
			$this->db->limit($limit, $offset);
		}
		
		$query = $this->db->get();
		
		return $query;
	}
}
