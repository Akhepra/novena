/* eslint-disable no-console, no-unused-vars*/
/*global $, console, window*/

$(function () {
  'use strict';

  var $players = $('.player'),
    $nexts = $('.next');


  // next options
  if ($nexts.length === 2) {
    $nexts.first().addClass('up');
    $nexts.last().addClass('down');
    $('article').css('padding-bottom', '100px');
  }

  // audio stuff
  $players.on('click', function (event) {

    var song_name = $(event.target).attr('data-src'),
      $audio_player = $('#song'),
      $input = $(event.target);

    $input.toggleClass('play');

    // check if a song is playing
    if ($audio_player.length === 0) {

      $('body').append('<audio id="song"></audio>');

      $audio_player = $('#song');
      $audio_player.attr('src', song_name);
      $audio_player[0].play();
      //$input.css('background-image', 'url(_images/btn_pause.svg)');

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
        $('input').addClass('play');
        $input.toggleClass('play');
        // load and play the song
        $audio_player.attr('src', song_name);
        $audio_player[0].play();
      }

    }

    $audio_player.on('ended', function () {
      $audio_player.remove();
    });

  });

});
