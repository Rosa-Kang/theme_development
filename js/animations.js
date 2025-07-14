/**
 * File animations.js.
 *
 * Settings for Animate on Scroll (aos) and Mobile Menu.
 * https://github.com/michalsnik/aos/tree/v2
 */
(function ($) {
  $(function () {
    // Start of Popout Menu -------------------------
    $('#toggle').click(function () {
      $('.dimmed').fadeIn(200);
      $('#popout').css({
        '-webkit-transform': 'translateX(0)',
        transform: 'translateX(0)',
      });
    });

    // Detect click outside mobile menu
    $(document).mouseup(function (e) {
      var menu = $('.popout-menu');
      if (!menu.is(e.target) && menu.has(e.target).length === 0) {
        $('.dimmed').fadeOut(200);
        $('#popout').css({
          '-webkit-transform': 'translateX(100%)',
          transform: 'translateX(100%)',
        });
      }
    });

    $('#close-popout').click(function () {
      $('.dimmed').fadeOut(200);
      $('#popout').css({
        '-webkit-transform': 'translateX(100%)',
        transform: 'translateX(100%)',
      });
    });

    // Append button (arrow-down) to mobile menu
    $('.menu-item-has-children').append(
      '<button class="mobile-menu-btn" aria-label="Submenu Button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" width="30px" height="30px"><path d="M0 0h24v24H0V0z" fill="none"/><path class="arrow-down" fill="#231f20" d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"/></svg></button>'
    );

    $('.mobile-menu-btn').click(function () {
      // Display submenu
      $(this).prev('sub-menu').css('left', 'auto');
    });

    $('.menu')
      .find('.menu-item-has-children')
      .click(function () {
        $(this).children('ul').toggleClass('open').slideToggle('fast');
        $(this)
          .toggleClass('active-tab')
          .find('.mobile-menu-btn svg')
          .toggleClass('flip-vertical');
        $('.sub-menu')
          .not($(this).next())
          .not($(this).children())
          .slideUp('fast')
          .removeClass('open');
        $('.menu .accordion-toggle')
          .not($(this))
          .removeClass('active-tab')
          .find('mobile-menu-btn svg')
          .removeClass('flip-vertical');
      });
    // End of Popout Menu -----------------------

    // Start of Animate on Scroll ---------------------
    // Animations added to elements without data-aos attribute in html element
    $('.slider-services p').attr({
      'data-aos': 'fade-zoom-in',
      'data-aos-easing': 'ease',
      'data-aos-offset': '0',
    });


    AOS.init({
      duration: 1300,
      once: true,
      mirror: true,
    });

    $(window).on('load', function () {
      AOS.refresh();
    });
    // End of Animate on Scroll ----------------------
  }); // end of doc ready
})(jQuery);
