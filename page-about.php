<?php

/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package baseTheme
 */

get_header(); ?>

<div class="container mx-auto">
    <div class="flex flex-wrap px-4">
        <!--Breadcrumbs-->
        <div class="w-full pt-8 flex justify-start">
            <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
        </div>
        <!--/Breadcrumbs-->
    </div>
</div>

<div class="content__page content__about py-8">
    <div class="container mx-auto">
        <div class="flex flex-wrap px-4">
            <div class="content__about__left w-full lg:w-1/2">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_post_thumbnail(); ?>

                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            </div>
            <div class="content__aboust__right w-full lg:w-1/2 flex flex-wrap items-center">
                <div class="content">

                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>






<?php
get_footer();
