<?php
// Let's get the type of sim it is
	$simtype = $this->status_model->get_sim_type();
	
// Let's get the field data for the ship status
	$ship_fields = $this->status_model->get_status_fields('ship');
	extract($ship_fields);
	
// Let's get the prefs data for the ship status
	$ship_prefs = $this->status_model->get_status_prefs('ship');
	extract($ship_prefs);

/* Set the colors for the granular shield borders */
	  $p0 = '#c86265';
	 $p10 = '#cc715e';
	 $p20 = '#d38952';
	 $p25 = '#d7964b';
	 $p30 = '#daa246';
	 $p40 = '#dbb841';
	 $p50 = '#dbc541';
	 $p60 = '#d0c552';
	 $p70 = '#bebc6e';
	 $p75 = '#b3b67e';
	 $p80 = '#a8ae8f';
	 $p90 = '#95a1ad';
	$p100 = '#8899c1';

/* let's convert the percentage values for the individual shields into colour codes */
	/* ventral, aka bottom */
	if ($ventral == '0')   { $ventral = $p0;   }
	if ($ventral == '10')  { $ventral = $p10;  }
	if ($ventral == '20')  { $ventral = $p20;  }
	if ($ventral == '25')  { $ventral = $p25;  }
	if ($ventral == '30')  { $ventral = $p30;  }
	if ($ventral == '40')  { $ventral = $p40;  }
	if ($ventral == '50')  { $ventral = $p50;  }
	if ($ventral == '60')  { $ventral = $p60;  }
	if ($ventral == '70')  { $ventral = $p70;  }
	if ($ventral == '75')  { $ventral = $p75;  }
	if ($ventral == '80')  { $ventral = $p80;  }
	if ($ventral == '90')  { $ventral = $p90;  }
	if ($ventral == '100') { $ventral = $p100; }
	
	/* dorsal, aka top */
	if ($dorsal == '0')   { $dorsal = $p0;   }
	if ($dorsal == '10')  { $dorsal = $p10;  }
	if ($dorsal == '20')  { $dorsal = $p20;  }
	if ($dorsal == '25')  { $dorsal = $p25;  }
	if ($dorsal == '30')  { $dorsal = $p30;  }
	if ($dorsal == '40')  { $dorsal = $p40;  }
	if ($dorsal == '50')  { $dorsal = $p50;  }
	if ($dorsal == '60')  { $dorsal = $p60;  }
	if ($dorsal == '70')  { $dorsal = $p70;  }
	if ($dorsal == '75')  { $dorsal = $p75;  }
	if ($dorsal == '80')  { $dorsal = $p80;  }
	if ($dorsal == '90')  { $dorsal = $p90;  }
	if ($dorsal == '100') { $dorsal = $p100; }
	
	/* port, aka left */
	if ($port == '0')   { $port = $p0;   }
	if ($port == '10')  { $port = $p10;  }
	if ($port == '20')  { $port = $p20;  }
	if ($port == '25')  { $port = $p25;  }
	if ($port == '30')  { $port = $p30;  }
	if ($port == '40')  { $port = $p40;  }
	if ($port == '50')  { $port = $p50;  }
	if ($port == '60')  { $port = $p60;  }
	if ($port == '70')  { $port = $p70;  }
	if ($port == '75')  { $port = $p75;  }
	if ($port == '80')  { $port = $p80;  }
	if ($port == '90')  { $port = $p90;  }
	if ($port == '100') { $port = $p100; }
	
	/* starboard, aka right */
	if ($starboard == '0')   { $starboard = $p0;   }
	if ($starboard == '10')  { $starboard = $p10;  }
	if ($starboard == '20')  { $starboard = $p20;  }
	if ($starboard == '25')  { $starboard = $p25;  }
	if ($starboard == '30')  { $starboard = $p30;  }
	if ($starboard == '40')  { $starboard = $p40;  }
	if ($starboard == '50')  { $starboard = $p50;  }
	if ($starboard == '60')  { $starboard = $p60;  }
	if ($starboard == '70')  { $starboard = $p70;  }
	if ($starboard == '75')  { $starboard = $p75;  }
	if ($starboard == '80')  { $starboard = $p80;  }
	if ($starboard == '90')  { $starboard = $p90;  }
	if ($starboard == '100') { $starboard = $p100; }
	
	/* fore, aka front */
	if ($fore == '0')   { $fore = $p0;   }
	if ($fore == '10')  { $fore = $p10;  }
	if ($fore == '20')  { $fore = $p20;  }
	if ($fore == '25')  { $fore = $p25;  }
	if ($fore == '30')  { $fore = $p30;  }
	if ($fore == '40')  { $fore = $p40;  }
	if ($fore == '50')  { $fore = $p50;  }
	if ($fore == '60')  { $fore = $p60;  }
	if ($fore == '70')  { $fore = $p70;  }
	if ($fore == '75')  { $fore = $p75;  }
	if ($fore == '80')  { $fore = $p80;  }
	if ($fore == '90')  { $fore = $p90;  }
	if ($fore == '100') { $fore = $p100; }
	
	/* aft, aka back */
	if ($aft == '0')   { $aft = $p0;   }
	if ($aft == '10')  { $aft = $p10;  }
	if ($aft == '20')  { $aft = $p20;  }
	if ($aft == '25')  { $aft = $p25;  }
	if ($aft == '30')  { $aft = $p30;  }
	if ($aft == '40')  { $aft = $p40;  }
	if ($aft == '50')  { $aft = $p50;  }
	if ($aft == '60')  { $aft = $p60;  }
	if ($aft == '70')  { $aft = $p70;  }
	if ($aft == '75')  { $aft = $p75;  }
	if ($aft == '80')  { $aft = $p80;  }
	if ($aft == '90')  { $aft = $p90;  }
	if ($aft == '100') { $aft = $p100; }


/* Set some style information */
?>
<style>
.ship-status {
	text-align: center;
}

<?php if ($shield_image !== 'off' && $shield_image_granular == true)
{?>
	.ship-status .top {
		margin-top: .5em;
		border: 2px dashed;
		border-top-color: <?php echo $starboard; ?>;
		border-bottom-color: <?php echo $port; ?>;
		border-left-color: <?php echo $fore; ?>;
		border-right-color: <?php echo $aft; ?>;
		border-radius: 100px / 55px;
		-moz-border-radius: 100px / 55px;
		-webkit-border-radius: 100px / 55px;
	}
	.ship-status .side {
		margin-top: .5em;
		border: 2px dashed;
		border-top-color: <?php echo $dorsal; ?>;
		border-bottom-color: <?php echo $ventral; ?>;
		border-left-color: <?php echo $fore; ?>;
		border-right-color: <?php echo $aft; ?>;
		border-radius: 90px / 40px;
		-moz-border-radius: 90px / 40px;
		-webkit-border-radius: 90px / 40px;
	}
<?php } else { ?>
	.ship-status img {
		margin-top: .5em;
	}
<?php } ?>

.ship-status-details {
	text-align: left;
}
.status-title {
	font-weight: bold;
	border-bottom: 1px solid;
}
</style>
<?php
/* Now display all the info we have gathered, but only if they are selected to be visible and are not empty */
echo '<div class="ship-status">';
echo '<span class="status-title">' . strtoupper($simtype) . ' STATUS</span>';
if ($show_shield_top_image && $shield_image)
{
	if ($shield_image_granular)
	{
		echo '<img src="' . base_url() . 'application/assets/images/status/top/shieldsoff.png" width="140px" class="top"><br />';
	} else {
		echo '<img src="' . base_url() . 'application/assets/images/status/top/shields' . $shield_image . '.png" width="140px" class="top"><br />';
	}
}
if ($show_shield_side_image && $shield_image)
{
	if ($shield_image_granular)
	{
		echo '<img src="' . base_url() . 'application/assets/images/status/side/shieldsoff.png" width="140px" class="side"><br />';
	} else {
		echo '<img src="' . base_url() . 'application/assets/images/status/side/shields' . $shield_image . '.png" width="140px" class="side"><br />';
	}
}
echo '<div class="ship-status-details page-subhead">';
if ($show_location && $location)
{
	echo 'Location: ' . $location . '<br />';
}
if ($show_speed && $speed)
{
echo 'Speed: ' . $speed . '<br />';
}
if ($show_shields && $shields)
{
echo 'Shields: ' . $shields . '<br />';
}
if ($show_hull && $hull)
{
echo 'Hull: ' . $hull . '<br />';
}
if ($show_systems && $systems)
{
echo 'Systems: ' . $systems;
}
echo '</div></div>';

?>