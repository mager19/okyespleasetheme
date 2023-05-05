<?php

/**
 * The template for displaying 404 pages (not found).
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package baseTheme
 */
get_header(); ?>

<div class="container mx-auto py-14">
    <div class="info px-4">
        <div class="flex justify-center mb-4">
            <?php
            $image404 = get_field('404_image', 'option');

            if ($image404) {
                fps_get_Image($image404);
            }
            ?>
        </div>

        <h1 class="text-center title--3 lg:title--2 font-inter">
            <?php esc_html_e(the_field('title_error_page', 'option')); ?>
        </h1>
        <p class="text-black text-center w-full lg:w-2/3 mx-auto"> <?php the_field('description_error_page', 'option'); ?></p>
    </div>
</div>

<?php get_footer();
