# nova_mod_status
Modification to add mission status and ship status info to the sub-navigation of [Anodyne Production's Nova](http://www.anodyne-productions.com) RPG Management platform. The ship and mission status sections add a customisable ability to include latest post information, current alert status, current stardate, current ship systems status, as well as a dynamically-genrated shield status graphic, utilising styled CSS borders to create the desired effect.

## Current Version:
1.0

## Installation Instructions:
This modification has been designed in such a way to minimise the amount of set-up work required by those who use it. Installation steps are simple:

1. Upload the application directory and all of its contents to the root of your Nova site. If prompted by your FTP client, choose to overwrite the files on the server with the ones being uploaded.
  **Important!** If you have made your own changes to any of the files included in this mod, you will need to manually merge the differences.  
2. Log in to your site and navigate to `[yoursite]/index.php/site/status`. You will see an access denied message - that is to be expected. Log out of your site.
3. Log into your site again and navigate to `[yoursite]/index.php/site/status`. This time you will be presented with the admin page for this mod. If you navigate away or refresh the page, you will see a new menu item appear in the sub navigation of your Admin Control panel, to enable you to get back to this page easily.
4. To add the mod to the skins you wish to use on your site, you will need to edit the `[yoursite]/application/views/[yourskin]template_[section].php` files. Modified `_main` and `_wiki` files for Nova's default skin have been included with the mod. It is suggested to place these new sections above and below your subnavigation. To do this:
  1. Find the below line in your template file:  
  ```php
<?php echo $nav_sub;?>
  ```
  2. Replace it with the following:  
  ```php
<?php include_once(APPFOLDER . '/views/_base_override/main/pages/mission_status.php'); ?>  
<hr />  
<?php echo $nav_sub;?>  
<hr />  
<?php include_once(APPFOLDER . '/views/_base_override/main/pages/ship_status.php'); ?>
  ```

  If you wish to add the sections anywhere else on your site, you can do so by including either of the below lines in the view file for any page using Seamless Substitution (i.e., copy the file from `/nova/modules/core/views/[section]/pages/[page].php` to `/application/views/[section]/pages/` and edit it):

  For the mission status section:  
  ```php
<?php include_once(APPFOLDER . '/views/_base_override/main/pages/mission_status.php'); ?>
  ```
  For the ship status section:  
  ```php
<?php include_once(APPFOLDER . '/views/_base_override/main/pages/ship_status.php'); ?>
  ```

###Ship Images
I have included a number of ship images in with the modification, though the list is by no means exhaustive. These can be found under `/application/assets/images/status/classes`. To make use of any of these, copy the contents of the class folder (i.e. the top and side directories) into `application/assets/images/status/`. A small number of these include the extra images to be used in the image-based basic shield status mode, but the majority do not, and should be used with the granular shield mode, unless you wish to create your own images to use the basic mode. Any ship classes which are not included with the modification files will need to be sourced by the user installing the mod, and added to their site accordingly.

###Advanced Configuration
Most of the options for the mod are configurable from within the admin page. There are two that some may wish to modify that will need edits to the files.
* By default the borders which create the shield effect around the ship images use a dashed setting. You may wish to change them to dotted (for the Movie-Era style used in The Wrath of Khan's displays) or solid. To do ths, you will need to modify lines 131 and 142 in `/application/views/_base_override/main/pages/ship_status.php`.
* You may also wish to change the colours used for the borders. They have been set so that 0 is a dark shade of red, 50 is a dark shade of yellow, and 100 is a shade of blue, with the values going through a gradient in-between. These are configurable in lines 14-26 of `/application/views/_base_override/main/pages/ship_status.php`.
* The default setting for the granular shield status is for the sliders to move in increments of 10. The values in the ship status view file do allow for values to be set in increments of 25. To change this, you will need to modify line 18 of `/application/views/_base_override/admin/js/site_status_js.php` from `step: 10,` to `step: 25,`.
