<?php
/* 
Plugin Name: Gym Fitness - Post Types
Plugin URI:
Description: Adds a new Post type to the admin panel in WordPress
Version: 1.0
Author: Roi Ravia
Text Domain: gym-fitness
*/

if (!defined('ABSPATH')) die();


// Register new Custom Post Type
function gymFitness_class_post_type()
{

    $labels = array(
        'name'                  => _x('Classes', 'Post Type General Name', 'gym-fitness'),
        'singular_name'         => _x('Class', 'Post Type Singular Name', 'gym-fitness'),
        'menu_name'             => __('Classes', 'gym-fitness'),
        'name_admin_bar'        => __('Classes', 'gym-fitness'),
        'archives'              => __('Archive', 'gym-fitness'),
        'attributes'            => __('Attributes', 'gym-fitness'),
        'parent_item_colon'     => __('Parent Class', 'gym-fitness'),
        'all_items'             => __('All Classes', 'gym-fitness'),
        'add_new_item'          => __('Add Class', 'gym-fitness'),
        'add_new'               => __('Add Class', 'gym-fitness'),
        'new_item'              => __('New Class', 'gym-fitness'),
        'edit_item'             => __('Edit Class', 'gym-fitness'),
        'update_item'           => __('Update Class', 'gym-fitness'),
        'view_item'             => __('View Class', 'gym-fitness'),
        'view_items'            => __('View Class', 'gym-fitness'),
        'search_items'          => __('Search Class', 'gym-fitness'),
        'not_found'             => __('Not found', 'gym-fitness'),
        'not_found_in_trash'    => __('Not found in trash', 'gym-fitness'),
        'featured_image'        => __('Featured Image', 'gym-fitness'),
        'set_featured_image'    => __('Save Featured Image', 'gym-fitness'),
        'remove_featured_image' => __('Remove Featured Image', 'gym-fitness'),
        'use_featured_image'    => __('Use as Featured Image', 'gym-fitness'),
        'insert_into_item'      => __('Insert in Class', 'gym-fitness'),
        'uploaded_to_this_item' => __('Add in Class', 'gym-fitness'),
        'items_list'            => __('Classes List', 'gym-fitness'),
        'items_list_navigation' => __('Navigate to Classes', 'gym-fitness'),
        'filter_items_list'     => __('Filter Classes', 'gym-fitness'),
    );
    $args = array(
        'label'                 => __('Class', 'gym-fitness'),
        'description'           => __('Classes for GymFitness Website', 'gym-fitness'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('gym-fitness_classes', $args);
}
add_action('init', 'gymFitness_class_post_type', 0);

function gymFitness_instructor_post_type()
{

    $labels = array(
        'name'                  => _x('Instructors', 'Post Type General Name', 'gym-fitness'),
        'singular_name'         => _x('Instructor', 'Post Type Singular Name', 'gym-fitness'),
        'menu_name'             => __('Instructors', 'gym-fitness'),
        'name_admin_bar'        => __('Instructors', 'gym-fitness'),
        'archives'              => __('Archive', 'gym-fitness'),
        'attributes'            => __('Attributes', 'gym-fitness'),
        'parent_item_colon'     => __('Parent Instructor', 'gym-fitness'),
        'all_items'             => __('All Instructors', 'gym-fitness'),
        'add_new_item'          => __('Add Instructor', 'gym-fitness'),
        'add_new'               => __('Add Instructor', 'gym-fitness'),
        'new_item'              => __('New Instructor', 'gym-fitness'),
        'edit_item'             => __('Edit Instructor', 'gym-fitness'),
        'update_item'           => __('Update Instructor', 'gym-fitness'),
        'view_item'             => __('View Instructor', 'gym-fitness'),
        'view_items'            => __('View Instructor', 'gym-fitness'),
        'search_items'          => __('Search Instructor', 'gym-fitness'),
        'not_found'             => __('Not found', 'gym-fitness'),
        'not_found_in_trash'    => __('Not found in trash', 'gym-fitness'),
        'featured_image'        => __('Featured Image', 'gym-fitness'),
        'set_featured_image'    => __('Save Featured Image', 'gym-fitness'),
        'remove_featured_image' => __('Remove Featured Image', 'gym-fitness'),
        'use_featured_image'    => __('Use as Featured Image', 'gym-fitness'),
        'insert_into_item'      => __('Insert in Instructor', 'gym-fitness'),
        'uploaded_to_this_item' => __('Add in Instructor', 'gym-fitness'),
        'items_list'            => __('Instructors List', 'gym-fitness'),
        'items_list_navigation' => __('Navigate to Instructors', 'gym-fitness'),
        'filter_items_list'     => __('Filter Instructors', 'gym-fitness'),
    );
    $args = array(
        'label'                 => __('Instructor', 'gym-fitness'),
        'description'           => __('Instructors for GymFitness Website', 'gym-fitness'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('instructors', $args);
}
add_action('init', 'gymFitness_instructor_post_type', 0);



function gymfitness_testimonials()
{

    $labels = array(
        'name'                  => _x('Testimonials', 'Post Type General Name', 'gymfitness'),
        'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'gymfitness'),
        'menu_name'             => __('Testimonials', 'gymfitness'),
        'name_admin_bar'        => __('Testimonial', 'gymfitness'),
        'archives'              => __('Archive', 'gymfitness'),
        'attributes'            => __('Attributes', 'gymfitness'),
        'parent_item_colon'     => __('Parent Testimonial ', 'gymfitness'),
        'all_items'             => __('All Testimonials', 'gymfitness'),
        'add_new_item'          => __('Add Testimonial', 'gymfitness'),
        'add_new'               => __('Add Testimonial', 'gymfitness'),
        'new_item'              => __('New Testimonial', 'gymfitness'),
        'edit_item'             => __('Edit Testimonial', 'gymfitness'),
        'update_item'           => __('Update Testimonial', 'gymfitness'),
        'view_item'             => __('View Testimonial', 'gymfitness'),
        'view_items'            => __('View Testimonials', 'gymfitness'),
        'search_items'          => __('Search Testimonial', 'gymfitness'),
        'not_found'             => __('Not found in Trash', 'gymfitness'),
        'featured_image'        => __('Featured Image', 'gymfitness'),
        'set_featured_image'    => __('Save Featured Image', 'gymfitness'),
        'remove_featured_image' => __('Remove Featured Image', 'gymfitness'),
        'use_featured_image'    => __('Use as Featured Image', 'gymfitness'),
        'insert_into_item'      => __('Insert Into Testimonial', 'gymfitness'),
        'uploaded_to_this_item' => __('Add At Testimonial', 'gymfitness'),
        'items_list'            => __('Testimonial List', 'gymfitness'),
        'items_list_navigation' => __('Navigate toTestimonials', 'gymfitness'),
        'filter_items_list'     => __('Filter Testimonials', 'gymfitness'),
    );
    $args = array(
        'label'                 => __('Testimonials', 'gymfitness'),
        'description'           => __('Testimonials para el Sitio Web', 'gymfitness'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-editor-quote',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('testimonials', $args);
}
add_action('init', 'gymfitness_testimonials', 0);
