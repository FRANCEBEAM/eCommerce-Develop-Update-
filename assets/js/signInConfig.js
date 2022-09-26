const form = document.getElementById("form");
const email = document.querySelector('#email');
const password = document.querySelector('#password');

// Check email if it is in a Database
function checkEmail(email){
    if(email.value !== db){
      document.querySelector('.errorEmail').style.color = "#e74c3c";
      document.querySelector('.errorEmail').innerHTML = "Email is incorrect";
      document.querySelector('.errorEmail').style.visibility  = "visible";
    }else{
      document.querySelector('.errorEmail') = "";
    }
}

// Check password if it's correct
function checkPassword(password){
  if(password.value !== db){
    document.querySelector('.errorEmail').style.color = "#e74c3c";
    document.querySelector('.errorEmail').innerHTML = "Password is incorrect";
    document.querySelector('.errorEmail').style.visibility  = "visible";
  }else{
    document.querySelector('.errorEmail') = "";
  }
}

form.addEventListener('submit', (e)=>{
  e.preventDefault()
  
  checkEmail(email, db);
  checkPassword(password, db);
})
