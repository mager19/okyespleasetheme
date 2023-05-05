<?php

/**
 * The template for displaying all single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package baseTheme
 */

get_header(); ?>

<?php
if (has_post_thumbnail()) {
    $background = get_the_post_thumbnail_url();
} else {
    $background = get_field('background_collections', 'option');
}
?>

<div class="single__header__collection bgSettings" style='background-image: url(<?php echo $background; ?>); '>
    <div class="container mx-auto">
        <div class="flex flex-wrap px-4">
            <div class="w-full  header__collection">
                <div class="content__single">
                    <h1 class='title title--4 lg:title--3'><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto">
    <div class="flex flex-wrap px-4 pt-8">
        <div class="w-full lg:w-10/12 mx-auto lg:pb-4">
            <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
        </div>
    </div>
</div>
<?php $posts = get_field('products_in_collections'); ?>
<?php if ($posts) : ?>
    <div class="container mx-auto">
        <?php
        $introContent = get_the_content();
        if ($introContent) { ?>
            <div class="flex">
                <div class="w-full lg:w-10/12 mx-auto px-4 pb-6">
                    <p><?php echo $introContent; ?></p>
                </div>
            </div>
        <?php
        } ?>

        <div class='lg:w-10/12 mx-auto grid__products grid gap-4 grid-cols-1 px-4 mb-8 lg:mt-2 lg:mb-12'>
            <?php foreach ($posts as $post) : setup_postdata($post); ?>
                <div class="item__products flex flex-wrap">
                    <div class="w-full lg:w-5/12 imageProduct">
                        <figure>
                            <a href="<?php the_field('external_link'); ?>" target='_blank'>
                                <?php the_post_thumbnail(); ?>
                            </a>
                        </figure>
                    </div>
                    <div class="w-full lg:w-7/12 px-4 lg:px-8 flex items-center">
                        <div class="content">
                            <h4 class="title">
                                <a href="<?php the_field('external_link'); ?>" target='_blank'>
                                    <?php the_title(); ?>
                                </a>
                            </h4>
                            <?php

                            $post_content = get_the_content();

                            ?>
                            <p>
                            <?php echo $post_content; ?>
                            </p>
                            
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'category_product');
                            if ($terms) { ?>
                                <div class="tags flex flex-wrap gap-x-3 pb-4">
                                    <?php
                                    foreach ($terms as $term) : ?>
                                        <a href="<?php echo esc_url(get_bloginfo('url'));  ?>/category_product/<?php echo $term->slug; ?>/">
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
    </div>
<?php endif; ?>


<?php
get_footer();
