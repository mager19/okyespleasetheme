<?php

/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package baseTheme
 */
?>
<!doctype html>

<html <?php language_attributes(); ?>>

<head>


    <!--/Google Tag Manager-->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" href="<?php the_field('okyesplease_favicon', 'option'); ?>">

    <!--/Favicon-->
    <meta name="msapplication-TileColor" content="#d65a45">
    <meta name="theme-color" content="#d65a45">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site overflow-x-hidden">

        <!-- Header -->
        <header id="masthead" class="site-header bg-white lg:px-0  pt-4 pb-4">
            <div class="w-full lg:w-screen mx-auto">
                <div class="flex flex-wrap header__container py-4 pb-6 px-4 justify-center items-center">
                    <div class="sitelogo w-9/12 lg:w-3/12 lg:flex lg:items-center ">
                        <?php
                        $GETlogo = get_field('logo_site', 'option'); ?>
                        <a href="<?php echo esc_url(get_bloginfo('url')); ?>">
                            <?php if ($GETlogo) {
                                fps_get_Image($GETlogo);
                            } else {
                                echo "<h3 class='mb-0'>Logo Brand</h3>";
                            } ?>
                        </a>
                    </div>

                    <div class="menu__content lg:w-5/12 flex justify-between items-center mt-4 lg:mt-2">
                        <!--Menu-->
                        <?php
                        if (has_nav_menu('menu-1')) { ?>
                            <div class="site__nav site__nav--main w-full hidden lg:flex ">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'menu-1',
                                ));
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                        <!--/Menu-->
                    </div>

                    <div class="w-3/12 lg:w-4/12 lg:pr-4 flex justify-between lg:justify-end  search-header ">
                        <!-- Button trigger mobile -->
                        <button type="button" class="mobile-nav p-0 border-none lg:hidden" id="menumobile" data-izimodal-open="#modal-custom-1b">
                            <svg width="28px" height="28px" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 7C4 6.44771 4.44772 6 5 6H24C24.5523 6 25 6.44771 25 7C25 7.55229 24.5523 8 24 8H5C4.44772 8 4 7.55229 4 7Z" fill="black" />
                                <path d="M4 13.9998C4 13.4475 4.44772 12.9997 5 12.9997L16 13C16.5523 13 17 13.4477 17 14C17 14.5523 16.5523 15 16 15L5 14.9998C4.44772 14.9998 4 14.552 4 13.9998Z" fill="black" />
                                <path d="M5 19.9998C4.44772 19.9998 4 20.4475 4 20.9998C4 21.552 4.44772 21.9997 5 21.9997H22C22.5523 21.9997 23 21.552 23 20.9998C23 20.4475 22.5523 19.9998 22 19.9998H5Z" fill="black" />
                            </svg>
                        </button>

                        <form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 487.95 487.95" style="enable-background:new 0 0 487.95 487.95;" xml:space="preserve">
                                <path d="M481.8,453l-140-140.1c27.6-33.1,44.2-75.4,44.2-121.6C386,85.9,299.5,0.2,193.1,0.2S0,86,0,191.4s86.5,191.1,192.9,191.1
                                        c45.2,0,86.8-15.5,119.8-41.4l140.5,140.5c8.2,8.2,20.4,8.2,28.6,0C490,473.4,490,461.2,481.8,453z M41,191.4
                                        c0-82.8,68.2-150.1,151.9-150.1s151.9,67.3,151.9,150.1s-68.2,150.1-151.9,150.1S41,274.1,41,191.4z" />
                            </svg>
                            <input type="text" value="" name="s" class="search-field" autocomplete="false" placeholder="Search" />
                        </form>

                    </div>

                    <div class="sitelogo w-full mt-4 hidden flex items-center ">
                        <?php
                        $GETlogo = get_field('logo_site', 'option'); ?>
                        <a href="<?php echo esc_url(get_bloginfo('url')); ?>">
                            <?php if ($GETlogo) {
                                fps_get_Image($GETlogo);
                            } else {
                                echo "<h3 class='mb-0'>Logo Brand</h3>";
                            } ?>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!--/ Header -->

        <!-- Content Page -->
        <div id="content" class="site-content">