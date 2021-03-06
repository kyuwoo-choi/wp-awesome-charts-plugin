<?php
require_once( 'includes/embed-replacer/class-embed-replacer.php' );

use PHPUnit\Framework\TestCase;

final class Embed_Replacer_Test extends TestCase {
	protected $replacer;

	protected function setUp() {
		$this->replacer = new class() extends Embed_Replacer {
			public static $name = 'temp';

			public function replace( $url_components ) {
				return sprintf( '<div>Elements made out of %s</div>', $url_components['host'] );
			}
		};
	}

	public function test_get_name_returns_replacer_name() {
		$this->assertEquals( 'temp', $this->replacer->get_name() );
	}

	public function test_replace_returns_replaced_embed_string() {
		$url_components = parse_url( 'http://google.com' );

		$this->assertInternalType( 'string', $this->replacer->replace( $url_components ) );
	}
}
