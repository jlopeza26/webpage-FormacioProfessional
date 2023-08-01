function filtrar_cursos(){

    var id_curs=document.getElementById("select-curs").value

    if (id_curs==""){
        const elements = document.getElementsByClassName("curs");
        for (let i = 0; i < elements.length; i++) {
          elements[i].style.display = "block";
        }
    } else {
        const elements = document.getElementsByClassName("curs");
        for (let i = 0; i < elements.length; i++) {
          elements[i].style.display = "none";
        }
    
        const elements2 = document.getElementsByClassName("curs_"+id_curs);
        for (let i = 0; i < elements2.length; i++) {
          elements2[i].style.display = "block";
        }
    }



}