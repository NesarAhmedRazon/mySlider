jQuery.noConflict();
(function ($) {
  $(function () {
    $(".sliderContainer").outerHeight(
      (9 / 16) * $(".sliderContainer").outerWidth()
    );
    $(window).on("resize", function () {
      $(".sliderContainer").outerHeight(
        (9 / 16) * $(".sliderContainer").outerWidth()
      );
    });
    $(".sliderContainer").slick({
      autoplay: true,
      autoplaySpeed: 2000,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      cssEase: "linear",
    });
  });
})(jQuery);
