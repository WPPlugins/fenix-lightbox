<?php
/*
Plugin Name: Fenix Lightbox
Plugin URI: http://fenixsoluciones.com
Description: Lightbox for image: <code>[lbfenix img="file.jpg"]name of link[/lbfenix]</code> and Lightbox for text pop up: <code>[lbfenix id="123" title="name of link"] Text in lightbox [/lbfenix]</code>. Development by <a href="http://fenixsoluciones.com">Fenix Soluciones</a> and based on http://famspam.com/facebox
Author: Braulio Aquino
Version: 1.0
Author URI: http://braulioaquino.com
*/
add_action('wp_head', 'lbfenix_head');
function lbfenix_head() {
	echo '<script src="'.WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/jquery-1.2.2.pack.js" type="text/javascript"></script>
	<link href="'.WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="'.WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)).'/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
	    jQuery(document).ready(function($) {
	      $("a[rel*=facebox]").facebox() 
	    })
	</script>';
}
function lightbox_fenix($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => '',
		'img' => '',
		'title' => '',
	), $atts));
	if ($id) {
		return '<a rel="facebox" href="#'.$id.'">'.$title.'</a><span id="'.$id.'" style="display:none">'.$content.'</span>';
	} elseif ($img) {
		return '<a rel="facebox" href="'.$img.'">'.$content.'</a>';
	}
}
add_shortcode('lbfenix', 'lightbox_fenix');
?>
