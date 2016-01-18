<?php
/*
Plugin Name: Full Page Search
Plugin URI: https://github.com/ultimatumtheme/FullScreenSearch
Description: Based on the Full Screen Search plugin with customizations for The Art of Learning Project. 
Version: 1.0
Author: Gene Kobilansky
Author URI: https://lancekey.com
License: GPL3 or later
*/

if(is_admin()){

} else {
	$script =  plugins_url( 'assets/js/ult-fs-search.js', __FILE__ ) ;
	$style  =  plugins_url( 'assets/css/ult-fs-search.css', __FILE__ );
    wp_enqueue_script('ult-fs-search',$script,array('jquery'),'1.0.0',true);
	wp_enqueue_style('ult-fs-search',$style);
	add_action('wp_footer','ult_fs_search');

}

function ult_fs_search(){
	?>
    <div id="ult-fs-search">
        <button type="button" class="close">&times;</button>
        <form role="search" class="form-search" method="get" id="searchform" action="<?php echo home_url( '/' );?>">
            <input type="text" value="" name="s" placeholder="<?php _e('ask your question here','ult-fs-search');?>" />

            <button type="submit" class="btn -pink">Search</button>
        </form>
    </div>
    <?php
}