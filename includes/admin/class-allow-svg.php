<?php
/**
 * The code to allow SVG Image upload on the site.
 */

namespace Academy\Admin;

use Academy\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Allow_SVG class.
 *
 * @codeCoverageIgnore
 */
class Allow_SVG {

	use Hooker;

	/**
	 * Register hooks.
	 */
	public function hooks() {
		$this->filter( 'wp_check_filetype_and_ext', 'check_filetype', 10, 4 );
		$this->filter( 'upload_mimes', 'upload_mimes' );
		$this->action( 'admin_head', 'fix_svg' );
	}

	public function check_filetype( $data, $file, $filename, $mimes ) {
		global $wp_version;
		if ( $wp_version !== '4.7.1' ) {
			return $data;
		}

		$filetype = wp_check_filetype( $filename, $mimes );

		return [
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename']
		];
	}

	public function upload_mimes( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	public function fix_svg() {
		echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
	}
}
