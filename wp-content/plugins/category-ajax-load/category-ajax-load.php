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
	add_action('wp_footer','ult_fs_search');

}

/*
$response = wp_remote_get( $url );
function slug_get_json( $url ) {
    
    //GET the remote site
    $response = wp_remote_get($url);
    
    //Check for error
    if (is_wp_error($response)) {
        return sprintf('The URL %1s could not be retrieved.', $url); //get just the body 
        $data = wp_remote_retrieve_body( $response );
    }
    
    //return if not an error
    if (!is_wp_error($response)) {//decode and return
        return json_decode( &response );
    }
    
    
}

$url = add_query_arg( 'per_page', 10, rest_url() );
$posts = slug_get_json( $url );
if ( ! empty( $posts ) ) {
	 foreach( $posts as $post ) { ?>
    <article id="<?php echo esc_attr($post->ID ); ?>">
        <h1><?php echo $post->title; ?></h1>
        <div>
            <?php wpautop( $post->content ); ?>
        </div>
    </article>
    <?php }//foreach
}
*/