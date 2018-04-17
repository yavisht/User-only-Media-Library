<?php
/*
Plugin Name: User only Media Library
Plugin URI: https://au.linkedin.com/in/yavisht
Description: Users can only access their own images in the media library.
Version: 1
Author: Yavisht Katgara
Author URI: https://au.linkedin.com/in/yavisht
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

add_filter( 'ajax_query_attachments_args', 'yk_display_current_user_attachments' );
 
function yk_display_current_user_attachments( $query ) {
    
    $user_id = get_current_user_id();
    
    if ( $user_id && !current_user_can('activate_plugins') && !current_user_can('edit_others_posts') ) {
        
        $query['author'] = $user_id;
    
    }
    
    return $query;

}
