<?php
/**
 * Plugin Name:       develop-o-embed
 * Plugin URI:        https://kyu.io/develop-o-embed/
 * Description:       🤖 Automatic oEmbed For Developers
 * Version:           1.0.0
 * Author:            kyuwoo.choi
 * Author URI:        https://kyu.io/
 * License:           MIT
 * License URI:       https://github.com/kyuwoo-choi/wp-develop-o-embed-plugin/blob/master/LICENSE
 * Text Domain:       develop-o-embed
 * Domain Path:       /languages
 * Requires at least: 4.0
 * Tested up to:      4.9.5
 *
 * @package develop-o-embed
 * @author kyuwoo.choi
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'includes/class-develop-o-embed.php' );
require_once( 'includes/class-develop-o-embed-settings.php' );

/**
 * Create plugin instance
 *
 * @since 1.0.0
 */
function develop_o_embed() {
	$instance = Develop_O_Embed::instance( __FILE__, '1.0.0' );
	if ( is_null( $instance->settings ) ) {
		$instance->settings = Develop_O_Embed_Settings::instance( $instance );
	}
	return $instance;
}

develop_o_embed();
