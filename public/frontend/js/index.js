 $('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  autoplay: true,
  navText: [
    "<i class='fa-solid fa-caret-left'></i>",
    "<i class='fa-solid fa-caret-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
      autoHeight: false,
    autoHeightClass: 'owl-height',
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
})
  // add all to same gallery
  $(".gallery a").attr("data-fancybox","mygallery");
  // assign captions and title from alt-attributes of images:
  $(".gallery a").each(function(){
    $(this).attr("data-caption", $(this).find("img").attr("alt"));
    $(this).attr("title", $(this).find("img").attr("alt"));
  });
 $(".gallery a").fancybox();


