<?php
require_once( 'includes/embed-handlers/class-embed-replacer.php' );

use PHPUnit\Framework\TestCase;

final class Embed_Replacer_Test extends TestCase {
	protected $replacer;

	protected function setUp() {
		$this->replacer = new class() extends Embed_Replacer {
			public static $name = 'temp';

			public function replace( $url ) {
				return sprintf( '<div>Elements made out of %s</div>', $url );
			}
		};
	}

	public function test_get_name_returns_replacer_name() {
		$this->assertEquals( 'temp', $this->replacer->get_name() );
	}

	public function test_replace_returns_replaced_embed_string() {
		$this->assertInternalType( 'string', $this->replacer->replace( 'http://google.com' ) );
	}
}
