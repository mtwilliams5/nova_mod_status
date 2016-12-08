<?php
// Let's create some phantom variables to play about with for now
	$alert = 'green';
	$stardate = '68133.2';
	$mission = '1';
	$custom = 'MD30';
	
// these phantom variables are to control what data is shown in the front view
	$show_alertbar = true;
	$show_post_title = true;
	$show_post_timeline = true;
	$show_post_date = false;
	$show_post_authors = false;
	$show_post_mission = false;
	$show_stardate = true;
	$show_custom = false;

//Let's get the latest mission post
	// load the missions and posts models
	$this->load->model('missions_model', 'mis');
	$this->load->model('posts_model', 'posts');

	// load the text helper
	$this->load->helper('text');
	
	// check to see if we're looking only at a set mission
	if ( $mission !== false )
	{ //fetch the last post of that mission
		$posts = $this->posts->get_post_list($mission, 'desc', 1, 0, 'activated');
	} else {
	// fetch the last post
		$posts = $this->posts->get_post_list('', 'desc', 1, 0, 'activated');
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
				$item['mission'] = anchor('sim/missions/id/'.$row->post_mission, $this->mis->get_mission($row->post_mission, 'mission_title'), 'class="page-subhead"');
			}
		}


/* Set some place-holder style information */
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
		echo 'Posted ' . $label['by'] . ' ' . $item['authors'] . '<br />';
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