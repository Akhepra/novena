/* eslint-disable no-console, no-unused-vars*/
/*global $, console, window*/

$(function () {
  'use strict';

   var $pie = $('#pie'),
    color = $('.day').css("background-color"),
    circle_side = 200,
    circle_border = 20,
    arc_radius = circle_side / 2,
    arc_start_x = $pie.width() / 2,
    arc_start_y = ($pie.height() / 2) - arc_radius,
    arc_border = circle_border * 2,
    days = 13,
    final_degree = 360 - days;

  // converts polar degrees to cartesian degrees
  function polar_to_cartesian(center_x, center_y, radius, angle_in_degrees) {
    var angle_in_radians = (angle_in_degrees - 90) * Math.PI / 180.0;

    return {
      x: center_x + (radius * Math.cos(angle_in_radians)),
      y: center_y + (radius * Math.sin(angle_in_radians))
    };
  }

  // find the description of the arc base on center, radius, start angle and end angle
  function describe_arc(x, y, radius, start_angle, end_angle) {

    var start = polar_to_cartesian(x, y, radius, start_angle),
      end = polar_to_cartesian(x, y, radius, end_angle),
      large_arc_flag = end_angle - start_angle <= 180 ? "1" : "0",
      d = [
        "M", start.x, start.y,
        "A", radius, radius, 0, large_arc_flag, 0, end.x, end.y
      ].join(" ");

    return d;
  }

  // function to set the pie covering the missing days
  function set_pie() {

    // find the center of the header
    var pie_v_center = $pie.height() / 2,
      pie_h_center = $pie.width() / 2;

    // set the attributes of the path
    $pie.find('path')
      .attr('d', describe_arc(pie_h_center, pie_v_center, arc_radius, 0, final_degree))
      .attr('fill', 'none')
      .attr('stroke-width', arc_border)
      .attr('stroke', color);

    console.log('hola');
  }

  // initialize the pie
  set_pie();

  // set the pie after resizing
  $(window).resize(function () {
    set_pie();
  });






  // audio stuff
  var $date = $('.date'),
    $first_article = $('article:first-of-type');

  function toogle_villancicos() {
    if ($(window).scrollTop() > 300) {
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
