<?php

/*
Plugin Name: Rss slider on post
Plugin URI: http://www.gopipulse.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/
Description: RSS slider on post is a small WordPress plugin to create the scroller/slider text gallery into the posts and pages, that makes rss integration to your web site very easy. In the admin we have option to add the rss feed link.
Author: Gopi.R
Version: 4.0
Author URI: http://www.gopipulse.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/
Donate link: http://www.gopipulse.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/
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
	add_option('rss_s1', "http://www.gopipulse.com/work/category/word-press-plug-in/feed/");
	add_option('rssslider_height_display_length_s2', "190_3_500");
	add_option('rss_s2', "http://www.wordpress.org/news/feed/");
	add_option('rssslider_height_display_length_s3', "190_2_500");	
	add_option('rss_s3', "http://www.gopipulse.com/extensions/feed");
	add_option('rssslider_height_display_length_s4', "190_4_500");	
	add_option('rss_s4', "http://www.gopipulse.com/extensions/category/joomla-plugin/feed/");
}


function rssslider_admin_options() 
{
	global $wpdb;
	?>

<div class="wrap">
  <h2>Rss slider on post</h2>
</div>
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
	
	if (@$_POST['rssslider_submit']) 
	{
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
		
	}
	
	?>
<form name="rssslider_form" method="post" action="">
  <table width="620" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="3"><h3>Setting 1</h3></td>
    </tr>
    <tr>
      <td colspan="3">RSS Link</td>
    </tr>
    <tr>
      <td height="30" colspan="3"><input  style="width: 600px;" type="text" value="<?php echo @$rss_s1; ?>" name="rss_s1" id="rss_s1" /></td>
    </tr>
    <tr>
      <td height="30" width="160">Each Record Height</td>
      <td width="160">Display Records #</td>
      <td width="300">Text Length</td>
    </tr>
    <tr>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_height_1; ?>" name="rssslider_height_1" id="rssslider_height_1" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_display_1; ?>" name="rssslider_display_1" id="rssslider_display_1" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_length_1; ?>" name="rssslider_length_1" id="rssslider_length_1" /></td>
    </tr>
    <tr>
      <td colspan="3"><h3>Setting 2</h3></td>
    </tr>
    <tr>
      <td colspan="3">RSS Link</td>
    </tr>
    <tr>
      <td height="30" colspan="3"><input  style="width: 600px;" type="text" value="<?php echo @$rss_s2; ?>" name="rss_s2" id="rss_s2" /></td>
    </tr>
    <tr>
      <td height="30">Each Record Height</td>
      <td>Display Records #</td>
      <td>Text Length</td>
    </tr>
    <tr>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_height_2; ?>" name="rssslider_height_2" id="rssslider_height_2" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_display_2; ?>" name="rssslider_display_2" id="rssslider_display_2" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_length_2; ?>" name="rssslider_length_2" id="rssslider_length_2" /></td>
    </tr>
    <tr>
      <td colspan="3"><h3>Setting 3</h3></td>
    </tr>
    <tr>
      <td colspan="3">RSS Link</td>
    </tr>
    <tr>
      <td height="30" colspan="3"><input  style="width: 600px;" type="text" value="<?php echo @$rss_s3; ?>" name="rss_s3" id="rss_s3" /></td>
    </tr>
    <tr>
      <td height="30">Each Record Height</td>
      <td>Display Records #</td>
      <td>Text Length</td>
    </tr>
    <tr>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_height_3; ?>" name="rssslider_height_3" id="rssslider_height_3" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_display_3; ?>" name="rssslider_display_3" id="rssslider_display_3" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_length_3; ?>" name="rssslider_length_3" id="rssslider_length_3" /></td>
    </tr>
    <tr>
      <td colspan="3"><h3>Setting 4</h3></td>
    </tr>
    <tr>
      <td colspan="3">RSS Link</td>
    </tr>
    <tr>
      <td height="30" colspan="3"><input  style="width: 600px;" type="text" value="<?php echo @$rss_s4; ?>" name="rss_s4" id="rss_s4" /></td>
    </tr>
    <tr>
      <td height="30">Each Record Height</td>
      <td>Display Records #</td>
      <td>Text Length</td>
    </tr>
    <tr>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_height_4; ?>" name="rssslider_height_4" id="rssslider_height_4" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_display_4; ?>" name="rssslider_display_4" id="rssslider_display_4" /></td>
      <td><input  style="width: 100px;" type="text" value="<?php echo @$rssslider_length_4; ?>" name="rssslider_length_4" id="rssslider_length_4" /></td>
    </tr>
    <tr>
      <td colspan="3" height="40" align="left"><input name="rssslider_submit" id="rssslider_submit" lang="publish" class="button-primary" value="Update All Settings" type="Submit" /></td>
    </tr>
  </table>
</form>
<ul>
<li>Use short code to add this plugin into posts and pages.</li>
</ul>
Check official website for more info and live demo <a href="http://www.gopipulse.com/work/2012/04/01/rss-slider-on-post-wordpress-plugin/" target="_blank">click here</a>
<?php
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
	$cnt=0;
	$f = fopen( $url, 'r' );
	while( $data = fread( $f, 4096 ) ) { $xml .= $data; }
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
	}
	
	$rssslider = "";
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
	return $rssslider;
}

function rssslider_add_to_menu() 
{
	if (is_admin()) 
	{
		add_options_page('Rss slider on post', 'Rss slider on post', 'manage_options', __FILE__, 'rssslider_admin_options' );
	}
}

function rssslider_deactivation() 
{

}

add_shortcode( 'rss-slider-on-post', 'rssslider_shortcode' );
register_activation_hook(__FILE__, 'rssslider_install');
register_deactivation_hook(__FILE__, 'rssslider_deactivation');
add_action('admin_menu', 'rssslider_add_to_menu');
add_action('wp_enqueue_scripts', 'rssslider_add_javascript_files');
?>