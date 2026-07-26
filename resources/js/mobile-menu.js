import jQuery from 'jquery'
window.$ = window.jQuery = jQuery

$('.js-menu-toggle').on('click', function() {
  $('#mobile-menu').toggleClass('hidden')
})

$('#mobile-menu a').on('click', function() {
  $('#mobile-menu').toggleClass('hidden')
})
