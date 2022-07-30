<?php
/**
 * The admin bootstrap of the plugin.
 *
 * @since      1.0.0
 * @package    Academy
 * @subpackage Academy\Admin
 * @author     Pratik <pratik_deshmukh28@yahoo.com>
 */

namespace Academy\Admin;

use Academy\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Admin_Init class.
 *
 * @codeCoverageIgnore
 */
class Admin_Init {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		$this->run(
			[
				new CPT(),
				new Taxonomy(),
				new Allow_SVG(),
			]
		);

		/**
		 * Fires when admin is loaded.
		 */
		$this->do_action( 'admin/loaded' );
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
