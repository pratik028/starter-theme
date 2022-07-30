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
class Assets {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function hooks() {
		$this->action( 'wp_enqueue_scripts', 'enqueue_scripts' );
		$this->action( 'enqueue_block_editor_assets', 'enqueue_block_editor_assets' );
	}

	/**
	 * Enqueue scripts.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'academy-style', get_stylesheet_uri(), ACADEMY_VERSION );

		wp_enqueue_style( 'academy-main-style', ACADEMY_URL . 'assets/css/style.css', ACADEMY_VERSION );

		wp_enqueue_script( 'academy-main-script', ACADEMY_URL . 'assets/js/main.js', [ 'jquery', 'wp-api-fetch' ], ACADEMY_VERSION, true );

		$this->localize_script();
	}

	public function enqueue_block_editor_assets() {
		wp_enqueue_style( 'academy-main-style', ACADEMY_URL . 'assets/css/style.css', ACADEMY_VERSION );
	}

	private function localize_script() {
		wp_localize_script(
			'academy-main-script',
			'academy',
			[
				'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			]
		);
	}
}
