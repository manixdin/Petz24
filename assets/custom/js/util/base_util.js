function FORM_VALIDATION({ formData, type}, callback){
    
    if(formData.length == 0){
      callback(false);
      return;
    }

    const foundItem = formData.find((item) => {
      let value = $(`#${item.class}`).val();

      if(value === "" || value === null || value === undefined){
        return true;
      }

      if(item?.regex){
        const rex = new RegExp(item.regex, "gm");
        return !value.match(rex);
      }

      return false;
      
    });

    if(foundItem && type == 'notification'){
      validateError(foundItem.error);
      callback(false);
      return;
    }

    if(foundItem && type == 'message'){
     callback(foundItem);
     return;
    }

    callback(true);
}

function DISPLAY_IMAGE(input, element_id) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#" + element_id).attr("src", e.target.result).show();
      };
      reader.readAsDataURL(input.files[0]);
    }
}

function validateError(message) {
    $.toast({
      icon: "error",
      heading: "Warning",
      text: message,
      position: "top-right",
      bgColor: "#red",
      loader: true,
      hideAfter: 2000,
      stack: false,
      showHideTransition: "fade",
    });
}

function ALERTMESSAGE_HANDLER({
  placeholderClass,
  message,
  type,
  title
}){

  let _icon = {
    'success' : 'fa-check-circle',
    'danger' : 'fa-exclamation-triangle',
    'warning' : 'fa-exclamation-triangle',
    'info' : 'fa-info-circle',
    'primary' : 'fa-info-circle',
  }

  let titleElement = '';

  if(title && title != '') titleElement = '<h4>'+ title +'</h4>'

  alertMessage =  `<div class="alert alert-${type} alert-dismissible custom-alert-message" role="alert">
      ${titleElement}
        <div class="d-flex justify-contents-denter"> <i class="fa ${_icon[type]} fs-5 mx-2"></i> ${message}</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>`

  $('.custom-alert-message').remove();

  if(placeholderClass){ $('.' + placeholderClass).append(alertMessage); return }

  $('.custom-form').prepend(alertMessage)

}

function TOASTER_HANDLER({code, msg}){

  toastr.options = {
    // "closeButton": false,
    // "debug": false,
    // "newestOnTop": false,
    // "progressBar": false,
    // "positionClass": "toast-top-right",
    // "preventDuplicates": false,
    // "onclick": null,
    "showDuration": "300",
    // "hideDuration": "1000",
    "timeOut": "5000",
    // "extendedTimeOut": "1000",
    // "showEasing": "swing",
    // "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  let _toaster = {
    '200': {
      type: 'success',
      title: 'Congratulations!'
    },
    '400': {
      type: 'warning',
      title: 'Warning!'
    },
    '500': {
      type: 'error',
      title: 'Error!'
    }
  }

  if(_toaster?.[code]){
    let type = _toaster[code].type;
    // Display an info toast with no title
    toastr[type](msg, type)
    return
  }

  toastr.error('something went wrong!','Error')
}

function CAPITALIZE(string){
  return string[0].toUpperCase() + string.slice(1)
}

function GETFORMDATA(formId){
  return new FormData($(`#${formId}`)[0]);
}

function ENCRYPT_DATA(data){
  return btoa(JSON.stringify(data))
}

function DECRYPT_DATA(data){
  return JSON.parse(atob(data))
}