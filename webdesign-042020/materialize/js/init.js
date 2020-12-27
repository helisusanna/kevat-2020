(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $(".dropdown-trigger").dropdown();
    $('.materialboxed').materialbox();
    $('input.autocomplete').autocomplete({
      data: {
        "Apple": null,
        "Microsoft": null,
        "Google": 'https://placehold.it/250x250'
      },
    });

    $('.carousel.carousel-slider').carousel({
      indicators: true,
    });
    $('.carousel.carousel-slider').carousel();
    setInterval(function() {
      $('.carousel').carousel('next');
    }, 6000);

    $(document).ready(function() {
      $('input#input_text, textarea#textarea2').characterCounter();
    });

  }); // end of document ready

})(jQuery); // end of jQuery name space
