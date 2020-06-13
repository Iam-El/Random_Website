function errorMessage(id, msg) {
    var spanID = document.getElementsByTagName('span');
    var span = spanID[0];
    if (span) {
        span.innerHTML = msg;
    }
}




function validation(event) {
    event.preventDefault();
    event.stopPropagation();
    var errFlag = false;
    var country = document.getElementsByTagName('input')[0].value;
    var password = document.getElementById('password').value;
    var email = document.getElementById('email').value;


    if (!country.selectedIndex) {
        errorMessage('error-country', 'Please select Country');
        errFlag = true;


    }


}








