// Init fancyBox
$().fancybox({
  selector : '.slick-slide:not(.slick-cloned)',
  hash     : false
});

// Init Slick
$(".main-slider").slick({
  slidesToShow   : 3,
  slidesToScroll : 3,
  infinite : true,
  dots     : false,
  arrows   : false,
  responsive : [
    {
      breakpoint : 960,
      settings : {
        slidesToShow   : 1,
        slidesToScroll : 1
      }
    }
  ]
});
