import jQuery from 'jquery'
window.$ = window.jQuery = jQuery

$('.js-menu-toggle').on('click', function() {
  $('#mobile-menu').toggleClass('-translate-y-full')
})

$('#mobile-menu a').on('click', function() {
  $('#mobile-menu').toggleClass('-translate-y-full')
})
