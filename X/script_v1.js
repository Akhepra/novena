/* eslint-disable no-console, no-unused-vars*/
/*global $, console, window*/

$(function () {
  'use strict';


  // audio stuff
  var $players = $('.player'),
    $date = $('.date'),
    $first_article = $('article:first-of-type');

  $players.on('click', function (event) {

    var song_name = $(event.target).attr('data-src'),
      $audio_player = $('#song');

    // check if a song is playing
    if ($audio_player.length === 0) {

      $('body').append('<audio id="song"></audio>');

      $audio_player = $('#song');
      $audio_player.attr('src', song_name);
      $audio_player[0].play();

    } else {

      // if there's a song, check to see if it's the same being cliked
      if ($audio_player.attr('src') === song_name) {

        // if the song is paused then play it
        if ($audio_player[0].paused) {
          $audio_player[0].play();
        } else {
          // pause the song
          $audio_player[0].pause();
        }

      } else {
        // load and play the song
        $audio_player.attr('src', song_name);
        $audio_player[0].play();
      }

    }

    $audio_player.on('ended', function () {
      $audio_player.remove();
    });


    /*   */

  });


  // banner background
  if (!$date.text().length) {
    $('#banner').removeClass('novena');
    $('#banner').addClass('almost');

    if ($first_article.hasClass('o_todos_los_dias')) {
      $('.chamfer').css('background', 'none');
    }
  }

  function toogle_villancicos() {
    if ($(window).scrollTop() > 100) {
      $('#villancicos').fadeIn(500);
    } else {
      $('#villancicos').fadeOut(500);
    }
  }

  toogle_villancicos();

  function toogle_next() {

    if ($('.next').length) {

      var villancicos_bt = $('#villancicos').offset().top + $('#villancicos').outerHeight(),
        next_bt = $('.next a').offset().top + $('.next a').height();

      if ($date.text().length || (!$date.text().length && !$first_article.hasClass('o_todos_los_dias'))) {

        if (villancicos_bt > $('.chamfer').offset().top) {
          $('#villancicos').css('background-color', 'transparent');
        } else {
          $('#villancicos').css('background-color', '#fff');
        }

        if ($('#villancicos').offset().top > next_bt) {
          $('.next a').css('color', 'white');
          $('.next a').addClass('next_lk');
        } else {
          $('.next a').css('color', 'transparent');
          $('.next a').removeClass('next_lk');
        }

      }

    }

  }

  toogle_next();

  $(window).scroll(function () {

    toogle_villancicos();
    toogle_next();

  });

});
