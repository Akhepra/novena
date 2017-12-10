/*jslint vars: true*/
/* eslint-disable no-console, no-unused-vars*/
/*global $, console, window*/

$(function () {
  'use strict';

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

    var $pie = $('#pie'),
      color = $('.almost .day').css("background-color"),
      circle_side = 200,
      circle_border = 20,
      arc_radius = circle_side / 2,
      arc_start_x = $pie.width() / 2,
      arc_start_y = ($pie.height() / 2) - arc_radius,
      arc_border = circle_border * 2,
      $date = $('.almost .date'),
      $day = $('.almost .day'),
      days = $day.find('span:nth-of-type(2)').text(),
      final_degree = 360 - days,
      pie_v_center = $pie.height() / 2,
      pie_h_center = $pie.width() / 2;

    // set the attributes of the path
    $pie.find('path')
      .attr('d', describe_arc(pie_h_center, pie_v_center, arc_radius, 0, final_degree))
      .attr('fill', 'none')
      .attr('stroke-width', arc_border)
      .attr('stroke', color);

    $day.css('background', 'var(--purple) url(_images/missing_days.png) center center no-repeat');

  }

  if ($('.almost').length > 0) {
    set_pie();
  }

  // set the pie after resizing
  $(window).resize(function () {
    set_pie();
  });


});
