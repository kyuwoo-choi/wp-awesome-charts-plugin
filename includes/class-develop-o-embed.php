<?php
/**
 * Develop_O_Embed class implementation
 *
 * @package develop-o-embed
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Develop_O_Embed class
 *
 * @since 1.0.0
 */
class Develop_O_Embed {
	/**
	 * The single instance of Develop_O_Embed.
	 *
	 * @var    object
	 * @access private
	 * @static
	 * @since  1.0.0
	 */
	private static $_instance = null;

	/**
	 * The version number.
	 *
	 * @var    string
	 * @access public
	 * @since  1.0.0
	 */
	public $version;

	/**
	 * The main plugin file
	 *
	 * @var    string
	 * @access public
	 * @since  1.0.0
	 */
	public $file;

	/**
	 * Settings class object
	 *
	 * @var    Develop_O_Settings
	 * @access public
	 * @since  1.0.0
	 */
	public $settings;

	/**
	 * Constructor function
	 *
	 * @param string $file The main plugin path.
	 * @param string $version The version number.
	 */
	public function __construct( $file = '', $version = '1.0.0' ) {
		$this->file    = $file;
		$this->version = $version;
	}

	/**
	 * Main Develop_O_Embed Instance
	 * Ensures only one instance of Develop_O_Embed is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @param  string $file The absolute file path.
	 * @param  string $version The plugin version number.
	 * @return Develop_O_Embed instance
	 */
	public static function instance( $file = '', $version = '1.0.0' ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $file, $version );
		}
		return self::$_instance;
	}
}
