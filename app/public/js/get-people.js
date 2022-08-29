
/* ********************************** */
//  Get people's name that match what
// the user has typed in the inputs
/* ********************************** */

window.onload = function(){

  let nom = document.getElementById('nom');
  nom.addEventListener('keyup', getPeople);

  let prenom = document.getElementById('prenom');
  prenom.addEventListener('keyup', getPeople);

  let peopleList = document.getElementById("people-list");

  function getPeople() {
    if (nom.length == 0 && prenom.length == 0) {
      document.getElementById("people-list").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          peopleList.innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "index.php?action=getpeople&nom=" + nom.value + "&prenom=" + prenom.value, true);
      xmlhttp.send();
    }
  }


  /* ********************************** */
  // Auto-complete the inputs if the 
  // user clicks on a name
  /* ********************************** */
  let list = document.querySelector('#people-list');
  let propositions = '.proposition';

  list.addEventListener('click', function(event){
    let closest = event.target.closest(propositions);
    if (closest && list.contains(closest)){
      // Auto-complete of the inputs
      let choiceNom = closest.querySelector('.nom').textContent;
      nom.value = choiceNom;
      let choicePrenom = closest.querySelector('.prenom').textContent;
      prenom.value = choicePrenom
      // When a choice is done, the propositions disappear
      peopleList.parentNode.removeChild(peopleList);
    }
  })


}