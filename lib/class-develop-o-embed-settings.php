<?php
/**
 * Develop_O_Embed_Settings class implementation
 *
 * @package develop-o-embed
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Develop_O_Embed_Settings class
 *
 * @since 1.0.0
 */
class Develop_O_Embed_Settings {
	/**
	 * The single instance of Develop_O_Embed_Settings.
	 *
	 * @var    object
	 * @access private
	 * @static
	 * @since  1.0.0
	 */
	private static $_instance = null;

	/**
	 * The single instance of Develop_O_Embed.
	 *
	 * @var    Develop_O_Embed
	 * @access public
	 * @since  1.0.0
	 */
	public $parent = null;

	/**
	 * Constructor function
	 *
	 * @param Develop_O_Embed $parent A main plugin instance.
	 */
	public function __construct( $parent ) {
		$this->parent = $parent;
	}

	/**
	 * Main Develop_O_Embed_Settings Instance
	 * Ensures only one instance of Develop_O_Embed_Settings is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @static
	 * @param  string $parent A Develop_O_Embed instance.
	 * @return Develop_O_Embed instance
	 */
	public static function instance( $parent ) {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self( $parent );
		}
		return self::$_instance;
	}
}
