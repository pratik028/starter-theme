<?php
/**
 * The admin bootstrap of the plugin.
 *
 * @since      1.0.0
 * @package    Theme_Name
 * @subpackage Theme_Name\Admin
 * @author     Pratik <pratik_deshmukh28@yahoo.com>
 */

namespace Theme_Name;

use Theme_Name\Traits\Hooker;

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
		// $this->shortcode( 'theme_name_my_lists', 'my_lists' );
	}
}
