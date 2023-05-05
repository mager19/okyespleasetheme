<?php

/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package baseTheme
 */
?>

</div>
<!--/ Content Page -->

<?php
if (!is_404()) {
    if (!is_home()) {
        get_template_part('template-parts/cta', 'footer');
    }
}
?>

<!-- Footer -->
<footer class="site-footer bg-gray-300">
    <div class="container mx-auto pt-14 pb-8">
        <div class="site__footer__content flex flex-wrap lg:px-4 justify-center lg:justify-start">
            <div class="content w-full flex flex-wrap">
                <div class="site__footer__logo w-full md:w-8/12 mx-auto lg:w-6/12 text-center lg:text-left mb-4">
                    <a href="<?php echo esc_url(get_bloginfo('url')); ?>">
                        <?php $GETlogo = get_field('logo_site', 'option'); ?>
                        <?php if ($GETlogo) {
                            fps_get_Image($GETlogo);
                        } else {
                            echo "<h3 class='mb-0'>Logo Brand</h3>";
                        } ?>
                    </a>

                    <!-- copyright -->
                    <div class="copyright mt-2 mb-0 text-center lg:text-left px-2">
                        <?php the_field('copyright', 'option'); ?>
                    </div>
                    <!--/ copyright -->


                </div>


                <div class="site-footer__bottom w-full lg:w-6/12 flex justify-center lg:justify-end px-2">
                    <div class="newsletter">
                        <?php the_field('newsletter_form', 'option'); ?>
                    </div>
                </div>
            </div>


            <!-- Footer Menu -->
            <div class="w-full footer-menu flex justify-between lg:px-2 mt-4">
                <?php if (has_nav_menu('menu-2')) {
                    wp_nav_menu(array('theme_location' => 'menu-2'));
                } ?>
            </div>
            <!--/Footer Menu-->

        </div>
    </div>
</footer>
<!--/ Footer -->

<div id="modal-custom-1b" class="modalMenu menuModal">
    <div class="modal__header">
        <button data-iziModal-close class="icon-close">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L15 15M1 15L15 1" stroke="#A9E1D3" stroke-width="2" />
            </svg>
        </button>
    </div>

    <div class="modal__content relative">
        <?php
        $GETlogo = get_field('logo_site', 'option'); ?>
        <a href="<?php echo esc_url(get_bloginfo('url')); ?>">
            <figure>
                <?php if ($GETlogo) {
                    fps_get_Image($GETlogo);
                }  ?>
            </figure>
        </a>
        <div class="menuMobileModal flex">
            <!--Menu-->
            <?php
            if (has_nav_menu('menu-1')) { ?>

                <?php
                wp_nav_menu(array('theme_location' => 'menu-1'));
                ?>

            <?php
            }
            ?>
            <!--/Menu-->
        </div>
    </div>

</div>


</div>
<?php wp_footer(); ?>
</body>

</html>