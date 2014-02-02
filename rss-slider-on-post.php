<?php
/*
Plugin Name: Rss slider on post
Plugin URI: http://www.gopiplus.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/
Description: RSS slider on post is a small WordPress plugin to create the scroller/slider text gallery into the posts and pages, that makes rss integration to your web site very easy. In the admin we have option to add the rss feed link.
Author: Gopi.R
Version: 6.1
Author URI: http://www.gopiplus.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/
Donate link: http://www.gopiplus.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/
Tags: Rss, plugin, wordpress, slider
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $wpdb, $wp_version;

function rssslider_add_javascript_files() 
{
	if (!is_admin())
	{
		wp_enqueue_script( 'rss-slider-on-post', get_option('siteurl').'/wp-content/plugins/rss-slider-on-post/rss-slider-on-post.js');
	}	
}

function rssslider_install() 
{
	global $wpdb;
	add_option('rssslider_height_display_length_s1', "200_4_500");
	add_option('rss_s1', "http://www.gopiplus.com/work/category/word-press-plug-in/feed/");
	add_option('rssslider_height_display_length_s2', "190_3_500");
	add_option('rss_s2', "http://www.wordpress.org/news/feed/");
	add_option('rssslider_height_display_length_s3', "190_2_500");	
	add_option('rss_s3', "http://www.gopiplus.com/extensions/feed");
	add_option('rssslider_height_display_length_s4', "190_4_500");	
	add_option('rss_s4', "http://www.gopiplus.com/extensions/category/joomla-plugin/feed/");
}

function rssslider_admin_options() 
{
	global $wpdb;
	?>
		<div class="wrap">
	  <div class="form-wrap">
		<div id="icon-plugins" class="icon32 icon32-posts-post"></div>
		<?php
		$rssslider_height_display_length_s1 = get_option('rssslider_height_display_length_s1');
		$rssslider_height_display_length_s2 = get_option('rssslider_height_display_length_s2');
		$rssslider_height_display_length_s3 = get_option('rssslider_height_display_length_s3');
		$rssslider_height_display_length_s4 = get_option('rssslider_height_display_length_s4');
		$rss_s1 = get_option('rss_s1');
		$rss_s2 = get_option('rss_s2');
		$rss_s3 = get_option('rss_s3');
		$rss_s4 = get_option('rss_s4');
		
		$rssslider_height_display_length_s1_new = explode("_", $rssslider_height_display_length_s1);
		$rssslider_height_1 = @$rssslider_height_display_length_s1_new[0];
		$rssslider_display_1 = @$rssslider_height_display_length_s1_new[1];
		$rssslider_length_1 = @$rssslider_height_display_length_s1_new[2];
		
		$rssslider_height_display_length_s2 = explode("_", $rssslider_height_display_length_s2);
		$rssslider_height_2 = @$rssslider_height_display_length_s2[0];
		$rssslider_display_2 = @$rssslider_height_display_length_s2[1];
		$rssslider_length_2 = @$rssslider_height_display_length_s2[2];
		
		$rssslider_height_display_length_s3 = explode("_", $rssslider_height_display_length_s3);
		$rssslider_height_3 = @$rssslider_height_display_length_s3[0];
		$rssslider_display_3 = @$rssslider_height_display_length_s3[1];
		$rssslider_length_3 = @$rssslider_height_display_length_s3[2];
		
		$rssslider_height_display_length_s4 = explode("_", $rssslider_height_display_length_s4);
		$rssslider_height_4 = @$rssslider_height_display_length_s4[0];
		$rssslider_display_4 = @$rssslider_height_display_length_s4[1];
		$rssslider_length_4 = @$rssslider_height_display_length_s4[2];
		
		if (isset($_POST['rssslider_form_submit']) && $_POST['rssslider_form_submit'] == 'yes')
		{
			check_admin_referer('rssslider_form_setting');
				
			$rssslider_height_1 = stripslashes($_POST['rssslider_height_1']);
			$rssslider_display_1 = stripslashes($_POST['rssslider_display_1']);
			$rssslider_length_1 = stripslashes($_POST['rssslider_length_1']);
			
			$rssslider_height_2 = stripslashes($_POST['rssslider_height_2']);
			$rssslider_display_2 = stripslashes($_POST['rssslider_display_2']);
			$rssslider_length_2 = stripslashes($_POST['rssslider_length_2']);
			
			$rssslider_height_3 = stripslashes($_POST['rssslider_height_3']);
			$rssslider_display_3 = stripslashes($_POST['rssslider_display_3']);
			$rssslider_length_3 = stripslashes($_POST['rssslider_length_3']);
			
			$rssslider_height_4 = stripslashes($_POST['rssslider_height_4']);
			$rssslider_display_4 = stripslashes($_POST['rssslider_display_4']);
			$rssslider_length_4 = stripslashes($_POST['rssslider_length_4']);
			
			$rssslider_height_display_length_s1 = $rssslider_height_1 . "_" . $rssslider_display_1. "_" . $rssslider_length_1;
			$rssslider_height_display_length_s2 = $rssslider_height_2 . "_" . $rssslider_display_2. "_" . $rssslider_length_2;
			$rssslider_height_display_length_s3 = $rssslider_height_3 . "_" . $rssslider_display_3. "_" . $rssslider_length_3;
			$rssslider_height_display_length_s4 = $rssslider_height_4 . "_" . $rssslider_display_4. "_" . $rssslider_length_4;
			
			$rss_s1 = stripslashes($_POST['rss_s1']);
			$rss_s2 = stripslashes($_POST['rss_s2']);
			$rss_s3 = stripslashes($_POST['rss_s3']);
			$rss_s4 = stripslashes($_POST['rss_s4']);
			
			update_option('rssslider_height_display_length_s1', $rssslider_height_display_length_s1 );
			update_option('rssslider_height_display_length_s2', $rssslider_height_display_length_s2 );
			update_option('rssslider_height_display_length_s3', $rssslider_height_display_length_s3 );
			update_option('rssslider_height_display_length_s4', $rssslider_height_display_length_s4 );
			update_option('rss_s1', $rss_s1 );
			update_option('rss_s2', $rss_s2 );
			update_option('rss_s3', $rss_s3 );
			update_option('rss_s4', $rss_s4 );
			
			?>
			<div class="updated fade">
				<p><strong><?php _e('Details successfully updated.', 'rss-slider-on-post'); ?></strong></p>
			</div>
			<?php
		}
		?>
		<h2><?php _e('Rss slider on post', 'rss-slider-on-post'); ?></h2>
		<form name="rssslider_form" method="post" action="">
		<h3><?php _e('Setting 1', 'rss-slider-on-post'); ?></h3>
		<label for="tag-title"><?php _e('Rss link', 'rss-slider-on-post'); ?></label>
		<input name="rss_s1" type="text" id="rss_s1" value="<?php echo $rss_s1; ?>" size="125" maxlength="200" />
		<p><?php _e('Enter your rss link in this box.', 'rss-slider-on-post'); ?> (Example: http://www.gopiplus.com/work/category/word-press-plug-in/feed/)</p>
		<label for="tag-title"><?php _e('Each record heigh', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_height_1" type="text" id="rssslider_height_1" value="<?php echo $rssslider_height_1; ?>" maxlength="3" />
		<p><?php _e('This is the height of the each record in the scroll.', 'rss-slider-on-post'); ?> (Example: 200)</p>
		<label for="tag-title"><?php _e('Display records', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_display_1" type="text" id="rssslider_display_1" value="<?php echo $rssslider_display_1; ?>" maxlength="2" />
		<p><?php _e('No of records you want to show in the screen at the same time.', 'rss-slider-on-post'); ?> (Example: 4)</p>
		<label for="tag-title"><?php _e('Text length', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_length_1" type="text" id="rssslider_length_1" value="<?php echo $rssslider_length_1; ?>" maxlength="3" />
		<p><?php _e('Enter description text length.', 'rss-slider-on-post'); ?> (Example: 500)</p>  
		  
		<h3><?php _e('Setting 2', 'rss-slider-on-post'); ?></h3>
		<label for="tag-title"><?php _e('Rss link', 'rss-slider-on-post'); ?></label>
		<input name="rss_s2" type="text" id="rss_s2" value="<?php echo $rss_s2; ?>" size="125" maxlength="200" />
		<p><?php _e('Enter your rss link in this box.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Each record heigh', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_height_2" type="text" id="rssslider_height_2" value="<?php echo $rssslider_height_2; ?>" maxlength="3" />
		<p><?php _e('This is the height of the each record in the scroll.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Display records', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_display_2" type="text" id="rssslider_display_2" value="<?php echo $rssslider_display_2; ?>" maxlength="2" />
		<p><?php _e('No of records you want to show in the screen at the same time.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Text length', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_length_2" type="text" id="rssslider_length_2" value="<?php echo $rssslider_length_2; ?>" maxlength="3" />
		<p><?php _e('Enter description text length.', 'rss-slider-on-post'); ?></p> 
		
		<h3><?php _e('Setting 3', 'rss-slider-on-post'); ?></h3>
		<label for="tag-title"><?php _e('Rss link', 'rss-slider-on-post'); ?></label>
		<input name="rss_s3" type="text" id="rss_s3" value="<?php echo $rss_s3; ?>" size="125" maxlength="200" />
		<p><?php _e('Enter your rss link in this box.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Each record heigh', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_height_3" type="text" id="rssslider_height_3" value="<?php echo $rssslider_height_3; ?>" maxlength="3" />
		<p><?php _e('This is the height of the each record in the scroll.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Display records', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_display_3" type="text" id="rssslider_display_3" value="<?php echo $rssslider_display_3; ?>" maxlength="2" />
		<p><?php _e('No of records you want to show in the screen at the same time.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Text length', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_length_3" type="text" id="rssslider_length_3" value="<?php echo $rssslider_length_3; ?>" maxlength="3" />
		<p><?php _e('Enter description text length.', 'rss-slider-on-post'); ?></p> 
		
		<h3><?php _e('Setting 4', 'rss-slider-on-post'); ?></h3>
		<label for="tag-title"><?php _e('Rss link', 'rss-slider-on-post'); ?></label>
		<input name="rss_s4" type="text" id="rss_s4" value="<?php echo $rss_s4; ?>" size="125" maxlength="200" />
		<p><?php _e('Enter your rss link in this box.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Each record heigh', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_height_4" type="text" id="rssslider_height_4" value="<?php echo $rssslider_height_4; ?>" maxlength="3" />
		<p><?php _e('This is the height of the each record in the scroll.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Display records', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_display_4" type="text" id="rssslider_display_4" value="<?php echo $rssslider_display_4; ?>" maxlength="2" />
		<p><?php _e('No of records you want to show in the screen at the same time.', 'rss-slider-on-post'); ?></p>
		<label for="tag-title"><?php _e('Text length', 'rss-slider-on-post'); ?></label>
		<input name="rssslider_length_4" type="text" id="rssslider_length_4" value="<?php echo $rssslider_length_4; ?>" maxlength="3" />
		<p><?php _e('Enter description text length.', 'rss-slider-on-post'); ?></p> 
		
		<div style="height:10px;"></div>
		<input type="hidden" name="rssslider_form_submit" value="yes"/>
		<input name="rssslider_submit" id="rssslider_submit" class="button add-new-h2" value="<?php _e('Update All Details', 'rss-slider-on-post'); ?>" type="submit" />
		<input name="Help" lang="publish" class="button add-new-h2" onclick="window.open('http://www.gopiplus.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/');" value="<?php _e('Help', 'rss-slider-on-post'); ?>" type="button" />
		<?php wp_nonce_field('rssslider_form_setting'); ?>
	
		</form>	
	  </div>
	  <h3><?php _e('Plugin configuration option', 'rss-slider-on-post'); ?></h3>
		<ol>
			<li><?php _e('Add plugin in the posts or pages using short code.', 'rss-slider-on-post'); ?></li>
			<li><?php _e('Add directly in to the theme using PHP code.', 'rss-slider-on-post'); ?></li>
		</ol>
	  <p class="description"><?php _e('Check official website for more information', 'rss-slider-on-post'); ?> 
	  <a target="_blank" href="http://www.gopiplus.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/"><?php _e('click here', 'rss-slider-on-post'); ?></a></p>
	</div>
	<?php
}

function rssslider( $setting = "1" ) 
{
	$arr = array();
	$arr["setting"] = $setting;
	echo rssslider_shortcode($arr);
}

function rssslider_shortcode( $atts ) 
{
	global $wpdb;
	//[rss-slider-on-post setting="1"]
	if ( ! is_array( $atts ) )
	{
		return '';
	}
	$rssslider_setting = $atts['setting'];
	
	if($rssslider_setting == "1")
	{
		$rssslider_newsetting = get_option('rssslider_height_display_length_s1');
		$url = get_option('rss_s1');
	}
	elseif($rssslider_setting == "2")
	{
		$rssslider_newsetting = get_option('rssslider_height_display_length_s2');
		$url = get_option('rss_s2');
	}
	elseif($rssslider_setting == "3")
	{
		$rssslider_newsetting = get_option('rssslider_height_display_length_s3');
		$url = get_option('rss_s3');
	}
	elseif($rssslider_setting == "4")
	{
		$rssslider_newsetting = get_option('rssslider_height_display_length_s4');
		$url = get_option('rss_s4');
	}
	else
	{
		$rssslider_newsetting = get_option('rssslider_height_display_length_s1');
		$url = get_option('rss_s1');
	}
	
	
	$rssslider_height_display_length = explode("_", $rssslider_newsetting);
	$rssslider_scrollheight = @$rssslider_height_display_length[0];
	$rssslider_sametimedisplay = @$rssslider_height_display_length[1];
	$rssslider_textlength = @$rssslider_height_display_length[2];
	
	if(!is_numeric(@$rssslider_textlength)){ @$rssslider_textlength = 250; }
	if(!is_numeric(@$rssslider_sametimedisplay)){ @$rssslider_sametimedisplay = 2; }
	if(!is_numeric(@$rssslider_scrollheight)){ @$rssslider_scrollheight = 150; }
	
	$xml = "";
	$validurl = "";
	$rssslider = "";
	$cnt=0;
	$content = @file_get_contents($url);
	if (strpos($http_response_header[0], "200")) 
	{ 
		$f = fopen( $url, 'r' );
		while( $data = fread( $f, 4096 ) ) 
		{
			$xml .= $data; 
		}
		fclose( $f );
		preg_match_all( "/\<item\>(.*?)\<\/item\>/s", $xml, $itemblocks );
	
		if ( ! empty($itemblocks) ) 
		{
			$rssslider_count = 0;
			$rssslider_html = "";
			$IRjsjs = "";
			$rssslider_x = "";
			foreach( $itemblocks[1] as $block )
			{
				$rssslider_target = "_blank";
				
				preg_match_all( "/\<title\>(.*?)\<\/title\>/",  $block, $title );
				preg_match_all( "/\<link\>(.*?)\<\/link\>/", $block, $link );
				preg_match_all( "/\<description\>(.*?)\<\/description\>/", $block, $description );
				
				$rssslider_title = $title[1][0];
				$rssslider_title = mysql_real_escape_string(trim($rssslider_title));
				$rssslider_link = $link[1][0];
				$rssslider_link = trim($rssslider_link);
				$rssslider_text = $description[1][0];
				$rssslider_text = str_replace("&lt;![CDATA[","",$rssslider_text);
				$rssslider_text = str_replace("<![CDATA[","",$rssslider_text);
				$rssslider_text = str_replace("]]&gt;","",$rssslider_text);
				$rssslider_text = str_replace("]]>","",$rssslider_text);
				
				if(is_numeric($rssslider_textlength))
				{
					if($rssslider_textlength <> "" && $rssslider_textlength > 0 )
					{
						$rssslider_text = substr($rssslider_text, 0, $rssslider_textlength);
					}
				}
				
				$rssslider_scrollheights = $rssslider_scrollheight."px";	
				
				$rssslider_html = $rssslider_html . "<div class='rssslider_div' style='height:".$rssslider_scrollheights.";padding:1px 0px 1px 0px;'>"; 
				
				if($rssslider_title <> "" )
				{
					$rssslider_html = $rssslider_html . "<div style='padding-left:4px;'><strong>";	
					$IRjsjs = $IRjsjs . "<div style=\'padding-left:4px;\'><strong>";				
					if($rssslider_link <> "" ) 
					{ 
						$rssslider_html = $rssslider_html . "<a href='$rssslider_link'>"; 
						$IRjsjs = $IRjsjs . "<a href=\'$rssslider_link\'>";
					} 
					$rssslider_html = $rssslider_html . $rssslider_title;
					$IRjsjs = $IRjsjs . $rssslider_title;
					if($rssslider_link <> "" ) 
					{ 
						$rssslider_html = $rssslider_html . "</a>"; 
						$IRjsjs = $IRjsjs . "</a>";
					}
					$rssslider_html = $rssslider_html . "</strong></div>";
					$IRjsjs = $IRjsjs . "</strong></div>";
				}
				
				if($rssslider_text <> "" )
				{
					$rssslider_html = $rssslider_html . "<div style='padding-left:4px;'>$rssslider_text</div>";	
					$IRjsjs = $IRjsjs . "<div style=\'padding-left:4px;\'>$rssslider_text</div>";	
				}
				
				$rssslider_html = $rssslider_html . "</div>";
				
				$rssslider_x = $rssslider_x . "rssslider[$rssslider_count] = '<div class=\'rssslider_div\' style=\'height:".$rssslider_scrollheights.";padding:1px 0px 1px 0px;\'>$IRjsjs</div>'; ";	
				$rssslider_count++;
				$IRjsjs = "";
			}
			
			$rssslider_scrollheight = $rssslider_scrollheight + 4;
			if($rssslider_count >= $rssslider_sametimedisplay)
			{
				$rssslider_count = $rssslider_sametimedisplay;
				$rssslider_scrollheight_New = ($rssslider_scrollheight * $rssslider_sametimedisplay);
			}
			else
			{
				$rssslider_count = $rssslider_count;
				$rssslider_scrollheight_New = ($rssslider_count  * $rssslider_scrollheight);
			}
	
			$rssslider = $rssslider . '<div style="padding-top:8px;padding-bottom:8px;">';
			$rssslider = $rssslider . '<div style="text-align:left;vertical-align:middle;text-decoration: none;overflow: hidden; position: relative; margin-left: 3px; height: '. @$rssslider_scrollheight .'px;" id="RSSSlider">'.@$rssslider_html.'</div>';
			$rssslider = $rssslider . '</div>';
			$rssslider = $rssslider . '<script type="text/javascript">';
			$rssslider = $rssslider . 'var rssslider = new Array();';
			$rssslider = $rssslider . "var objrssslider	= '';";
			$rssslider = $rssslider . "var rssslider_scrollPos 	= '';";
			$rssslider = $rssslider . "var rssslider_numScrolls	= '';";
			$rssslider = $rssslider . 'var rssslider_heightOfElm = '. @$rssslider_scrollheight. ';';
			$rssslider = $rssslider . 'var rssslider_numberOfElm = '. @$rssslider_count. ';';
			$rssslider = $rssslider . "var rssslider_scrollOn 	= 'true';";
			$rssslider = $rssslider . 'function rsssliderScroll() ';
			$rssslider = $rssslider . '{';
			$rssslider = $rssslider . @$rssslider_x;
			$rssslider = $rssslider . "objrssslider	= document.getElementById('RSSSlider');";
			$rssslider = $rssslider . "objrssslider.style.height = (rssslider_numberOfElm * rssslider_heightOfElm) + 'px';";
			$rssslider = $rssslider . 'rsssliderContent();';
			$rssslider = $rssslider . '}';
			$rssslider = $rssslider . '</script>';
			$rssslider = $rssslider . '<script type="text/javascript">';
			$rssslider = $rssslider . 'rsssliderScroll();';
			$rssslider = $rssslider . '</script>';
		}
		else
		{
			$rssslider = "No records found.";
		}
	} 
	else 
	{ 
		$rssslider = "RSS url is invalid or broken";
	}

	return $rssslider;
}

function rssslider_add_to_menu() 
{
	if (is_admin()) 
	{
		add_options_page( __('Rss slider on post', 'rss-slider-on-post'), __('Rss slider on post', 'rss-slider-on-post'), 
								'manage_options', 'rss-slider-on-post', 'rssslider_admin_options' );
	}
}

function rssslider_deactivation() 
{
	// No action required.
}

function rssslider_textdomain() 
{
	  load_plugin_textdomain( 'rss-slider-on-post', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action('plugins_loaded', 'rssslider_textdomain');
add_shortcode( 'rss-slider-on-post', 'rssslider_shortcode' );
register_activation_hook(__FILE__, 'rssslider_install');
register_deactivation_hook(__FILE__, 'rssslider_deactivation');
add_action('admin_menu', 'rssslider_add_to_menu');
add_action('wp_enqueue_scripts', 'rssslider_add_javascript_files');
?>