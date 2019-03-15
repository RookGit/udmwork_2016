$(function () {

    $(window).scroll(function () {

        /*
         if ($(this).scrollTop() > 200) {
         $('.navbar').addClass("navbar2");
         $('.navbar').removeClass("navbar");
         }
         else {
         if ($(this).scrollTop() != 0) {
         $('.navbar2').addClass("navbar");
         $('.navbar2').removeClass("navbar2");
         }
         }
         */

        if ($(this).scrollTop() > 100) {

            $('#toTop').fadeIn();


        } else {

            $('#toTop').fadeOut();

        }

    });

    $('#toTop').click(function () {

        $('body,html').animate({scrollTop: 0}, 800);

    });

});


