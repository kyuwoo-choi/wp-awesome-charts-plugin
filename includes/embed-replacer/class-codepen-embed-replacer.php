<?php
/**
 * Codepen_Embed_Replacer class implementation
 *
 * @package develop-o-embed
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-embed-replacer.php' );

/**
 * Codepen_Embed_Replacer class
 *
 * @since 1.0.0
 */
class Codepen_Embed_Replacer extends Embed_Replacer {
	/**
	 * The name of the codepen replacer.
	 *
	 * @var string
	 * @static
	 * @access public
	 * @since 1.0.0
	 */
	public static $name = 'codepen';

	/**
	 * The template to embed.
	 *
	 * @var string
	 * @static
	 * @access protected
	 * @since 1.0.0
	 */
	protected static $template = '
		<div class="develop-o-embed-codepen">
			<p data-height="350"
				data-theme-id="0"
				data-default-tab="html,result"
				data-embed-version="2"
				class="codepen"
				data-user="%s"
				data-slug-hash="%s"
				data-pen-title="%s"
			></p>
			<script async src="https://static.codepen.io/assets/embed/ei.js"></script>
		</div>';

	/**
	 * Create and return codepen oEmbed string out of given url.
	 *
	 * @param array $url_components Url components to replace.
	 * @return string The codepen oEmbed string.
	 */
	public function replace( $url_components ) {
		if ( 'codepen.io' != $url_components['host']
			or 4 < count( $url_components['paths'] ) ) {
			return false;
		}

		$paths = $url_components['paths'];
		$slug  = $paths[3];
		$user  = $paths[1];

		return sprintf(
			static::$template,
			$user,
			$slug,
			$slug
		);
	}
}
