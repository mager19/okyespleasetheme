<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package baseTheme
 */

get_header(); ?>



<?php
if (have_posts()) : ?>

    <div class="search_page pt-4">
        <div class="container mx-auto">
            <div class="flex flex-wrap px-4">
                <div class="w-full">
                    <div class="content__single">
                        <h1 class='title title--4 lg:title--4'>
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('Search Results for: %s', 'okyesplease'), '<span><strong>' . get_search_query() . '</strong></span>');
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto pt-4 pb-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
            <?php
            /* Start the Loop */
            while (have_posts()) : the_post(); ?>
                <?php
                $post_type = get_post_type(get_the_ID());
                ?>
                <div class="item__search">
                    <?php
                    if ($post_type == 'product') { ?>
                        <a href="<?php the_field('external_link'); ?>" target='_blank'>
                        <?php
                    } else { ?>
                            <a href="<?php the_permalink(); ?>" target='_blank'>
                            <?php
                        }
                        if (has_post_thumbnail()) { ?>
                                <figure><?php the_post_thumbnail(); ?></figure>
                            <?php
                        }
                            ?>

                            <h5 class='capitalize font-semibold'><?php echo $post_type;  ?></h5>
                            <h3 class="title title--4"><?php the_title(); ?></h3>
                            <?php
                            if (get_the_content()) { ?>
                                <p><?php echo wp_trim_words(get_the_content(), 20, ' ...'); ?></p>
                            <?php
                            }
                            ?>

                            </a>
                </div>


            <?php endwhile; ?>
        </div>
    </div>


    <!-- Pagination -->
    <?php if (function_exists('okyesplease__pagination')) : ?>
        <div class="pagination">
            <?php baseTheme__pagination($posts->max_num_pages, "", $paged); ?>
        </div>
    <?php endif; ?>
    <!-- End Pagination -->

<?php
else :
    echo '<p>Sorry, but nothing matched your search terms. Please try again with some different keywords</p>';
    get_search_form();
endif; ?>



<?php
get_footer();
