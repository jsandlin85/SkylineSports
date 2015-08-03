<?php
/**
 * Masonry code for this theme.
 *
 * @package indiepro
 */

if(get_theme_mod('indiepro_homepage_column') != 'one-col' && ! function_exists('indiepro_masonry_scripts'))
{
    function indiepro_masonry_scripts()
    {
        wp_enqueue_script('masonry');
        wp_enqueue_script('jquery-imagesLoaded', get_template_directory_uri() . '/js/imagesloaded.min.js', array('masonry'), '', false);
        wp_enqueue_script('indiepro-masonry', get_template_directory_uri() . '/js/masonry_init.js', array('masonry', 'jquery-imagesLoaded'), '', true);
    }
    add_action('wp_enqueue_scripts', 'indiepro_masonry_scripts');
}