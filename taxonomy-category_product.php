<?php

/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package baseTheme
 */

get_header(); ?>

<?php
$queried_object = get_queried_object();

?>

<div class="container mx-auto">

    <div class="flex">
        <div class="w-full mx-auto px-4 mt-8">
            <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
        </div>
    </div>

</div>


<div class="container mx-auto mt-8">
    <div class='lg:w-full mx-auto grid__products grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-4 mb-8 lg:mt-2 lg:mb-12'>
        <?php foreach ($posts as $post) : setup_postdata($post); ?>

            <div class="item__products flex flex-wrap">
                <div class="w-full">
                    <figure>
                        <a href="<?php the_field('external_link'); ?>" target='_blank'>
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </figure>
                </div>
                <div class="w-full px-4 lg:px-8 flex items-start">
                    <div class="content pt-4">
                        <h4 class="title ">
                            <a href="<?php the_field('external_link'); ?>" target='_blank'>
                                <?php echo wp_trim_words(get_the_title(), 7, '...'); ?>
                            </a>
                        </h4>

                        <!-- Collections -->
                        <?php
                        $collections = get_posts(array(
                            'post_type' => 'collection',
                            'meta_query' => array(
                                array(
                                    'key' => 'products_in_collections', // name of custom field
                                    'value' => '"' . $post->ID . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                                    'compare' => 'LIKE'
                                )
                            )
                        ));
                        if ($collections) {

                        ?>
                            <div class="tags flex flex-wrap gap-x-3 pb-0">
                                <?php
                                foreach ($collections as $collection) :
                                    $slug = get_post_field('post_name', $collection->ID);

                                ?>
                                    <a href="<?php echo esc_url(get_bloginfo('url'));  ?>/collections/<?php echo $slug; ?>/">
                                        <span class='cat-tag'><?php echo $collection->post_title; ?></span>
                                    </a>
                                <?php
                                endforeach; ?>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        $terms = get_the_terms(get_the_ID(), 'category_product');
                        if ($terms) { ?>
                            <div class="tags flex flex-wrap gap-x-3 pb-4">
                                <?php
                                foreach ($terms as $term) : ?>

                                    <?php if ($term->parent !== 0) {
                                        $term_object = get_term($term->parent);
                                        $term_object->slug;

                                        $url = esc_url(get_bloginfo('url')) . '/category_product/' .  $term_object->slug . '/' . $term->slug . '/';
                                    } else {
                                        $url = esc_url(get_bloginfo('url')) . '/category_product/' . $term->slug;
                                    } ?>
                                    <a href="<?php echo $url; ?>">
                                        <span class='cat-tag cat-<?php echo $term->term_id ?>'><?php echo $term->name; ?></span>
                                    </a>
                                <?php
                                endforeach; ?>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>

            </div>
        <?php endforeach;
        wp_reset_postdata(); ?>
    </div>
</div><!-- #main -->
<?php
get_footer();
