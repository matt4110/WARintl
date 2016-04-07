<?php 
/**
 * Section to display gallery settings.
 * @author Praveen Rajan
 */

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) 
	die(__('You are not allowed to call this page directly.', 'cool-video-gallery')); 

$cvg_core = new CvgCore();
?>
<div class="wrap">
	<h2><?php _e('Gallery Settings', 'cool-video-gallery'); ?></h2>
	<?php 
	//Section to save gallery settings
	if(isset($_POST['update_Settings'])) {
		
		// wp_nonce_field('cvg_gallery_settings_nonce','cvg_gallery_settings_nonce_csrf');
		if ( check_admin_referer( 'cvg_gallery_settings_nonce', 'cvg_gallery_settings_nonce_csrf' ) ) {
			
			if (!ctype_digit($_POST['max_cvg_gallery']) || !ctype_digit($_POST['max_vid_gallery']) || !ctype_digit($_POST['cvg_preview_height']) || !ctype_digit($_POST['cvg_preview_width']) || !ctype_digit($_POST['cvg_slideshow'])) {
				    
				$cvg_core->show_video_error( __('Enter a valid parameters for player settings.', 'cool-video-gallery') );
				
			}else {
			
				$options['max_cvg_gallery'] = $_POST['max_cvg_gallery'];
				$options['max_vid_gallery'] = $_POST['max_vid_gallery'];
				$options['cvg_preview_height'] = $_POST['cvg_preview_height'];
				$options['cvg_preview_width'] = $_POST['cvg_preview_width'];
				$options['cvg_slideshow']= intval($_POST['cvg_slideshow']) * 1000;
				$options['cvg_description']= $_POST['cvg_description'];
				$options['cvg_gallery_description']= $_POST['cvg_gallery_description'];
				$options['cvg_ffmpegpath']= $_POST['cvg_ffmpegpath'];
				$options['cvg_random_video'] = $_POST['cvg_random_video'];
				$options['cvg_youtubeapikey'] = $_POST['cvg_youtubeapikey'];
				
				update_option('cvg_settings', $options);
			
				$cvg_core->show_video_message(__('Gallery settings successfully updated.', 'cool-video-gallery'));
			}
		}
	}
	$options = get_option('cvg_settings');
	?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('.number_validate').keypress(function(e) {
				return e.charCode >= 48 && e.charCode <= 57;
			});	   
		});
	</script>
	<form method="post" action="<?php echo admin_url('admin.php?page=cvg-gallery-settings'); ?>">
			
			<div class="cvg-gallery-settings-left-pane">
				<h4><?php _e('Max no. of Galleries listed per page ', 'cool-video-gallery');?><i><?php _e('(in admin dashboard)', 'cool-video-gallery');?></i>:</h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">	
				<textarea class="number_validate" name="max_cvg_gallery" COLS=10 ROWS=1><?php echo $options['max_cvg_gallery']?></textarea>
			</div>
			<div class="cvg-clear" ></div>
			
			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('Max no. of Videos listed per page ', 'cool-video-gallery');?><i><?php _e('(in admin dashboard)', 'cool-video-gallery');?></i>:</h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<textarea class="number_validate" name="max_vid_gallery" COLS=10 ROWS=1><?php echo $options['max_vid_gallery']?></textarea>
			</div>
			<div class="cvg-clear"></div>
			
			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('Width of preview image:', 'cool-video-gallery');?></h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<textarea class="number_validate" name="cvg_preview_width" COLS=10 ROWS=1><?php echo $options['cvg_preview_width']?></textarea>
			</div>
			<div class="cvg-clear"></div>
			
			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('Height of preview image:', 'cool-video-gallery');?></h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<textarea class="number_validate" name="cvg_preview_height" COLS=10 ROWS=1><?php echo $options['cvg_preview_height']?></textarea>
			</div>
			<div class="cvg-clear"></div>	

			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('Slideshow Speed ', 'cool-video-gallery');?><i><?php _e('(in Seconds)', 'cool-video-gallery');?></i>:</h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<textarea class="number_validate" name="cvg_slideshow" COLS=10 ROWS=1><?php echo intval($options['cvg_slideshow']) / 1000;?></textarea>
			</div>
			<div class="cvg-clear"></div>
			
			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('Enable Gallery Description:', 'cool-video-gallery');?></h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<input type="radio" id="description_gallery_yes" value="1" name="cvg_gallery_description" <?php echo ($options['cvg_gallery_description'] == 1) ? 'checked' : '';?> /><label for="description_gallery_yes"><?php _e('Yes', 'cool-video-gallery');?></label>
				<input type="radio" id="description_gallery_no" value="0" name="cvg_gallery_description" <?php echo ($options['cvg_gallery_description'] == 0) ? 'checked' : '';?> /><label for="description_gallery_no"><?php _e('No', 'cool-video-gallery');?></label>
			</div>
			<div class="cvg-clear"></div>
			
			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('Enable Video Description:', 'cool-video-gallery');?></h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<input type="radio" id="description_yes" value="1" name="cvg_description" <?php echo ($options['cvg_description'] == 1) ? 'checked' : '';?> /><label for="description_yes"><?php _e('Yes', 'cool-video-gallery');?></label>
				<input type="radio" id="description_no" value="0" name="cvg_description" <?php echo ($options['cvg_description'] == 0) ? 'checked' : '';?> /><label for="description_no"><?php _e('No', 'cool-video-gallery');?></label>
			</div>
			<div class="cvg-clear"></div>
			
			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('Randomize videos in gallery:', 'cool-video-gallery');?></h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<input type="radio" id="random_cvg_yes" value="1" name="cvg_random_video" <?php echo (isset($options['cvg_random_video']) && $options['cvg_random_video'] == 1) ? 'checked' : '';?> /><label for="random_cvg_yes"><?php _e('Yes', 'cool-video-gallery');?></label>
				<input type="radio" id="random_cvg_no" value="0" name="cvg_random_video" <?php echo (isset($options['cvg_random_video']) && $options['cvg_random_video'] == 0) ? 'checked' : '';?> /><label for="random_cvg_no"><?php _e('No', 'cool-video-gallery');?></label>
			</div>
			<div class="cvg-clear"></div>
			
			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('FFMPEG library path:', 'cool-video-gallery');?></h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<textarea name="cvg_ffmpegpath" COLS=60 ROWS=1><?php echo $options['cvg_ffmpegpath']?></textarea>
				<br/>
				<i><?php _e('(HINT: For MAC OSX users: <code>/Applications/ffmpegX.app/Contents/Resources/ffmpeg</code>)', 'cool-video-gallery');?></i>
			</div>
			<div class="cvg-clear"></div>	
			<div class="cvg-clear"></div>
			
			<div class="cvg-gallery-settings-left-pane">	
				<h4><?php _e('Youtube API Key:', 'cool-video-gallery');?></h4>
			</div>
			<div class="cvg-gallery-settings-right-pane">
				<textarea name="cvg_youtubeapikey" COLS=60 ROWS=1><?php echo $options['cvg_youtubeapikey']?></textarea>
				<br/>
				<i>(<?php _e('Create and save your Youtube API Key from Youtube. For more details visit ', 'cool-video-gallery');?><a href="https://developers.google.com/youtube/v3/" target="_blank"><?php _e('Youtube Data API', 'cool-video-gallery');?></a>.</i>
			</div>
			<div class="cvg-clear"></div>
			
			
			<?php wp_nonce_field('cvg_gallery_settings_nonce','cvg_gallery_settings_nonce_csrf'); ?>
			<div class="submit">
				<input class="button-primary" type="submit" name="update_Settings" value="<?php _e('Save Gallery Settings', 'cool-video-gallery');?>"  />
			</div>
	</form>		
</div>