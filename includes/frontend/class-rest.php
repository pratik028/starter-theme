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

use Academy\Helper;
use Academy\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Rest class.
 *
 * @codeCoverageIgnore
 */
class Rest {

	use Hooker;

	/**
	 * The Constructor.
	 */
	public function hooks() {
		$this->action( 'rest_api_init', 'init_rest_api' );
	}

	/**
	 * Enqueue scripts.
	 */
	public function init_rest_api() {
		register_rest_route(
			'bioDB/v1',
			'/saveAction',
			[
				'methods'             => \WP_REST_Server::CREATABLE,
				'callback'            => [ $this, 'save_action' ],
				'permission_callback' => function() { return is_user_logged_in(); }
			]
		);
	}

	public function save_action( \WP_REST_Request $request ) {
		$post_id = $request->get_param( 'postID' );
		$action  = $request->get_param( 'action' );

		$data = Helper::get_actions_data();
		if ( isset( $data[ $action ] ) && in_array( $post_id, $data[ $action ] ) ) {
			$data[ $action ] = array_diff( $data[ $action ], [ $post_id ] );
		} else {
			$data[ $action ][] = $post_id;
		}

		Helper::update_actions_data( $data );

		return true;
	}
}
