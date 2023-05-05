<?php

/**
 * baseTheme First functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package baseTheme
 */


/** Setup **/
require('inc/setup.php');

add_post_type_support('page', 'excerpt');

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
	$args['posts_per_page'] = 22;
	$args['order'] = 'DESC';
	$args['orderby'] = 'date';
	return $args;
}

// filter for a specific field based on it's name
add_filter('acf/fields/relationship/query/name=products_in_collections', 'my_relationship_query', 10, 3);





function wpb_rsstutorial_customfield($content)
{
	global $wp_query;
	$postid = $wp_query->post->ID;

	$content = '<h1 style="margin-block:1.5rem;" class="title title--3">' . $wp_query->post->post_title . '</h1>';

	$theContent = get_the_content($postid);

	$content = $content . '<p style="font-weight:400!important;" >' . $theContent . '</p>';

	$custom_metadata = get_post_meta($postid, 'products_in_collections', true);
	if (is_feed()) {
		if ($custom_metadata !== '') {
			$posts = get_field('products_in_collections', $postid);
			$items = array();
			foreach ($posts as $posta) {
				$item = "<div class='item-product' style='margin-top:2rem;'>";
				$item .= "<h3 class='item-product-title'>" . $posta->post_title . "</h3>";
				$item .= "<p style='font-weight:400!important;'>" . $posta->post_content . "</p>";
				$externalLink = get_field('external_link', $posta->ID);

				$image = "<p class='rss-image'><figure><a href='" . $externalLink   . "' target='_blank'><img style='border:1px solid #4d4d4d!important;' src='" . get_the_post_thumbnail_url($posta->ID) . "' " . "alt='" . $posta->post_title . " ' width='500' height='500' /></a></figure></p>";

				$item .= $image;

				$item .= "</div>";


				$items[] = $item;
			}

			$newLangs = implode($items);

			$content = $content . "<div class='products-list'>" . $newLangs .  "</div>";
		} else {
			$content = $content;
		}
	}
	return $content;
}
add_filter('the_excerpt_rss', 'wpb_rsstutorial_customfield');
add_filter('the_content', 'wpb_rsstutorial_customfield');
