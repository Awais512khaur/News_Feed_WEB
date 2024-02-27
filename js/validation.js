function validateForm() {
    var x = document.forms['categoryform']['Category'].value;
    var errormsg = document.getElementById('error');
    var errormsg2 = document.getElementById('error1');
    errormsg2.textContent = '*Description is optional';
    if (x == "") {
        errormsg.textContent = '*Please add category'; 
        return false;
    } else {
        errormsg.textContent = ''; 
        return true;
    }
}