$(document).ready(function(){
	$('.top-banner-slider').slick({
    dots:true,
    arrows:false,
    autoplay:true,
    infinite:true,
    speed: 1000,
    slidesToShow: 1,
     autoplaySpeed:2000,
    slidesToScroll:1,
    adaptiveHeight: true,
    responsive: [
    {
      breakpoint: 991,
      settings: {
         slidesToShow: 1,
      }
    },
    {
      breakpoint: 767,
      settings: {
         slidesToShow: 1,
         dots:false,

      }
    },
  ]
});
$('.recent-offer').slick({
    dots:true,
    arrows:false,
    autoplay:true,
    infinite:true,
    speed: 500,
    slidesToShow: 7,
     autoplaySpeed:500,
    slidesToScroll:1,
    adaptiveHeight: true,
    responsive: [
  
     {
      breakpoint: 1580,
      settings: {
         slidesToShow: 6,
          dots:false,

      }
    },
    {
      breakpoint: 1400,
      settings: {
         slidesToShow: 5,
          dots:false,

      }
    },
      {
      breakpoint: 991,
      settings: {
         slidesToShow: 4,
         dots:false,
      }
    },
    {
      breakpoint: 767,
      settings: {
         slidesToShow: 2,
          dots:false,

      }
    },
     {
      breakpoint: 575,
      settings: {
         slidesToShow: 1,
          dots:false,

      }
    },
  ]
});

$('.slider-fresh-3c').slick({
    dots:false,
    arrows:true,
    autoplay:true,
    infinite:true,
    speed: 1000,
    slidesToShow: 4,
     autoplaySpeed:1000,
    slidesToScroll:1,
    adaptiveHeight: true,
    responsive: [
    {
      breakpoint: 991,
      settings: {
         slidesToShow: 2,
      }
    },
    {
      breakpoint: 767,
      settings: {
         slidesToShow: 1,
         arrows:false,

      }
    },
  ]
});

$('.slider-shop-status').slick({
    dots:true,
    arrows:false,
    autoplay:true,
    infinite:true,
    speed: 1000,
    slidesToShow: 1,
     autoplaySpeed:2000,
    slidesToScroll:1,
    adaptiveHeight: true,
    responsive: [
    {
      breakpoint: 991,
      settings: {
         slidesToShow: 1,
      }
    },
    {
      breakpoint: 767,
      settings: {
         slidesToShow: 1,
         dots:false,

      }
    },
  ]
});


});






