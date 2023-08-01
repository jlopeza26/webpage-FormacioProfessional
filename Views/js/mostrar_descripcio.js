
let div = document.getElementById("myDiv");


div.addEventListener("mouseover", function() {
  
  let xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      
      let description = this.responseText;
      
    }
  };
  xhr.open("POST", "../../Controller/Continguts/mostrar_descripcio.php", true);
  xhr.send();
});