<?php
/*
 * Plugin Name: Post Type Search Form
 * Plugin URL: https://andrewrminion.com/2017/11/post-type-search-form/
 * Description: Add post type-specific search forms.
 * Version: 1.0.0
 * Author: AndrewRMinion Design
 * Author URI: https://andrewrminion.com
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add shortcode
 * @param  array  $attributes WP shortcode attributes
 * @return string search form
 */
function armd_search_form( $attributes ) {
    $shortcode_attributes = shortcode_atts( array (
        'post_type'     => NULL,
    ), $attributes );

    add_filter( 'get_search_form', function ( $form ) use ( $shortcode_attributes ) {
        $form = str_replace( '</form>', '<input type="hidden" name="post_type" value="' . $shortcode_attributes['post_type'] . '"/></form>', $form );
        return $form;
    } );

    return get_search_form( false );
}
add_shortcode( 'post_type_search_form', 'armd_search_form' );
