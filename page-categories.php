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

<?php $background = get_field('background_categories', 'option');
?>

<div class="single__header__collection bgSettings" style='background-image: url(<?php echo $background; ?>); '>
    <div class="container mx-auto">
        <div class="flex flex-wrap px-4">
            <div class="w-full header__collection">
                <div class="content__single">
                    <h1 class='title title--4 lg:title--3'><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto">
    <div class="flex flex-wrap px-4 pt-8">
        <div class="w-full">
            <?php get_template_part('template-parts/content', 'breadcrumbs'); ?>
        </div>
    </div>
</div>

<div class="grid__categories">
    <div class="container mx-auto">
        <?php $terms = get_terms(array(
            'taxonomy' => 'category_product',
            'parent'   => 0,
            'hide_empty' => true
        )); ?>
        <div class="grid__categories__container grid grid-cols-1 gap-4 px-4 py-8 lg:py-10">
            <?php
            foreach ($terms as $term) {
                setup_postdata($term);
            ?>
                <div class="item__collection__container w-full flex flex-wrap px-4">
                    <div class="item__collection__cat w-full lg:w-5/12">
                        <a href="<?php echo esc_url(get_bloginfo('url'));  ?>/category_product/<?php echo $term->slug; ?>/">
                            <?php $imageCat = get_field('category_image', 'term_' . $term->term_id);
                            ?>
                            <figure>
                                <?php fps_get_Image($imageCat); ?>
                            </figure>
                            <div class="content flex items-center justify-center pl-4">
                                <h2 class="title mt-3 mb-1 flex items-center font-inter">
                                    <?php echo $term->name; ?>
                                    </h3>
                                    <p><?php echo wp_trim_words(get_the_content(), 15, '...'); ?></p>
                            </div>
                        </a>
                    </div>

                    <div class="w-full flex-wrap subCategories lg:w-7/12 flex justify-center content-center  gap-4">
                        <?php $childs = get_terms(array(
                            'taxonomy' => 'category_product',
                            'parent'   => $term->term_id,
                            'hide_empty' => true
                        ));

                        foreach ($childs as $child) {
                            $url = esc_url(get_bloginfo('url')) . '/category_product/' .  $term->slug . '/' . $child->slug . '/';
                        ?>
                            <div class="item__C">
                                <a href="<?php echo $url;
                                            ?>">
                                    <span class='cat-tag cat-<?php echo $term->term_id ?>'><?php echo $child->name; ?></span>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>




            <?php
            }
            ?>
        </div>

    </div>
</div>

<?php
get_footer();
