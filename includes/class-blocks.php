<?php
/**
 * The admin bootstrap of the plugin.
 *
 * @since      1.0.0
 * @package    Academy
 * @subpackage Academy\Admin
 * @author     Pratik <pratik_deshmukh28@yahoo.com>
 */

namespace Academy\Blocks;

use Academy\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Blocks class.
 *
 * @codeCoverageIgnore
 */
class Blocks {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->action( 'carbon_fields_register_fields', 'register_blocks' );
	}

	public function register_blocks() {
		// $this->run(
		// 	[
		// 	]
		// );
	}

	/**
	 * Run all the runners.
	 *
	 * @param array $runners Instances of runner classes.
	 */
	private function run( $runners ) {
		foreach ( $runners as $runner ) {
			$runner->register();
		}
	}
}
