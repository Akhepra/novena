 $('document').ready(function () {

  var banner_height = $('#banner').outerHeight();
  var title_top = $('.test h2').offset();

  console.log('banner_height: ' + banner_height);
  console.log('title_top.top: ' + title_top.top);

  $(window).scroll(function () {
    console.log('$(this).scrollTop(): ' + $(this).scrollTop());

    var test = $('.test h2').offset().top - $('#banner').outerHeight();
    console.log(test);

    if ($(this).scrollTop() > test) {
      $('.test h2').css({position: 'fixed', top: banner_height});
      console.log('hola');
    } else {
      $('.test h2').css({position: ''});
    }
  });

});
