<?php
/**
 * The admin bootstrap of the plugin.
 *
 * @since      1.0.0
 * @package    Theme_Name
 * @subpackage Theme_Name\Admin
 * @author     Pratik <pratik_deshmukh28@yahoo.com>
 */

namespace Theme_Name\Frontend;

use Theme_Name\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Frontend class.
 *
 * @codeCoverageIgnore
 */
class Frontend {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->run(
			[
				new Rest(),
				new Assets(),
				new Setup(),

			]
		);

		/**
		 * Fires when frontend is loaded.
		 */
		$this->do_action( 'frontend/loaded' );
	}

	/**
	 * Run all the runners.
	 *
	 * @param array $runners Instances of runner classes.
	 */
	private function run( $runners ) {
		foreach ( $runners as $runner ) {
			$runner->hooks();
		}
	}
}
