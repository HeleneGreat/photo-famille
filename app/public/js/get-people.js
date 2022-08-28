
/* ********************************** */
//  Get people's name that match what
// the user has typed in the inputs
/* ********************************** */

window.onload = function(){

  let nom = document.getElementById('nom');
  nom.addEventListener('keyup', getPeople);

  let prenom = document.getElementById('prenom');
  prenom.addEventListener('keyup', getPeople);

  function getPeople() {
    if (nom.length == 0 && prenom.length == 0) {
      document.getElementById("people-list").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("people-list").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "index.php?action=getpeople&nom=" + nom.value + "&prenom=" + prenom.value, true);
      xmlhttp.send();
    }
  }



}