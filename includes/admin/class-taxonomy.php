<?php
/**
 * The admin-specific functionality of the plugin.
 */

namespace Academy\Admin;

use Academy\Traits\Ajax;
use Academy\Traits\Hooker;
use Carbon_Fields\Container;
use Carbon_Fields\Field;

defined( 'ABSPATH' ) || exit;

/**
 * Taxonomy class.
 *
 * @codeCoverageIgnore
 */
class Taxonomy {

	use Hooker, Ajax;

	/**
	 * Register hooks.
	 */
	public function hooks() {
		$this->action( 'init', 'register_taxonomies' );
		$this->action( 'carbon_fields_register_fields', 'register_custom_fields' );
	}

	/**
	 * Register Species post type.
	 */
	public function register_taxonomies() {
		$taxonomies = [
			'species-extinction-status' => esc_html__( 'Extinction Status', 'academy' ),
			'species-threats'           => esc_html__( 'Threats', 'academy' ),
			'species-region'            => esc_html__( 'Region', 'academy' ),
			'species-habitat'           => esc_html__( 'Habitat', 'academy' ),
			'species-animal-kingdom'    => esc_html__( 'Animal Kingdom', 'academy' ),
		];

		foreach ( $taxonomies as $taxonomy => $label ) {
			$labels = [
				'name'              => $label,
				'singular_name'     => $label,
				'search_items'      => sprintf( __( 'Search %s', 'academy' ), $label ),
				'all_items'         => sprintf( __( 'All %s', 'academy' ), $label ),
				'parent_item'       => sprintf( __( 'Parent %s', 'academy' ), $label ),
				'parent_item_colon' => sprintf( __( 'Parent %s:', 'academy' ), $label ),
				'edit_item'         => sprintf( __( 'Edit %s', 'academy' ), $label ),
				'update_item'       => sprintf( __( 'Update %s', 'academy' ), $label ),
				'add_new_item'      => sprintf( __( 'Add New %s', 'academy' ), $label ),
				'new_item_name'     => sprintf( __( 'New %s', 'academy' ), $label ),
				'menu_name'         => $label,
			];

			$args = [
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
				'rewrite'           => [ 'slug' => $taxonomy ],
			];

			register_taxonomy( $taxonomy, [ 'species' ], $args );
		}
	}

	/**
	 * Register Custom fields.
	 */
	public function register_custom_fields() {
		Container::make( 'term_meta', esc_html__( 'Settings', 'academy' ) )
		->where( 'term_taxonomy', '=', 'species-animal-kingdom' )
		->add_fields(
			[
				Field::make( 'text', 'count', esc_html__( 'Species Count', 'academy' ) ),
				Field::make( 'image', 'image', esc_html__( 'Image', 'academy' ) ),
				Field::make( 'text', 'credit', esc_html__( 'Credit', 'academy' ) ),
				Field::make( 'text', 'wiki_url', esc_html__( 'Wiki URL', 'academy' ) ),
				Field::make( 'rich_text', 'subtitle', esc_html__( 'Sub Title', 'academy' ) ),
				Field::make( 'rich_text', 'did_you_know', esc_html__( 'Did You Know?', 'academy' ) ),
			]
		);
	}
}
