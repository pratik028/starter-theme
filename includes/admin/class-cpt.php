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
 * CPT class.
 *
 * @codeCoverageIgnore
 */
class CPT {

	use Hooker, Ajax;

	/**
	 * Register hooks.
	 */
	public function hooks() {
		$this->action( 'init', 'register_post_type' );
		$this->action( 'carbon_fields_register_fields', 'register_custom_fields' );
	}

	/**
	 * Register Species post type.
	 */
	public function register_post_type() {
		$labels = [
			'name'                  => _x( 'Species', 'Post type general name', 'theme_name' ),
			'singular_name'         => _x( 'Species', 'Post type singular name', 'theme_name' ),
			'menu_name'             => _x( 'Species', 'Admin Menu text', 'theme_name' ),
			'name_admin_bar'        => _x( 'Species', 'Add New on Toolbar', 'theme_name' ),
			'add_new'               => __( 'Add New', 'theme_name' ),
			'add_new_item'          => __( 'Add New Species', 'theme_name' ),
			'new_item'              => __( 'New Species', 'theme_name' ),
			'edit_item'             => __( 'Edit Species', 'theme_name' ),
			'view_item'             => __( 'View Species', 'theme_name' ),
			'all_items'             => __( 'All Species', 'theme_name' ),
			'search_items'          => __( 'Search Species', 'theme_name' ),
			'parent_item_colon'     => __( 'Parent Species:', 'theme_name' ),
			'not_found'             => __( 'No species found.', 'theme_name' ),
			'not_found_in_trash'    => __( 'No species found in Trash.', 'theme_name' ),
			'featured_image'        => _x( 'Species Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'theme_name' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'theme_name' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'theme_name' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'theme_name' ),
			'archives'              => _x( 'Species archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'theme_name' ),
			'insert_into_item'      => _x( 'Insert into species', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'theme_name' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this species', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'theme_name' ),
			'filter_items_list'     => _x( 'Filter species list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'theme_name' ),
			'items_list_navigation' => _x( 'Species list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'theme_name' ),
			'items_list'            => _x( 'Species list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'theme_name' ),
		];
	 
		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => [ 'slug' => 'species' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt' ],
		];
	 
		register_post_type( 'species', $args );
	}

	/**
	 * Register Custom fields.
	 */
	public function register_custom_fields() {}
}
