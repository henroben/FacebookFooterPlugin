<?php
/**
 * Plugin Name: Facebook Footer Link
 * Description: Adds a Facebook profile link to the end of posts
 * Version: 1.0
 * Author: Benjamin Mercer
 *
 **/

// Exit if accessed directly
if(!defined('ABSPATH')) {
	exit;
}

// Global Options Variable
$ffl_options = get_option('ffl_settings');

// Load scripts
require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-scripts.php');

// Load content
require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-content.php');

// Load settings
if(is_admin()) {
	require_once(plugin_dir_path(__FILE__).'/includes/facebook-footer-link-settings.php');
}