<?php
/**
 * Gist_Embed_Replacer class implementation
 *
 * @package develop-o-embed
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-embed-replacer.php' );

/**
 * Gist_Embed_Replacer class
 *
 * @since 1.0.0
 */
class Gist_Embed_Replacer extends Embed_Replacer {
	/**
	 * The name of the gist replacer.
	 *
	 * @var string
	 * @static
	 * @since 1.0.0
	 */
	public static $name = 'gist';

	/**
	 * Create and return gist oEmbed string out of given url.
	 *
	 * @param array $url_components Url components to replace.
	 * @return string The gist oEmbed string.
	 * @since 1.0.0
	 */
	public function replace( $url_components ) {
		if ( 'gist.github.com' != $url_components['host']
			or 3 != count( $url_components['paths'] ) ) {
			return false;
		}

		return sprintf(
			'<div class="develop-o-embed-gist"><script src="%s://%s%s.js"></script></div>',
			$url_components['scheme'],
			$url_components['host'],
			$url_components['path']
		);
	}
}
