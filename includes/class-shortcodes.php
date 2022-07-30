<?php
/**
 * The admin bootstrap of the plugin.
 *
 * @since      1.0.0
 * @package    Academy
 * @subpackage Academy\Admin
 * @author     Pratik <pratik_deshmukh28@yahoo.com>
 */

namespace Academy;

use Academy\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Shortcodes class.
 *
 * @codeCoverageIgnore
 */
class Shortcodes {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function __construct() {
		// $this->shortcode( 'academy_my_lists', 'my_lists' );
	}
}
