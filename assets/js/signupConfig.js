const form = document.getElementById("form");
const firstname = document.getElementById("firstName");
const lastname = document.getElementById("lastName");
const username = document.getElementById("username");
const email = document.getElementById("email");
const password = document.getElementById("password");
const conpass = document.getElementById("conpass");


//Check the fields
function checkField(){
  if(firstname.value === '' || lastname.value ==='' || username.value ==='' || email.value ==='' || password.value === '' || conpassword.value === ''){
    document.querySelector('.errorFirst').style.color = "#e74c3c";
    document.querySelector('.errorFirst').innerHTML = "Please fill first name";
    document.querySelector('.errorFirst').style.visibility  = "visible";

    document.querySelector('.errorLast').style.color = "#e74c3c";
    document.querySelector('.errorLast').innerHTML = "Please fill last name";
    document.querySelector('.errorLast').style.visibility  = "visible";

    document.querySelector('.errorEmail').style.color = "#e74c3c";
    document.querySelector('.errorEmail').innerHTML = "Please fill email";
    document.querySelector('.errorEmail').style.visibility  = "visible";

    document.querySelector('.errorConpass').style.color = "#e74c3c";
    document.querySelector('.errorConpass').innerHTML = "Confirm Password is required";
    document.querySelector('.errorConpass').style.visibility  = "visible";
  }else{
    document.querySelector('.errorFirst').innerHTML = "";
    document.querySelector('.errorLast').innerHTML = "";
    document.querySelector('.errorUsername').innerHTML = "";
    document.querySelector('.errorEmail').innerHTML = "";
    document.querySelector('.errorConpass').innerHTML = "";
  }
  }

  //check username input length
  function checkLength(){
    inputValue = document.querySelector('#username');

    if(inputValue.value.length < 7) {
         document.querySelector('.errorUsername').style.color = "#e74c3c";
        document.querySelector('.errorUsername').innerHTML = "Username must be atleast 7 characters";
        document.querySelector('.errorUsername').style.visibility  = "visible";
      }else if(inputValue.value.length >14){
        document.querySelector('.errorUsername').style.color = "#e74c3c";
        document.querySelector('.errorUsername').innerHTML = "Username must be less than 14 characters";
        document.querySelector('.errorUsername').style.visibility  = "visible";
      }
  }

  // check password input length
  function passwordLength(){
    passLength = document.querySelector("#password")
    if(passLength.value.length < 7){
      document.querySelector('.errorPass').style.color = "#e74c3c";
      document.querySelector('.errorPass').innerHTML = "Password must be atleast 7 Characters"
      document.querySelector('.errorPass').style.visibility  = "visible";
    }else{
      document.querySelector('.errorPass').innerHTML = "";
    }
  }

  //check password
  function checkPassword(){
    inputPass = document.querySelector("#password");
    inputConpass = document.querySelector("#conpassword");

    if(inputPass.value !== inputConpass.value){
      document.querySelector('.errorConpass').style.color = "#e74c3c";
        document.querySelector(".errorConpass").innerHTML = "Password not matched";
        document.querySelector('.errorConpass').style.visibility  = "visible";
    }
  }


form.addEventListener('submit', (e)=>{
  e.preventDefault()
  
  checkField();
  checkLength();
  passwordLength();
  checkPassword()
})

