function mostrar_cursos_relacionats(idContingut) {
    // var idContingut =  document.getElementById(idContingut);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            document.getElementById("contingut_"+idContingut).innerHTML = xhr.responseText;
            // alert(xhr.responseText);
        }
    }
    xhr.open("POST", "../../Controller/Continguts/ControllerCursosRelacionats.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("id_contingut=" + idContingut);
}

function eliminar_contingut(idContingut) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
            // document.getElementById("contingut_"+idContingut).innerHTML = xhr.responseText;
            // alert(xhr.responseText);
        }
    }
    xhr.open("POST", "../../Controller/Continguts/ControllerEliminarContingut.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("id_contingut=" + idContingut);
}

