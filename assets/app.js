jQuery.noConflict();
(function ($) {
  $(function () {
    $(window).on("load", function () {
      // $(".postcard").first().find(".postcard_body").addClass("show");
    });

    //Slider Init
    // $(".slider .slick-slide > div").outerHeight((8 / 16) * $(".slider").outerWidth());
    // $(window).on("resize", function () {
    //   $(".slider").outerHeight((8 / 16) * $(".slider").outerWidth());
    // });

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
      adaptiveHeight: true,
    });
    $(".slider-nav").slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      arrows: false,
      centerMode: true,
      focusOnSelect: true,
      lazyLoad: "ondemand",
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 640,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: true,
            lazyLoad: "progressive",
          },
        },
      ],
    });

    //s$(".slider .slick-slide div").css("transform", "translateY(-25%)");

    $(".slider .slick-slide > div")
      .outerHeight((8 / 16) * $(".slider").outerWidth())
      .children("img")
      .css("margin-top", "-25%");
    $(window).on("resize", function () {
      $(".slider .slick-slide > div")
        .outerHeight((8 / 16) * $(".slider").outerWidth())
        .children("img")
        .css("margin-top", "-25%");
    });
    // $(".postcard .sliderContainer .slider").on("click", function () {
    //   $(this)
    //     .closest(".postcard")
    //     .siblings()
    //     .find(".postcard_body")
    //     .removeClass("show");
    //   $(this).closest(".postcard").find(".postcard_body").toggleClass("show");
    //   let sID = $(this).attr("id");
    //   let slider = document.getElementById(sID);
    //   let slide = slider.getElementsByClassName("slick-slide");
    //   console.log(slide);
    //   slide.forEach(function (element) {
    //     element.firstChild.style.height = "";
    //     element.firstChild.firstChild.style.marginTop = "";
    //     element.parentElement.parentElement.style.height = "";
    //   });
    // });
  });
})(jQuery);
