
// This script assures that at leat one checkbox is checked when a new user creates an account


// let checkboxes = document.querySelectorAll('input[type=checkbox]:checked');

// let fieldset = document.querySelectorAll('input[type=checkbox]')[0];

// if(checkboxes.length == 0) {
//     const errorMessage = 'Au moins un aïeul doit être sélectionné';
//     fieldset.setCustomValidity(errorMessage);
// }else{
//     fieldset.setCustomValidity('');
// }



// get a list of the checkboxes and spread it into an array
// so later you can use Array methods on it
const checkboxes = [...document.querySelectorAll('input[type=checkbox]')]
let submitbtn = document.querySelectorAll('button')[0]

// function that tells you if any checkboxes in
// the above list are checked
function anyChecked() {
  // this is where we're using an array method
  // Array.prototype.some
  return checkboxes.some(x=>x.checked)
}

// to every single checkbox, add a click listener
// again, using an Array method
// Array.prototype.forEach
checkboxes.forEach(checkbox => {
  checkbox.addEventListener('click', () => {
    // when any checkbox is clicked,
    // check if there's any checked checkboxes
    anyChecked()
      // if so, enable the button
      ? submitbtn.removeAttribute('disabled')
      // otherwise, disable it
      : submitbtn.setAttribute('disabled','')
  })
})

// do the same thing initially as well 
// to account for initially checked checkboxes
anyChecked()
      ? submitbtn.removeAttribute('disabled')
      : submitbtn.setAttribute('disabled','')

