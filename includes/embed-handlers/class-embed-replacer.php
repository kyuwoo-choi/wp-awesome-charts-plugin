<?php
/**
 * Embed_Replacer class implementation
 *
 * @package develop-o-embed
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Embed_Replacer class
 *
 * @abstract
 * @since 1.0.0
 */
abstract class Embed_Replacer {
	/**
	 * The replacer name
	 *
	 * @var    string
	 * @access public
	 * @static
	 * @since  1.0.0
	 */
	public static $name;

	/**
	 * Create and return oEmbed string out of given url.
	 *
	 * @param string $url Url to replace.
	 * @return string The oEmbed string.
	 */
	public abstract function replace( $url );

	/**
	 * Get the name of the replacer
	 *
	 * @return string The name of the replacer.
	 */
	public function get_name() {
		return static::$name;
	}
}
