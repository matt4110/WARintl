<?php 
/**
 * Section for popup in tinymce for Cool Video Gallery
 * @author Praveen Rajan
 */
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Cool Video Gallery</title>
	<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
</head>
<body>	
	<?php
		//Get all galleries
		$cvg_galleries = new CvgVideoDB();
		$galleries = $cvg_galleries->find_all_galleries();
		$select_galleries = '<select name="gallerytag" style="width:200px;" id="gallerytag">';
		
		foreach($galleries as $gallery) {
			$select_galleries .= '<option value="'.$gallery->gid.'">' . $gallery->name . '</option>';
		}
		$select_galleries .= '</select>';
		
		//Get all videos
		$videos = $cvg_galleries->get_all_videos();
		$select_videos = '<select name="singletag" style="width:200px;" id="singletag">';
		
		foreach($videos as $video) {
			$select_videos .= '<option value="'.$video->pid.'">' . $video->alttext . '</option>';
		}
		$select_videos .= '</select>';
		
		
		$options_player = get_option('cvg_player_settings');
		$player_width = $options_player['cvgplayer_width'];
		$player_height = $options_player['cvgplayer_height'];
	?>
	
	<div class="tabs">
		<ul>
			<li id="gallery_tab" class="current"><span><a href="javascript:mcTabs.displayTab('gallery_tab','gallery_panel');" onmousedown="return false;"><?php _e('Gallery', 'cool-video-gallery'); ?></a></span></li>
			<li id="single_tab"><span><a href="javascript:mcTabs.displayTab('single_tab','single_panel');" onmousedown="return false;"><?php _e('Videos', 'cool-video-gallery'); ?></a></span></li>
		</ul>
	</div>
	<div class="panel_wrapper">
		
		<!-- gallery panel -->
		<div id="gallery_panel" class="panel current" style="height:130px;">
		<br />
		<table border="0" cellpadding="2" cellspacing="0">
	         <tr>
	            <td nowrap="nowrap"><label for="gallerytag"><?php _e('Gallery', 'cool-video-gallery'); ?></label></td>
	            <td><?php echo $select_galleries;?></td>
	          </tr>
	          <tr>
	            <td nowrap="nowrap" valign="top"><label for="showtype"><?php _e("Show as", 'cool-video-gallery'); ?></label></td>
	            <td>
		            <label><input name="showtype" type="radio" value="showcase" id="showcase" checked="checked" /> <?php _e('Showcase', 'cool-video-gallery') ;?></label><br />
					<label><input name="showtype" type="radio" value="slideshow" id="slideshow" /> <?php _e('Slideshow', 'cool-video-gallery') ;?></label><br />
					<label><input name="showtype" type="radio" value="playlist" id="playlist" /> <?php _e('Playlist', 'cool-video-gallery') ;?></label><br />
				</td>
	          </tr>
	          <tr>
	            <td nowrap="nowrap" valign="top"><label for="showtype"><?php _e("Limit", 'cool-video-gallery'); ?></label></td>
	            <td><input type="text" value="5" name="gallery_limit" id="gallery_limit" size="3"/></td>
	          </tr>
	        </table>
		</div>
		<!-- gallery panel -->
		
		<!-- single panel -->
		<div id="single_panel" class="panel" style="height:130px;">
		<br />
		<table border="0" cellpadding="2" cellspacing="0">
	         <tr>
	            <td nowrap="nowrap"><label for="singletag"><?php _e('Video', 'cool-video-gallery'); ?></label></td>
	            <td><?php echo $select_videos; ?></td>
	          </tr>
	          
	          <tr>
	            <td nowrap="nowrap"><label for="playersettings"><?php _e('Player Resolution', 'cool-video-gallery'); ?></label></td>
	            <td>
	           		<input type="text" name="player_width" id="player_width" size="3" value="<?php echo $player_width; ?>"/> X 
	           		<input type="text" name="player_height" id="player_height" size="3" value="<?php echo $player_height; ?>"/> px
                </td>
	          </tr>
	          <tr>
	            <td nowrap="nowrap" valign="top"><label for="showtypevideo"><?php _e("Show as", 'cool-video-gallery'); ?></label></td>
	            <td>
	            	<label><input name="showtypevideo" type="radio" value="embed" id="embed" checked="checked" /> <?php _e('Embed', 'cool-video-gallery') ;?></label><br />
		            <label><input name="showtypevideo" type="radio" value="popup" id="popup" /> <?php _e('Popup', 'cool-video-gallery') ;?></label><br />
				</td>
	          </tr>
	          
	        </table>
		</div>
		<!-- single panel -->
	</div>
	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'cool-video-gallery'); ?>" onclick="tinyMCEPopup.close();" />
		</div>
	
		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'cool-video-gallery'); ?>" onclick="insertShortcode();" />
		</div>
	</div>
</body>
</html>	
<script type="text/javascript">

jQuery('#playlist').click(function(){ 
	jQuery('#gallery_limit').attr('disabled', 'disabled');
});

jQuery('#showcase').click(function(){ 
	jQuery('#gallery_limit').attr('disabled', '');
});

jQuery('#slideshow').click(function(){ 
	jQuery('#gallery_limit').attr('disabled', '');
});
/**
 * Function to insert shortcode
 * @author Praveen Rajan
 */
function insertShortcode(){
	var tagtext;

	var gallery = document.getElementById('gallery_panel');
	var single = document.getElementById('single_panel');

	if (gallery.className.indexOf('current') != -1) {
		var galleryid = jQuery('#gallerytag').val();
		var gallerylimit = jQuery('#gallery_limit').val();
		var showtype = getCheckedValue(document.getElementsByName('showtype'));

		var mode_temp = '';
		if(showtype != 'playlist')
			mode_temp = "limit=" + gallerylimit;
			
		if (galleryid != 0 )
			tagtext = "[cvg-gallery galleryid=" + galleryid + " mode=" + showtype + " " + mode_temp  +  "]";
		else
			tinyMCEPopup.close();
	}

	if (single.className.indexOf('current') != -1) {
		var singleid = document.getElementById('singletag').value;
		var width = jQuery('#player_width').val();
		var height = jQuery('#player_height').val();
		var showtype = getCheckedValue(document.getElementsByName('showtypevideo'));

		var mode_temp = '';
		if(showtype == 'embed')
			mode_temp = "mode=playlist";
		 
		if (singleid != 0 )
			tagtext = "[cvg-video videoid=" + singleid + " width=" + width + " height=" + height + " " + mode_temp + "]";
		else
			tinyMCEPopup.close();
	}
	
	if(window.tinyMCE) {


		/* get the TinyMCE version to account for API diffs */
	    var tmce_ver=window.tinyMCE.majorVersion;

	    if (tmce_ver>="4") {
	        window.tinyMCE.execCommand('mceInsertContent', false, tagtext);
	    } else {
	        window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
	    }
    
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}

/**
 * Function to get type of display
 */
function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}
</script>