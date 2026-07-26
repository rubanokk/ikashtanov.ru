import Typewriter from 'typewriter-effect/dist/core';
import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

// new Typewriter('#typewriter', {
//   strings: ['Разрабатываем сайты', 'Мобильные приложения', 'Качественно. В срок.'],
//   autoStart: true,
//   loop: true,
//   delay: 200
// });

$(window).on('scroll', function() {
  var scrollHeight = $(window).scrollTop();
  const $stickyBtn = $("#sticky-btn")

  if (scrollHeight > 50) {
    $stickyBtn.removeClass('bottom-32').addClass('bottom-4');
  } else {
    $stickyBtn.removeClass('bottom-4').addClass('bottom-32');
  }
});

