<?php
// Let's get the field data for the mission status
	$mission_fields = $this->status_model->get_status_fields('mission');
	extract($mission_fields);
	
// Let's get the prefs data for the ship status
	$mission_prefs = $this->status_model->get_status_prefs('mission');
	extract($mission_prefs);

//Let's get the latest mission post
	// load the missions and posts models
	$this->load->model('missions_model', 'mis');
	$this->load->model('posts_model', 'posts');

	// load the text helper
	$this->load->helper('text');
	
	// check to see if the post we're using is being overridden
	if ( $post == false)
	{
		// check to see if we're looking only at a set mission
		if ( $mission !== false || $mission > 0 )
		{ //fetch the last post of that mission
			$posts = $this->posts_model->get_post_list($mission, 'desc', 1, 0, 'activated');
		} else {
		// fetch the last post
			$posts = $this->posts_model->get_post_list('', 'desc', 1, 0, 'activated');
		}

		if ($posts->num_rows() > 0)
		{
			$datestring = $this->options['date_format'];
	
			foreach ($posts->result() as $row)
			{
				$date = gmt_to_local($row->post_date, $this->timezone, $this->dst);
	
				$item['id'] = $row->post_id;
				$item['title'] = $row->post_title;
				$item['timeline'] = $row->post_timeline;
				$item['date'] = mdate($datestring, $date);
				$item['authors'] = $this->char->get_authors($row->post_authors, true, true);
				$item['mission'] = anchor('sim/missions/id/'.$row->post_mission, $this->missions_model->get_mission($row->post_mission, 'mission_title'), 'class="page-subhead"');
			}
		}
	} else {
		// fetch the details of the post
		$posts = $this->posts_model->get_post($post);
		
		if($posts !== NULL)
		{
			$datestring = $this->options['date_format'];
	
			$date = gmt_to_local($posts->post_date, $this->timezone, $this->dst);
	
			$item['id'] = $posts->post_id;
			$item['title'] = $posts->post_title;
			$item['timeline'] = $posts->post_timeline;
			$item['date'] = mdate($datestring, $date);
			$item['authors'] = $this->char->get_authors($posts->post_authors, true, true);
			$item['mission'] = anchor('sim/missions/id/'.$posts->post_mission, $this->missions_model->get_mission($posts->post_mission, 'mission_title'), 'class="page-subhead"');
		}
	}

/* Set a posted by label */
$label['posted_by'] = ucfirst(lang('actions_posted')) .' '. lang('labels_by');

/* Set some style information */
?>
<style>
.mission-status {
	text-align: center;
}
.alert-bar {
	border: none;
}
</style>
<?php
/* Now display all the info we have gathered, but only if they are selected to be visible and are not empty */
	
echo '<div class="mission-status page-subhead">';

if ($show_alertbar && $alert)
{
	echo '<img src="' . base_url() . 'application/assets/images/alerts/alertbar' . $alert . '.gif" class="alert-bar"><br />';
}
if ($show_post_title && $item['title'])
{
	echo anchor('sim/viewpost/' . $item['id'], $item['title'], 'class="page-subhead"') . '<br />';
}
if ($show_post_mission && $item['mission'])
{
	echo $item['mission'] . '<br />';
}
if ($show_post_date && $item['date'])
{
	echo $label['posted'] . ' ' . $item['date'];
	if ($show_post_authors && $item['authors'])
	{
		echo ' ' . $label['by'] . ' ' . $item['authors'];
	}
	echo '<br />';
}
if ($show_post_authors && $item['authors'])
{
	if ($show_post_date && $item['date'])
	{ //Do nothing
	} else {
		echo $label['posted_by'] . ' ' . $item['authors'] . '<br />';
	}
}
if ($show_stardate && $stardate)
{
	echo 'Stardate ' . $stardate . '<br />';
}
if ($show_post_timeline && $item['timeline'])
{
	echo $item['timeline'] . '<br />';
}
if ($show_custom && $custom)
{
	echo $custom;
}

echo '</div>';
?>