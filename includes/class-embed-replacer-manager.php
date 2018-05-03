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
 * Embed_Replacer_Manager class
 *
 * @since 1.0.0
 */
class Embed_Replacer_Manager {
	/**
	 * Replacers
	 *
	 * @var array
	 * @access protected
	 * @since 1.0.0
	 */
	protected $replacers;

	/**
	 * Construct Embed_Replacer_Manager
	 *
	 * @param string $replacers Replacers to set.
	 * @access public
	 * @since 1.0.0
	 */
	public function __construct( $replacers = array() ) {
		foreach ( $replacers as $replacer ) {
			$this->add_replacer( $replacer );
		}
	}

	/**
	 * Create and return the oEmbed string made out of the given url.
	 *
	 * @param string $url The url to replace.
	 * @return string Replaced oEmbed string.
	 * @access public
	 * @since 1.0.0
	 */
	public function replace( $url ) {
		$result = null;

		foreach ( $this->replacers as $replacer ) {
			$result = $replacer->replace( $url );

			if ( $result ) {
				break;
			}
		}

		return $result;
	}

	/**
	 * Add replacer
	 *
	 * @param Embed_Replacer $replacer A replacer to be added.
	 * @access public
	 * @since 1.0.0
	 */
	public function add_replacer( $replacer ) {
		$this->replacers[ $replacer->get_name() ] = $replacer;
	}

	/**
	 * Remove replacer
	 *
	 * @param  string $name The replacer name to be removed.
	 * @access public
	 * @since 1.0.0
	 */
	public function remove_replacer( $name ) {
		unset( $this->replacers[ $name ] );
	}

	/**
	 * Get replacers
	 *
	 * @return array The array of replacers.
	 * @access public
	 * @since 1.0.0
	 */
	public function get_replacers() {
		return $this->replacers;
	}
}
