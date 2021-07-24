<?php
/**
 * Plugin Name: Custom post type-ERSS
 * Plugin URI: http://www.mywebsite.com/my-first-plugin
 * Description: Custom post type Plugin
 * Version: 1.0
 * Author: Arun
 * Author URI: http://www.mywebsite.com
 */

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'Testimonials',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'label' => __( 'Category','taxonomy general name'),
            'rewrite' => array('slug' => 'Testimonials'),
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

/*
* Creating a function to create our CPT
*/
 function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'Testimonials', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent Testimonial', 'twentytwenty' ),
        'all_items'           => __( 'All Testimonials', 'twentytwenty' ),
        'view_item'           => __( 'View Testimonial', 'twentytwenty' ),
        'add_new_item'        => __( 'Add New Testimonial', 'twentytwenty' ),
        'add_new'             => __( 'Add New', 'twentytwenty' ),
        'edit_item'           => __( 'Edit Testimonial', 'twentytwenty' ),
        'update_item'         => __( 'Update Testimonial', 'twentytwenty' ),
        'search_items'        => __( 'Search Testimonial', 'twentytwenty' ),
        'not_found'           => __( 'Not Found', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),

    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Testimonials','twentytwenty' ),
        'description'         => __( 'Testimonial news and reviews', 'twentytwenty' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields','page-attributes', 'template' ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),

        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
         
        // This is where we add taxonomies to our CPT
        'taxonomies'          => array( 'category' ),
       
    );
     
    // Registering your Custom Post Type
    register_post_type( 'Testimonials', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );
