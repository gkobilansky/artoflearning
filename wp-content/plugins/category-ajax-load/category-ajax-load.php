<?php
/*
Plugin Name: category ajax load 
Plugin URI: https://lancekey.com
Description: Testing wp json api. 
Version: 1.0
Author: Gene Kobilansky
Author URI: https://lancekey.com
License: MIT
*/

if(is_admin()){

} else {
	$script =  plugins_url( 'assets/js/app.js', __FILE__ ) ;
	$style  =  plugins_url( 'assets/css/app.css', __FILE__ );
    wp_enqueue_script('app',$script,array('jquery'),'1.0.0',true);
	wp_enqueue_style('app',$style);

}