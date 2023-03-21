function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confPassword = document.getElementById("confPassword").value;
    var dni = document.getElementById("dni").value;
    var username = document.getElementById("username").value;
    var nom = document.getElementById("nom").value;
    var cognom = document.getElementById("cognom").value;
    var tipoUsuario = document.getElementById("tipoUsuario").value;
  
    let emailValid =/^(([^<>()\[\]\.,;:\s@\”]+(\.[^<>()\[\]\.,;:\s@\”]+)*)|(\”.+\”))@(([^<>()[\]\.,;:\s@\”]+\.)+[^<>()[\]\.,;:\s@\”]{2,4})$/
    let passwordValida = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*.-?&])([A-Za-z\d$@$!%*.-?&]|[^ ]){8,15}$/;
    let dniValid = /^[XYZ]?\d{5,8}[A-Z]$/i;;
    
  
    var formValido = true;
  
    if (username=="") {
      document.getElementById("er-username").innerHTML="Aquest camp no pot estar buit";
      formValido = false;
    }else{
      document.getElementById("er-username").innerHTML="";
    }
  
    if (nom=="") {
      document.getElementById("er-nom").innerHTML="Aquest camp no pot estar buit";
      formValido = false;
    }else{
      document.getElementById("er-nom").innerHTML="";
    }
  
    if (cognom=="") {
      document.getElementById("er-cognom").innerHTML="Aquest camp no pot estar buit";
      formValido = false;
    }else{
      document.getElementById("er-cognom").innerHTML="";
    }
  
    if (!emailValid.test(email)) {
        document.getElementById("er-mail").innerHTML="El correu electrònic no és vàlid";
        formValido = false;
    }else{
      document.getElementById("er-mail").innerHTML="";
    }
    
    if (!dniValid.test(dni)) {
        document.getElementById("er-dni").innerHTML="El dni no és vàlid";
        formValido = false;
    }else{
      document.getElementById("er-dni").innerHTML="";
    }
    
    if (!passwordValida.test(password)) {
        document.getElementById("er-pas").innerHTML="La contrasenya ha de contenir entre 8 i 15 caràcters, una minúscula, una majúscula i número i un caràcter especial.";
        formValido = false;
    }else{
      document.getElementById("er-pas").innerHTML="";
    }
    
    if (password !== confPassword) {
        document.getElementById("er-cpas").innerHTML="La contrasenya no coincideix";
        formValido = false;
    }else{
      document.getElementById("er-cpas").innerHTML="";
    }
  
    if (tipoUsuario=="") {
      document.getElementById("er-tip").innerHTML="Has de seleccionar un tipus d'usuari";
      formValido = false;
    }else{
    document.getElementById("er-tip").innerHTML="";
    }
  
    
    if (!formValido) {
        return false;
    }
  
    return true;
  
  }
  
  
  var form = document.getElementById("myForm");
  
  form.addEventListener("submit", function(event){
    event.preventDefault();
    if(validateForm()){
        form.submit();
    }
  });
  
  function showPass(){
    var password = document.getElementById("password");
  
    if(password.type=="password"){
      password.type="text";
      document.getElementById("eyes").innerHTML="";
      document.getElementById("eyes").innerHTML="<img src='../img/eye.svg' alt='eye_slash'>";
    }else if(password.type=="text"){
      password.type="password";
      document.getElementById("eyes").innerHTML="";
      document.getElementById("eyes").innerHTML="<img src='../img/eye-slash.svg' alt='eye_slash'>";
    }
  }
  
  function showCPass(){
    var password = document.getElementById("confPassword");
  
    if(password.type=="password"){
      password.type="text";
      document.getElementById("ceyes").innerHTML="";
      document.getElementById("ceyes").innerHTML="<img src='../img/eye.svg' alt='eye_slash'>";
    }else if(password.type=="text"){
      password.type="password";
      document.getElementById("ceyes").innerHTML="";
      document.getElementById("ceyes").innerHTML="<img src='../img/eye-slash.svg' alt='eye_slash'>";
    }
  }
  
  
  
  
  
  
  
  