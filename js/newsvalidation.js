function validateForm()
{
    var fields = document.forms["newsform"].getElementsByTagName("input"); 
    for (var i = 0; i < fields.length; i++) {
  if (fields[i].value.trim() === "") {
    alert("All feild required")
    break;
  }
}
}