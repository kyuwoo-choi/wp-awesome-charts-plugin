<?php
require_once( 'includes/embed-replacer/class-codepen-embed-replacer.php' );

use PHPUnit\Framework\TestCase;

final class Codepen_Embed_Replacer_Test extends TestCase {
	protected $replacer;

	protected function setUp() {
		$this->replacer = new Codepen_Embed_Replacer();
	}

	public function test_get_name_returns_replacer_name() {
		$this->assertEquals( 'codepen', $this->replacer->get_name() );
	}

	public function test_replace_returns_replaced_embed_string() {
		$url                     = 'https://codepen.io/kyuwoo-choi/pen/JOyZzz';
		$url_components          = parse_url( $url );
		$paths                   = explode( '/', $url_components['path'] );
		$url_components['paths'] = $paths;
		$slug                    = $paths[3];
		$user                    = $paths[1];

		$embed_string = $this->replacer->replace( $url_components );

		$this->assertInternalType( 'string', $embed_string );
		$this->assertContains( 'data-user="' . $user, $embed_string );
		$this->assertContains( 'data-slug-hash="' . $slug, $embed_string );
	}
}
