<?php

/**
 * TEMPLATE NAME:  New Home Page template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package baseTheme
 */

get_header(); ?>

<div class="homeGrid pt-8 lg:pt-2 lg:pb-2">
    <div class="container mx-auto">
        <?php
        $args = array('post_type' => 'collection', 'posts_per_page' => 4);
        $loop = new WP_Query($args);
        if ($loop->have_posts()) : ?>
            <?php $itemCollection = 1; ?>
            <div class="homeGridContainer px-4 mt-2">
                <?php
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="item__collection item__homeGridCollecton-<?php echo $itemCollection; ?>">
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
                                <!-- hide paragraph
                                <p><?php echo wp_trim_words(get_the_content(), 15, '...'); ?></p>
								-->
                            </div>
                        </a>
                    </div>

                    <?php $itemCollection++; ?>
                <?php endwhile; ?>
                <!-- post navigation -->

                <div class="newsletter__home item__homeGridCollecton-5 bg-[#345C72]">
                    <div class="content px-4">
                        <h3 class="title mb-0 lg:max-w-[600px] text-white font-inter">
                            Sign up for my newsletter to receive a weekly dose of window shopping delivered to your inbox.
                        </h3>

                        <div class="newsletter">
                            <?php the_field('newsletter_form', 'option'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <!-- no posts found -->

        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
</div>

<div class="latest__collections py-8 lg:pt-2 lg:pb-10">
    <div class="container mx-auto">
        <?php
        $args = array('post_type' => 'collection', 'posts_per_page' => 16, 'offset' => 4);
        $loop = new WP_Query($args);
        if ($loop->have_posts()) : ?>
            <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 px-4 mt-2">
                <?php
                while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="item__collection">
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
                                <!-- hide paragraph
                                <p><?php echo wp_trim_words(get_the_content(), 15, '...'); ?></p>
								-->
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                <!-- post navigation -->
            </div>
        <?php else : ?>
            <!-- no posts found -->

        <?php endif; ?>
        <?php wp_reset_query(); ?>

        <div class="flex">
            <div class="w-full lg:w-1/4 mx-auto flex justify-center mt-8">
                <a class="font-bold hover:underline hover:text-dark-1" href="<?php echo esc_url(get_bloginfo('url')); ?>/collections/">All Collections</a>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
