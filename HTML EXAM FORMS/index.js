const usernameFormat = /^[\w]+$/;
const emailIdFormat = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;


function validation(event, form) {
    event.preventDefault();
    event.stopPropagation();

    var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var zip = document.getElementById("zip").value;
    var name_error = document.getElementsByClassName('error-label-name')[0];
    var password_error = document.getElementById('error-label-password');
    var email_error = document.getElementById('error-label-email');
    var phone_error = document.getElementById('error-label-phone');
    var zip_error = document.getElementById('error-label-zip');

    if (name =='' || password=='' || email=='' || phone=='' || zip=='' ) {
       //document.getElementsByClassName('username_div')[0].style.color = "red";
        name_error.style.color="red";
        name_error.textContent = "Username is required";
        //document.getElementsByTagName('label')[0].textContent= '* name is required';



    }
    else {

    }
}
