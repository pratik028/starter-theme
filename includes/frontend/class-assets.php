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
		wp_enqueue_style( 'theme_name-style', get_stylesheet_uri(), THEME_NAME_VERSION );

		wp_enqueue_style( 'theme_name-main-style', THEME_NAME_URL . 'assets/css/style.css', THEME_NAME_VERSION );

		wp_enqueue_script( 'theme_name-main-script', THEME_NAME_URL . 'assets/js/main.js', [ 'jquery', 'wp-api-fetch' ], THEME_NAME_VERSION, true );

		$this->localize_script();
	}

	public function enqueue_block_editor_assets() {
		wp_enqueue_style( 'theme_name-main-style', THEME_NAME_URL . 'assets/css/style.css', THEME_NAME_VERSION );
	}

	private function localize_script() {
		wp_localize_script(
			'theme_name-main-script',
			'theme_name',
			[
				'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			]
		);
	}
}
