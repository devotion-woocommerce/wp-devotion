<?php
// Register Location Custom Post Type
function location_post_type() {

	$labels = array(
		'name'                  => _x( 'Locations', 'Post Type General Name', 'devotion' ),
		'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'devotion' ),
		'menu_name'             => __( 'Locations', 'devotion' ),
		'name_admin_bar'        => __( 'Locations', 'devotion' ),
		'archives'              => __( 'Item Archives', 'devotion' ),
		'parent_item_colon'     => __( 'Parent Stroe:', 'devotion' ),
		'all_items'             => __( 'All Locations', 'devotion' ),
		'add_new_item'          => __( 'Add New Location', 'devotion' ),
		'add_new'               => __( 'Add New', 'devotion' ),
		'new_item'              => __( 'New Location', 'devotion' ),
		'edit_item'             => __( 'Edit Location', 'devotion' ),
		'update_item'           => __( 'Update Location', 'devotion' ),
		'view_item'             => __( 'View Location', 'devotion' ),
		'search_items'          => __( 'Search Location', 'devotion' ),
		'not_found'             => __( 'Not found', 'devotion' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'devotion' ),
		'featured_image'        => __( 'Featured Image', 'devotion' ),
		'set_featured_image'    => __( 'Set featured image', 'devotion' ),
		'remove_featured_image' => __( 'Remove featured image', 'devotion' ),
		'use_featured_image'    => __( 'Use as featured image', 'devotion' ),
		'insert_into_item'      => __( 'Insert into item', 'devotion' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'devotion' ),
		'items_list'            => __( 'Items list', 'devotion' ),
		'items_list_navigation' => __( 'Items list navigation', 'devotion' ),
		'filter_items_list'     => __( 'Filter items list', 'devotion' ),
	);


	$args = array(
		'label'                 => __( 'Locations', 'devotion' ),
		'description'           => __( 'Location post type.', 'devotion' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'country', 'city' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
    'rewrite'               => array('slug' => __( 'locations', 'devotion' )),
	);
	register_post_type( 'location', $args );

}
add_action( 'init', 'location_post_type', 0 );

// Register City Custom Taxonomy
function location_cities_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Cities', 'Taxonomy General Name', 'devotion' ),
		'singular_name'              => _x( 'City', 'Taxonomy Singular Name', 'devotion' ),
		'menu_name'                  => __( 'City', 'devotion' ),
		'all_items'                  => __( 'All Items', 'devotion' ),
		'parent_item'                => __( 'Parent Item', 'devotion' ),
		'parent_item_colon'          => __( 'Parent Item:', 'devotion' ),
		'new_item_name'              => __( 'New Item Name', 'devotion' ),
		'add_new_item'               => __( 'Add New Item', 'devotion' ),
		'edit_item'                  => __( 'Edit Item', 'devotion' ),
		'update_item'                => __( 'Update Item', 'devotion' ),
		'view_item'                  => __( 'View Item', 'devotion' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'devotion' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'devotion' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'devotion' ),
		'popular_items'              => __( 'Popular Items', 'devotion' ),
		'search_items'               => __( 'Search Items', 'devotion' ),
		'not_found'                  => __( 'Not Found', 'devotion' ),
		'no_terms'                   => __( 'No items', 'devotion' ),
		'items_list'                 => __( 'Items list', 'devotion' ),
		'items_list_navigation'      => __( 'Items list navigation', 'devotion' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'city', array( 'location' ), $args );

}
add_action( 'init', 'location_cities_taxonomy', 0 );

// Register Country Custom Taxonomy
function location_countries_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Countries', 'Taxonomy General Name', 'devotion' ),
		'singular_name'              => _x( 'Country', 'Taxonomy Singular Name', 'devotion' ),
		'menu_name'                  => __( 'Country', 'devotion' ),
		'all_items'                  => __( 'All Items', 'devotion' ),
		'parent_item'                => __( 'Parent Item', 'devotion' ),
		'parent_item_colon'          => __( 'Parent Item:', 'devotion' ),
		'new_item_name'              => __( 'New Item Name', 'devotion' ),
		'add_new_item'               => __( 'Add New Item', 'devotion' ),
		'edit_item'                  => __( 'Edit Item', 'devotion' ),
		'update_item'                => __( 'Update Item', 'devotion' ),
		'view_item'                  => __( 'View Item', 'devotion' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'devotion' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'devotion' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'devotion' ),
		'popular_items'              => __( 'Popular Items', 'devotion' ),
		'search_items'               => __( 'Search Items', 'devotion' ),
		'not_found'                  => __( 'Not Found', 'devotion' ),
		'no_terms'                   => __( 'No items', 'devotion' ),
		'items_list'                 => __( 'Items list', 'devotion' ),
		'items_list_navigation'      => __( 'Items list navigation', 'devotion' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'country', array( 'location' ), $args );

}
add_action( 'init', 'location_countries_taxonomy', 0 );

class Location_Info_Meta_Box {

	public function __construct() {

		if ( is_admin() ) {
			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}

	}

	public function init_metabox() {

		add_action( 'add_meta_boxes', array( $this, 'add_metabox'  )        );
		add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'location_info',
			__( 'Location Info', 'devotion' ),
			array( $this, 'render_metabox' ),
			'location',
			'advanced',
			'default'
		);

	}

	public function render_metabox( $post ) {

		// Add nonce for security and authentication.
		wp_nonce_field( 'location_nonce_action', 'location_nonce' );

		// Retrieve an existing value from the database.
		$location_address = get_post_meta( $post->ID, 'location_address', true );
    $location_telephone = get_post_meta( $post->ID, 'location_telephone', true );
    $location_email = get_post_meta( $post->ID, 'location_email', true );
    $location_hours = get_post_meta( $post->ID, 'location_hours', true );
    $location_map = get_post_meta( $post->ID, 'location_map', true );

		// Set default values.
		if( empty( $location_address ) ) $location_address = '';
    if( empty( $location_telephone ) ) $location_telephone = '';
    if( empty( $location_email ) ) $location_email = '';
    if( empty( $location_hours ) ) $location_hours = '';
    if( empty( $location_map ) ) $location_map = '';

		// Form fields.
		echo '<table class="form-table">';

		echo '	<tr>';
		echo '		<th><label for="location_address" class="location_address_label">' . __( 'Address', 'devotion' ) . '</label></th>';
		echo '		<td>';
		echo '			<input type="text" id="location_address" name="location_address" class="location_address_field" placeholder="' . esc_attr__( '', 'devotion' ) . '" value="' . esc_attr__( $location_address ) . '">';
		echo '		</td>';
		echo '	</tr>';

    echo '	<tr>';
    echo '		<th><label for="location_telephone" class="location_telephone_label">' . __( 'Telephone', 'devotion' ) . '</label></th>';
    echo '		<td>';
    echo '			<input type="text" id="location_telephone" name="location_telephone" class="location_telephone_field" placeholder="' . esc_attr__( '', 'devotion' ) . '" value="' . esc_attr__( $location_telephone ) . '">';
    echo '		</td>';
    echo '	</tr>';

    echo '	<tr>';
    echo '		<th><label for="location_email" class="location_email_label">' . __( 'E-mail', 'devotion' ) . '</label></th>';
    echo '		<td>';
    echo '			<input type="text" id="location_email" name="location_email" class="location_email_field" placeholder="' . esc_attr__( '', 'devotion' ) . '" value="' . esc_attr__( $location_email ) . '">';
    echo '		</td>';
    echo '	</tr>';

    echo '	<tr>';
    echo '		<th><label for="location_hours" class="location_hours_label">' . __( 'Hours', 'devotion' ) . '</label></th>';
    echo '		<td>';
    echo '			<input type="text" id="location_hours" name="location_hours" class="location_hours_field" placeholder="' . esc_attr__( '', 'devotion' ) . '" value="' . esc_attr__( $location_hours ) . '">';
    echo '		</td>';
    echo '	</tr>';

    echo '	<tr>';
    echo '		<th><label for="location_map" class="location_map_label">' . __( 'Map', 'devotion' ) . '</label></th>';
    echo '		<td>';
    echo '			<input type="text" id="location_map" name="location_map" class="location_map_field" placeholder="' . esc_attr__( '', 'devotion' ) . '" value="' . esc_attr__( $location_map ) . '">';
    echo '		</td>';
    echo '	</tr>';

		echo '</table>';

	}

	public function save_metabox( $post_id, $post ) {

		// Add nonce for security and authentication.
		$nonce_name   = $_POST['location_nonce'];
		$nonce_action = 'location_nonce_action';

		// Check if a nonce is set.
		if ( ! isset( $nonce_name ) )
			return;

		// Check if a nonce is valid.
		if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) )
			return;

		// Check if the user has permissions to save data.
		if ( ! current_user_can( 'edit_post', $post_id ) )
			return;

		// Check if it's not an autosave.
		if ( wp_is_post_autosave( $post_id ) )
			return;

		// Check if it's not a revision.
		if ( wp_is_post_revision( $post_id ) )
			return;

		// Sanitize user input.
		$location_new_address = isset( $_POST[ 'location_address' ] ) ? sanitize_text_field( $_POST[ 'location_address' ] ) : '';
    $location_new_telephone = isset( $_POST[ 'location_telephone' ] ) ? sanitize_text_field( $_POST[ 'location_telephone' ] ) : '';
    $location_new_email = isset( $_POST[ 'location_email' ] ) ? sanitize_text_field( $_POST[ 'location_email' ] ) : '';
    $location_new_hours = isset( $_POST[ 'location_hours' ] ) ? sanitize_text_field( $_POST[ 'location_hours' ] ) : '';
    $location_new_map = isset( $_POST[ 'location_map' ] ) ? sanitize_text_field( $_POST[ 'location_map' ] ) : '';

		// Update the meta field in the database.
		update_post_meta( $post_id, 'location_address', $location_new_address );
    update_post_meta( $post_id, 'location_telephone', $location_new_telephone );
    update_post_meta( $post_id, 'location_email', $location_new_email );
    update_post_meta( $post_id, 'location_hours', $location_new_hours );
    update_post_meta( $post_id, 'location_map', $location_new_map );

	}

};

new Location_Info_Meta_Box;

?>
