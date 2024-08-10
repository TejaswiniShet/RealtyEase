function validateSignUp() {

    var check = true;

    var usernameField = document.forms["form"]["username"];
    var usernamePrompt = document.getElementById("usernameError");
    if (usernameField.value.length < 4) {
      usernamePrompt.style.display = "block";
      document.getElementById("username-input").className = "invalid-box";
      check = false;
    }
    else{
      usernamePrompt.style.display = "none";  
      document.getElementById("username-input").className = "valid-box";
    }
    
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/; 
    var mailField = document.forms["form"]["email"];
    var mailPrompt = document.getElementById("mailError");
    if ( !(mailField.value.match(validRegex)) ) {
      mailPrompt.style.display = "block";
      document.getElementById("email-input").className = "invalid-box";
      check = false;
    }
    else{
      mailPrompt.style.display = "none";  
      document.getElementById("email-input").className = "valid-box";
    }

    var pwField = document.forms["form"]["password"];
    var pwPrompt = document.getElementById("passwordError");
    if (pwField.value.length < 8){
      pwPrompt.style.display = "block";
      document.getElementById("pw-input").className = "invalid-box";
      check = false;
    }
    else{
      pwPrompt.style.display = "none";  
      document.getElementById("pw-input").className = "valid-box";
    }
    
    var cpwField = document.forms["form"]["cpassword"];
    var cpwPrompt = document.getElementById("confirmationError");
    if ( !(cpwField.value === pwField.value) ){
      cpwPrompt.style.display = "block";
      document.getElementById("cpw-input").className = "invalid-box";
      check = false;
    }
    else{
      cpwPrompt.style.display = "none";  
      document.getElementById("cpw-input").className = "valid-box";
    }

    return check;
}
  
function validateLogin(){

    var check = true;

    var usernameField = document.forms["form"]["username"];
    var pwField = document.forms["form"]["password"];
    var prompt = document.getElementById("error");
    if (usernameField.value.length < 4 || pwField.value.length < 8) {
      prompt.style.display = "block";
      document.getElementById("username-input").className = "invalid-box";
      document.getElementById("pw-input").className = "invalid-box";
      check = false;
    }
    else{
      prompt.style.display = "none";  
      document.getElementById("username-input").className = "valid-box";
      document.getElementById("pw-input").className = "valid-box";
    }

    return check;
}
