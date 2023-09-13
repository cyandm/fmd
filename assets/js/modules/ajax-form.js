import jQuery from 'jquery';

function objectifyFormArray(formArray) {
  var returnArray = {};
  for (var i = 0; i < formArray.length; i++) {
    returnArray[formArray[i]['name']] = formArray[i]['value'];
  }
  return returnArray;
}

jQuery(document).ready(($) => {
  const contactUsForm = $('#contact-us-form');
  const contactUsFormSubmit = $('#contact-us-form #contact-us-form-submit');

  $(contactUsForm).on('submit', (e) => {
    e.preventDefault();
    $(contactUsFormSubmit).addClass('pending');

    const formDataArray = $(contactUsForm).serializeArray();
    const formData = objectifyFormArray(formDataArray);
    if (!formData.agreement) formData.agreement = 'false';

    $.ajax({
      url: cyn_head_script.url,
      type: 'post',
      data: {
        action: 'send_contactus_form',
        _nonce: cyn_head_script.nonce,
        data: formData,
      },
      success: (res) => {
        $(contactUsFormSubmit).removeClass('pending');
        $(contactUsFormSubmit).addClass('success');
        $(contactUsFormSubmit).text("Thank You, We'll Call You Soon");

        setTimeout(() => {
          $(contactUsFormSubmit).removeClass('success');
          $(contactUsFormSubmit).text('Send');
        }, 2500);
      },
      error: (err) => {
        $(contactUsFormSubmit).removeClass('pending');
        $(contactUsFormSubmit).addClass('error');
      },
    });
  });
});
