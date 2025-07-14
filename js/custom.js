/**
 * File: custom.js
 *
 * Templates: All
 *
 */
(function ($) {
  $(function () {
    // Start of Auto Add Rel to External Links -------------------
    addTargetBlankToExternalLinks();

    function addTargetBlankToExternalLinks() {
      $('a[href^="http"]')
        .not('a[href*="' + location.hostname + '"]')
        .attr({ target: '_blank', rel: 'noopener noreferrer' });
    }

    // Open all pdfs in a new tab
    $('a[target!="_blank"][href$=".pdf"]').attr({
      target: '_blank',
      title: 'Opens in a new window',
      rel: 'noopener noreferrer',
    });
    // End of Auto Add Rel to External Links ----------------

    // Start of Tabs -------------------
    $('.tabs ul:first-child li:first-child').addClass('is-active');

    $('.tabs-content li:first-child').addClass('is-active');

    $('.tabs ul:first-child li').on('click', function(){
      var tab = $(this).data('tab');

      $('.tabs li').removeClass('is-active');
      $(this).addClass('is-active');

      $('.tabs-content li').removeClass('is-active');
      $('li[data-content="' + tab + '"]').addClass('is-active');
    });
    // End of Tabs ---------------------

    // Start of Accordions - Service & Jobs -------------------------
    $('.accordion-container .accordion-header').on('click', function () {
      if ($(this).next('.accordion-body').css('display') === 'none') {
        $(this).addClass('current-accordion-item');
        $(this).next('.accordion-body').slideDown(500);
        $(this)
          .children('h3')
          .children('.accordion-control')
          .children('.accordion-icon-wrapper').toggleClass('active').children('.accordion-icon-wrapper svg:first-child').hide().next('.accordion-icon-wrapper svg:last-child').show();
      } else {
        $(this).removeClass('current-accordion-item');
        $(this).next('.accordion-body').slideUp(500);
        $(this)
          .children('h3')
          .children('.accordion-control')
          .children('.accordion-icon-wrapper').toggleClass('active').children('.accordion-icon-wrapper svg:last-child').hide().prev('.accordion-icon-wrapper svg:first-child').show();
      } 
    });
    // End of Accordions -----------------

    // Start of Accordion - FAQ --------------------
    $('.schema-faq-answer').css('display', 'none');
    $('.schema-faq-question').addClass('faq-title p-5 faq-closed');

    $('.schema-faq-question').click(function () {
      if ($(this).next().is(':visible')) {
        $(this).next().slideUp();
        $(this).removeClass('faq-opened');
        $(this).addClass('faq-closed');
      }
      else {
        $('.schema-faq-answer').slideUp();
        $(this).removeClass('faq-closed');
        $(this).next().slideDown();
        $(this).addClass('faq-opened');
        $('.schema-faq-question').not(this).removeClass('faq-opened');
        $('.schema-faq-question').not(this).addClass('faq-closed');
      }
    });
    // End of Accordion - FAQ ----------------
  }); // End of Doc Ready -------------------

  // Start of Filter Accordion -----------------
  // Replace default text
  $('.wpc-filters-button-text').text($('.wpc-filters-button-text').text().replace('Filters', 'Find your Physiotherapist'));

  $('.wpc-filters-section:first-of-type').prepend('<h3 class="has-text-primary mb-5 is-hidden-mobile">Find your Physiotherapist</h3>');
    
  function filterClick() {
    $('.wpc-filter-header').addClass('filter-opened mt-4');
  
    $('.wpc-filter-header').click(function () {
      if ($(this).next().is(':visible')) {
        $(this).next().slideUp();
        $(this).removeClass('filter-opened');
        $(this).addClass('filter-closed');
      }
      else {
        $(this).removeClass('filter-closed');
        $(this).next().slideDown();
        $(this).addClass('filter-opened');
      }
    });
  }

  // Start of Modals -----------------
  function modalClick() {
    $('.modal').each(function (i) {
      var modalContainerId = $(this).attr('data-modal', 'modal-' + (i + 1));
    });

    $('.show-modal-btn').each(function (i) {
      var modalId = $(this).attr('id', 'modal-' + (i + 1));

      $(modalId).click(function () {
        $('[data-modal="' + $(this).attr('id') + '"]').addClass('is-active');
      });
    });

    // Close Modal
    $('.modal-close').click(function () {
      $('.modal').removeClass('is-active');
    });
  }
  // End of Modals ----------------
  
  $(document).ready(function(){
    filterClick();
    modalClick();
  });
  $(document).ajaxComplete(function () {
    filterClick();
    modalClick();
    $('.wpc-filters-section:first-of-type').prepend('<h3 class="has-text-primary mb-5 is-hidden-mobile">Find your Physiotherapist</h3>');
    $('.wpc-filters-button-text').text($('.wpc-filters-button-text').text().replace('Filters', 'Find your Physiotherapist'));
  });
  // End of Filter Accordion ----------------

  ' use strict';
  document.addEventListener('DOMContentLoaded', function() {
      // Activate only if not already activated
      if (window.hideYTActivated) {return;}
      // Activate on all players
      let onYouTubeIframeAPIReadyCallbacks = [];
      for (let playerWrap of document.querySelectorAll('.hytPlayerWrap')) {
          let playerFrame = playerWrap.querySelector('iframe');

          let tag = document.createElement('script');
          tag.src = 'https://www.youtube.com/iframe_api';
          let firstScriptTag = document.getElementsByTagName('script')[0];
          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

          let onPlayerStateChange = function(event) {
              if (event.data === YT.PlayerState.ENDED) {
                  playerWrap.classList.add('ended');
              } else if (event.data === YT.PlayerState.PAUSED) {
                  playerWrap.classList.add('paused');
              } else if (event.data === YT.PlayerState.PLAYING) {
                  playerWrap.classList.remove('ended');
                  playerWrap.classList.remove('paused');
              }
          };

          let player;
          onYouTubeIframeAPIReadyCallbacks.push(function() {
              player = new YT.Player(playerFrame, {
                  events: {
                      'onStateChange': onPlayerStateChange
                  }
              });
          });

          playerWrap.addEventListener('click', function() {
              let playerState = player.getPlayerState();
              if (playerState === YT.PlayerState.ENDED) {
                  player.seekTo(0);
              } else if (playerState === YT.PlayerState.PAUSED) {
                  player.playVideo();
              }
          });
      }

      window.onYouTubeIframeAPIReady = function() {
          for (let callback of onYouTubeIframeAPIReadyCallbacks) {
              callback();
          }
      };

      window.hideYTActivated = true;
  });

})(jQuery);