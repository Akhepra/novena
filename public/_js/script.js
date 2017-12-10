/*jslint vars: true*/
/* eslint-disable no-console, no-unused-vars*/
/*global $, console, window*/

$(function () {
  'use strict';

  function toogle_next() {
    if ($(window).scrollTop() > 100) {
      $('.next').fadeIn(500);
    } else {
      $('.next').fadeOut(500);
    }
  }

  toogle_next();

  $(window).scroll(function () {
    toogle_next();
  });

});
