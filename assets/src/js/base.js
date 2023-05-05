//Run Functions Theme
import $ from "jquery";
window.$ = window.jQuery = $;
import "slick-carousel";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

import "izimodal";
import "iziModal/css/iziModal.min.css";
import "iziModal/js/iziModal.min.js";

(function ($) {
    // Slick
    $(".slickDemo").slick({
        arrows: true,
        infinite: true,
        slidesToShow: 1,
        dots: true,
        slidesToScroll: 1,
        mobileFirst: true,
        autoplaySpeed: 3000,
        autoplay: true,
        speed: 500,
    });

    jQuery(function () {
        /* Instantiating iziModal */
        jQuery(".modalMenu").iziModal({});
    });
})(jQuery);
