function enviarCorreu() {
    var email =  document.getElementById("email").getAttribute("email");
    var msg =  document.getElementById("msg").value;
    var asunto =  document.getElementById("asunto").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            // document.getElementById("enviarCorreu").innerHTML = xhr.responseText;
            // alert(xhr.responseText);
        }
    }
    xhr.open("POST", "../../Controller/Reserva/ControllerEnviarCorreu.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("email="+email+"&msg="+msg+"&asunto="+asunto);
}