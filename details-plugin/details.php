<?php

add_action( 'init', 'details' );
function details() {
    add_filter( "mce_external_plugins", "add_details_buttons" );
    add_filter( 'mce_buttons_3', 'details_register_buttons' );
}
function add_details_buttons( $plugin_array ) {
    $plugin_array['details'] = get_template_directory_uri() . '/details-plugin/details.js';
    return $plugin_array;
}
function details_register_buttons( $buttons ) {
    array_push( $buttons, 'details', 'summary', 'content'); // dropcap', 'recentposts
    return $buttons;
}

?>