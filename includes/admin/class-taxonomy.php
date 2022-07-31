<?php
/**
 * The admin-specific functionality of the plugin.
 */

namespace Theme_Name\Admin;

use Theme_Name\Traits\Ajax;
use Theme_Name\Traits\Hooker;
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
			'species-extinction-status' => esc_html__( 'Extinction Status', 'theme_name' ),
			'species-threats'           => esc_html__( 'Threats', 'theme_name' ),
			'species-region'            => esc_html__( 'Region', 'theme_name' ),
			'species-habitat'           => esc_html__( 'Habitat', 'theme_name' ),
			'species-animal-kingdom'    => esc_html__( 'Animal Kingdom', 'theme_name' ),
		];

		foreach ( $taxonomies as $taxonomy => $label ) {
			$labels = [
				'name'              => $label,
				'singular_name'     => $label,
				'search_items'      => sprintf( __( 'Search %s', 'theme_name' ), $label ),
				'all_items'         => sprintf( __( 'All %s', 'theme_name' ), $label ),
				'parent_item'       => sprintf( __( 'Parent %s', 'theme_name' ), $label ),
				'parent_item_colon' => sprintf( __( 'Parent %s:', 'theme_name' ), $label ),
				'edit_item'         => sprintf( __( 'Edit %s', 'theme_name' ), $label ),
				'update_item'       => sprintf( __( 'Update %s', 'theme_name' ), $label ),
				'add_new_item'      => sprintf( __( 'Add New %s', 'theme_name' ), $label ),
				'new_item_name'     => sprintf( __( 'New %s', 'theme_name' ), $label ),
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
		Container::make( 'term_meta', esc_html__( 'Settings', 'theme_name' ) )
		->where( 'term_taxonomy', '=', 'species-animal-kingdom' )
		->add_fields(
			[
				Field::make( 'text', 'count', esc_html__( 'Species Count', 'theme_name' ) ),
				Field::make( 'image', 'image', esc_html__( 'Image', 'theme_name' ) ),
				Field::make( 'text', 'credit', esc_html__( 'Credit', 'theme_name' ) ),
				Field::make( 'text', 'wiki_url', esc_html__( 'Wiki URL', 'theme_name' ) ),
				Field::make( 'rich_text', 'subtitle', esc_html__( 'Sub Title', 'theme_name' ) ),
				Field::make( 'rich_text', 'did_you_know', esc_html__( 'Did You Know?', 'theme_name' ) ),
			]
		);
	}
}
