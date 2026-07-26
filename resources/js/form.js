import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;
import IMask from 'imask';
let mask = null

$(function () {

  initPhoneMask()

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  const $formWrap = $('#lead-form-wrap')
  const $toggle = $('.js-toggle-form')
  const $form = $('#lead-form')
  const $name = $('#lead-name')
  const $phone = $('#lead-phone')
  const $email = $('#lead-email')
  const $message = $('#lead-message')
  const $successMessage = $('#lead-message-success')
  const $formSpinner = $('#form-spinner')
  let isInProgress = false


  $toggle.on('click', function () {
    $formWrap.toggleClass('hidden')
    $('body').toggleClass('overflow-hidden')
    ym(42479599,'reachGoal','form_opened')
  })

  $name.on('change', function () {
    $(this).removeClass('error')
  })

  $email.on('change', function () {
    $(this).removeClass('error')
  })

  $phone.on('change', function () {
    $(this).removeClass('error')
  })

  $form.on('submit', function () {

    let isValid = true

    if ($name.val().length === 0) {
      $name.addClass('error')
      isValid = false
    }

    if (!validEmail($email.val())) {
      $email.addClass('error')
      isValid = false
    }

    if (mask.unmaskedValue.length < 11) {
      $phone.addClass('error')
      isValid = false
    }

    if (!isValid || isInProgress) return false

    console.log('inInProgress', isInProgress)


    $.ajax({
      type: 'POST',
      url: '/leads',
      data: JSON.stringify({
        name: $name.val(),
        phone: $phone.val(),
        email: $email.val(),
        message: $message.val()
      }),
      contentType: 'application/json',
      beforeSend: function (jqXHR, settings) {
        isInProgress = true
        $formSpinner.toggleClass('hidden')
      },
    }).done(function (data) {
      $form.remove()
      $successMessage.removeClass('hidden')
      isInProgress = false
      $formSpinner.toggleClass('hidden')
      ym(42479599,'reachGoal','form_submit')
    }).fail(function (err) {
      alert('Ошибка');
      $formSpinner.toggleClass('hidden')
    });

    return false
  })
});


function initPhoneMask() {
  const element = document.getElementById('lead-phone');
  const maskOptions = {
    mask: '+{7} (000) 000-00-00'
  };
  mask = IMask(element, maskOptions);
}


function validEmail(email) {
  var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return emailReg.test(email);
}
