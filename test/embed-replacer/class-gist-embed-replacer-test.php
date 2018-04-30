<?php
require_once( 'includes/embed-replacer/class-gist-embed-replacer.php' );

use PHPUnit\Framework\TestCase;

final class Gist_Embed_Replacer_Test extends TestCase {
	protected $replacer;

	protected function setUp() {
		$this->replacer = new Gist_Embed_Replacer();
	}

	public function test_get_name_returns_replacer_name() {
		$this->assertEquals( 'gist', $this->replacer->get_name() );
	}

	public function test_replace_returns_replaced_embed_string() {
		$url = 'https://gist.github.com/kyuwoo-choi/768976a44ebcdb495283533d6d1bf720';
		$url_components = parse_url( $url );
		$embed_string = $this->replacer->replace( $url_components );

		$this->assertInternalType( 'string', $embed_string );
		$this->assertContains( $url, $embed_string );
	}
}
