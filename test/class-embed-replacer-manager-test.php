<?php
require_once( 'includes/class-embed-replacer-manager.php' );
require_once( 'includes/embed-replacer/class-embed-replacer.php' );

use PHPUnit\Framework\TestCase;

final class Embed_Replacer_Manager_Test extends TestCase {
	protected $replacer_manager;

	protected $temp_replacers;

	protected function setUp() {
		$this->replacer_manager = new Embed_Replacer_Manager();

		$temp_replacer_1 = new class() extends Embed_Replacer {
			public static $name = 'temp_1';

			public function replace( $url ) {
				return $url;
			}
		};
		$temp_replacer_2 = new class() extends Embed_Replacer {
			public static $name = 'temp_2';

			public function replace( $url ) {
				return $url;
			}
		};

		$this->temp_replacers = array( $temp_replacer_1, $temp_replacer_2 );
	}

	public function test_add_replacer_add_replacer_to_manager() {
		$this->replacer_manager->add_replacer( $this->temp_replacers[0] );

		$this->assertAttributeContains( $this->temp_replacers[0], 'replacers', $this->replacer_manager );
	}

	public function test_remove_replacer_remove_the_replacer_with_given_name() {
		$this->replacer_manager = new Embed_Replacer_Manager( $this->temp_replacers );

		$this->replacer_manager->remove_replacer( 'temp_1' );

		$this->assertEquals( count( $this->replacer_manager->get_replacers() ), 1 );
	}

	public function test_get_replacers_return_added_replacers() {
		$this->replacer_manager = new Embed_Replacer_Manager( $this->temp_replacers );

		$this->assertEquals( count( $this->replacer_manager->get_replacers() ), 2 );
	}
}
