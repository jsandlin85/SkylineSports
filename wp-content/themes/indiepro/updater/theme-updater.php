<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}


$test_license = trim( get_option( 'indie-pro_license_key' ) );

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'http://www.templateexpress.com', // Site where EDD is hosted
		'item_name' => 'Indie Pro', // Name of theme
		'theme_slug' => 'indie-pro', // Theme slug
		'version' => '1.2.8', // The current version of this theme
		'licence' => $test_license,
		'author' => 'Template Express', // The author of this theme
		'download_id' => '', // Optional, used for generating a license renewal link
		'renew_url' => '' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'indie-pro' ),
		'enter-key' => __( 'Enter your theme license key.', 'indie-pro' ),
		'license-key' => __( 'License Key', 'indie-pro' ),
		'license-action' => __( 'License Action', 'indie-pro' ),
		'deactivate-license' => __( 'Deactivate License', 'indie-pro' ),
		'activate-license' => __( 'Activate License', 'indie-pro' ),
		'status-unknown' => __( 'License status is unknown.', 'indie-pro' ),
		'renew' => __( 'Renew?', 'indie-pro' ),
		'unlimited' => __( 'unlimited', 'indie-pro' ),
		'license-key-is-active' => __( 'License key is active.', 'indie-pro' ),
		'expires%s' => __( 'Expires %s.', 'indie-pro' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'indie-pro' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'indie-pro' ),
		'license-key-expired' => __( 'License key has expired.', 'indie-pro' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'indie-pro' ),
		'license-is-inactive' => __( 'License is inactive.', 'indie-pro' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'indie-pro' ),
		'site-is-inactive' => __( 'Site is inactive.', 'indie-pro' ),
		'license-status-unknown' => __( 'License status is unknown.', 'indie-pro' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'indie-pro' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'indie-pro' )
	)

);