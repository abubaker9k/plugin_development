<?php
/**
 * Plugin Name: pwspk plugin
 */
defined ('ABSPATH')|| die("canot acess directly");

add_action( 'init', 'pwspk_init' );

function pwspk_init(){
    add_shortcode( 'test', 'pwspk_my_shortcode' );
    }

function pwspk_my_shortcode($atts){
    $atts = shortcode_atts(array(
            'message' => 'hello worlds',
        ), $atts,'test');
     return $atts['message'];
} 

add_filter ('the_title', 'pwspk_the_title');
function pwspk_the_title($title){
    return  "hey the title";
    }

add_action('wp_enqueue_scripts','pwspk_wp_enqueue_script');
function pwspk_wp_enqueue_script(){
        wp_enqueue_style('pwspk_plugin_dev', plugin_dir_url(__FILE__)."assets/css/style.css");
        wp_enqueue_script('pwspk_plugin_dev', plugin_dir_url(__FILE__)."assets/js/custom.js");
}

add_action('admin_menu','pwspk_admin_menu');
function pwspk_admin_menu(){
        add_menu_page('pwspk page','pwspk page','manage_options','pwspk-slug','pwspk_page_func');
        add_submenu_page('pwspk-slug','pwspk sub','pwspk sub','manage_options','pwspk-subslug','pwspk_sub_func');
    }
function pwspk_page_func(){
        return true;
    }
function pwspk_sub_func(){
        return true;
    }