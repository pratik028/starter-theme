<?php
/**
 * The admin bootstrap of the plugin.
 *
 * @since      1.0.0
 * @package    Academy
 * @subpackage Academy\Admin
 * @author     Pratik <pratik_deshmukh28@yahoo.com>
 */

namespace Academy\Frontend;

use Academy\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Assets class.
 *
 * @codeCoverageIgnore
 */
class Setup {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function hooks() {
		$this->action( 'after_setup_theme', 'after_setup_theme' );
	}

	/**
	 * After setup theme.
	 */
	public function after_setup_theme() {
		add_theme_support( 'wp-block-styles' );

		require_once( ACADEMY_PATH . '/vendor/autoload.php' );
		\Carbon_Fields\Carbon_Fields::boot();

		new \Academy\Blocks\Blocks();
		new \Academy\Shortcodes();
	}
}
