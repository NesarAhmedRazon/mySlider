jQuery.noConflict();
(function ($) {
  $(function () {
    let h = 8;
    let w = 16;
    $(window).on("load", function () {
      $(".postcard").first().find(".postcard_body").addClass("show");
    });
    $(".postcard .sliderContainer .slider").on("click", function () {
      console.log("clicked");
      $(this)
        .closest(".postcard")
        .siblings()
        .find(".postcard_body")
        .removeClass("show");
      $(this).closest(".postcard").find(".postcard_body").toggleClass("show");
    });

    //Slider Init
    $(".slider").outerHeight((h / w) * $(".slider").outerWidth());
    $(window).on("resize", function () {
      $(".slider").outerHeight((h / w) * $(".slider").outerWidth());
    });

    $(".sliderContainer .prev").on("click", function () {
      $(this).closest(".postcard").find(".slider").slick("slickPrev");
    });
    $(".sliderContainer .next").on("click", function () {
      $(this).closest(".postcard").find(".slider").slick("slickNext");
    });

    $(".sliderNavcontainer .prev").on("click", function () {
      $(this).closest(".postcard").find(".slider-nav").slick("slickPrev");
    });
    $(".sliderNavcontainer .next").on("click", function () {
      $(this).closest(".postcard").find(".slider-nav").slick("slickNext");
    });

    $(".slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      lazyLoad: "ondemand",
      cssEase: "linear",
      asNavFor: ".slider-nav",
    });
    $(".slider-nav").slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      arrows: false,
      centerMode: true,
      focusOnSelect: true,
    });
  });
})(jQuery);
