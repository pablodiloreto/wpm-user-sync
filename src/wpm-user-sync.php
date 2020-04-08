<?php
/*
Plugin Name: WPM User Sync
Plugin URI: https://pablodiloreto.work/wpm-user-sync/
Description: xxxxx.
Author: Pablo Ariel Di Loreto
Version: 1.0
Requires at least: 5.3.2
Tested up to: 5.3.2
Author URI: https://pablodiloreto.work
Text Domain: wpm-user-sync
License: GPLv2 or later
*/


require_once (dirname(__FILE__).'/core/wpmus-variables.php');
require_once (dirname(__FILE__).'/core/wpmus-functions.php');

require_once (dirname(__FILE__).'/network-admin/wpmus-network-sections.php');
require_once (dirname(__FILE__).'/network-admin/wpmus-network-common.php');
require_once (dirname(__FILE__).'/network-admin/wpmus-network-home.php');
require_once (dirname(__FILE__).'/network-admin/wpmus-network-syncoptions.php');
require_once (dirname(__FILE__).'/network-admin/wpmus-network-syncactions.php');

require_once (dirname(__FILE__).'/site-admin/wpmus-site-sections.php');
require_once (dirname(__FILE__).'/site-admin/wpmus-site-home.php');
require_once (dirname(__FILE__).'/site-admin/wpmus-site-syncactions.php');

register_activation_hook( __FILE__, 'wpmus_plugin_activate' );

add_action('init', 'wpmus_init');

add_action( 'admin_init', 'wpmus_check_requirements' );
add_action( 'network_admin_menu', 'wpmus_networkmenu_items' );
add_action( 'admin_menu', 'wpmus_sitemenu_items' );


add_action( 'wpmus_network_home_tabs', 'wpmus_network_home_welcome_tab', 1 );
add_action( 'wpmus_network_home_tabs', 'wpmus_network_home_concepts_tab', 2 );
add_action( 'wpmus_network_home_tabs', 'wpmus_network_home_about_tab', 3 );
add_action( 'wpmus_network_home_contents', 'wpmus_network_home_welcome_content' );
add_action( 'wpmus_network_home_contents', 'wpmus_network_home_concepts_content' );
add_action( 'wpmus_network_home_contents', 'wpmus_network_home_about_content' );

add_action( 'wpmus_site_home_tabs', 'wpmus_site_home_welcome_tab', 1 );
add_action( 'wpmus_site_home_tabs', 'wpmus_site_home_concepts_tab', 2 );
add_action( 'wpmus_site_home_tabs', 'wpmus_site_home_about_tab', 3 );
add_action( 'wpmus_site_home_contents', 'wpmus_site_home_welcome_content' );
add_action( 'wpmus_site_home_contents', 'wpmus_site_home_concepts_content' );
add_action( 'wpmus_site_home_contents', 'wpmus_site_home_about_content' );

add_action( 'wpmu_new_blog', 'wpmus_sync_newsite' );
add_action( 'wpmu_new_user', 'wpmus_sync_newuser' );
add_action( 'set_user_role', 'wpmus_sync_newrole', 10, 2 );

add_action( 'network_admin_edit_wpmusSaveGlobalConfig', 'wpmus_save_GlobalConfig' );
add_action( 'network_admin_edit_wpmusSyncNetworkFromScratch', 'wpmus_sync_NetworkFromScratch' );
add_action( 'admin_action_wpmusSyncNetworkSiteFromScratch', 'wpmus_sync_NetworkSiteFromScratch' );
add_action( 'admin_action_wpmusSyncSiteSiteFromScratch', 'wpmus_sync_SiteSiteFromScratch' );

add_action( 'network_admin_notices', 'wpmus_notice_updated' );
add_action( 'admin_notices', 'wpmus_notice_updated' );