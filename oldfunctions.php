<?php

/**
 * baseTheme First functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package baseTheme
 */


/** Setup **/
require('inc/setup.php');

/** Enqueue scripts and styles.**/
require('inc/scripts.php');

/** Shortcodes Theme **/
require('inc/shortcodes.php');

/**  Custom Pagination Function **/
require('inc/pagination.php');

/**  Social Shared Icons Function **/
require('inc/shared-social.php');

/** Author Fields **/
require('inc/author-fields.php');

/** Yoast Meta Description and page titles **/
require('inc/yoast-meta-description.php');


if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'  => __('Theme Options'),
		'menu_title'  => __('Theme Options'),
		'redirect'    => false,
	));
}

/** ACF Custom functions **/
require('inc/functions/custom-functions.php');




function my_relationship_query($args, $field, $post)
{
	// increase the posts per page
	$args['posts_per_page'] = 25;
	$args['order'] = 'DESC';
	$args['orderby'] = 'date';
	return $args;
}

// filter for a specific field based on it's name
add_filter('acf/fields/relationship/query/name=products_in_collections', 'my_relationship_query', 10, 3);
