var country = document.getElementById('error-country');
var password = document.getElementById('password');
var email = document.getElementById('email');

function errorMessage(id, msg) {

    var spanId = 'error' + id;
    var span = document.getElementById(spanId);
    var divID = 'control' + id;
    var div = document.getElementById(divID);
    if (span) {
        span.innerHTML = msg;
    }

    if (div) div.className = div.className + "error";
}


function init() {
    var sampleForm = document.getElementById('form-smaple');
    sampleForm.onsubmit = ValidateForm;


}


function ValidateForm(event) {

    var errorMsg = false;

    event.preventDefault();
    event.stopPropagation();
    var country_value= document.getElementsByTagName('input')[0].value;
    var password_value = document.getElementById('password').value;
    var email_value = document.getElementById('email').value;

    var emailReg = /^(.+)@([^\.].*)\.([a-z]{2,})$/;
    if (!emailReg.test(email_value.value)) {
        errorMessage('error-email', 'Enter a valid Email');
        errorMsg = true;

    }

    if(email_value==""){
        errorMessage('email', 'Email address is required');
        errorMsg = true;
    }

    var passReg = /^\S{0,8}$/;
    if (!passReg.test(password_value.value)) {
        errorMessage('password', 'Enter a valid Password');
        errorMsg = true;
    }

    if (country_value=="") {
        errorMessage('country', 'Please select Country');
        errorMsg = true;
    }


}



window.onload = init;















