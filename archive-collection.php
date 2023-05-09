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

<?php $background = get_field('background_collections', 'option');
?>
<!-- <div class="single__header__collection bgSettings" style='background-image: url(<?php echo $background; ?>); '>
    <div class="container mx-auto">
        <div class="flex flex-wrap px-4">
            <div class="w-full header__collection">
                <div class="content__single">
                    <h1 class='title title--4 lg:title--3'>Collections</h1>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container mx-auto">
    <div class="flex flex-wrap px-4 pt-8">
        <div class="w-full">
            <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
        </div>
    </div>
</div>

<div class="grid__collections">
    <div class="container mx-auto">
        <?php
        $args = array('post_type' => 'collection', 'posts_per_page' => -1);
        $loop = new WP_Query($args);
        if ($loop->have_posts()) : ?>

            <div class="grid__collections__container px-4 py-8 lg:py-14">
                <?php $counter = 1; ?>
                <?php
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="item__collection item--<?php echo $counter; ?>">
                        <a href="<?php the_permalink(); ?>">
                            <figure>
                                <?php $featuredImage = get_field('featured_image');

                                if ($featuredImage) {
                                    fps_get_Image($featuredImage);
                                } else {
                                    the_post_thumbnail();
                                }
                                ?>
                            </figure>
                            <div class="content">
                                <h3 class="title mt-3 mb-1">
                                    <?php the_title(); ?>
                                </h3>
                                <p>
                                    <?php echo wp_trim_words(get_the_content(), 10, '...'); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <?php $counter++; ?>
                <?php endwhile; ?>
                <!-- post navigation -->
            </div>
        <?php else : ?>
            <!-- no posts found -->
        <?php endif; ?>
        <?php wp_reset_query(); ?>



    </div>
</div>

<?php
get_footer();
