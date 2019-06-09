<?php
function my_theme_enqueue_styles() {
 
    $parent_style = 'twentyseventeen-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


/*
	==========================================
	 Custom Post Type
	==========================================
*/

function event_custom_post_type (){
  
  $labels = array(
    'name' => 'Event',
    'singular_name' => 'Event',
    'add_new' => 'Add New Event',
    'all_items' => 'All Event',
    'add_new_item' => 'Add Item',
    'edit_item' => 'Edit Item',
    'new_item' => 'New Item',
    'view_item' => 'View Item',
    'search_item' => 'Search Item',
    'not_found' => 'No items found',
    'not_found_in_trash' => 'No items found in trash',
    'parent_item_colon' => 'Parent Item'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions',
    ),
    'taxonomies' => array('category', 'post_tag'),
    'menu_position' => 2,
    'exclude_from_search' => false
  );
  register_post_type('events',$args);
}
add_action('init','event_custom_post_type');
?>

<?php
function your_prefix_get_meta_box( $meta_boxes ) {
  $prefix = 'prefix-';

  $meta_boxes[] = array(
    'id' => 'untitled',
    'title' => esc_html__( 'Untitled Metabox', 'metabox-online-generator' ),
    'post_types' => 'events',
    'context' => 'advanced',
    'priority' => 'default',
    'autosave' => 'false',
    'fields' => array(
      array(
        'id' => $prefix . 'url_1',
        'type' => 'url',
        'name' => esc_html__( 'URL', 'metabox-online-generator' ),
      ),
      array(
        'id' => $prefix . 'map_2',
        'type' => 'map',
        'name' => esc_html__( 'Map', 'metabox-online-generator' ),
      ),
      array(
        'id' => $prefix . 'date_3',
        'type' => 'date',
        'name' => esc_html__( 'Date Picker', 'metabox-online-generator' ),
      ),
    ),
  );

  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'your_prefix_get_meta_box' );
?>
