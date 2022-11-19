$(document).ready(function () {


  $('#firstName').on('input', function () {
    checkFirstName();
  });

  $('#lastName').on('input', function () {
    checkLastName();
  });


  $('#email').on('input', function () {
      checkEmail();
  });

  $('#email').on('input', function () {
    checkEmailDB();
});
  

  $('#password').on('input', function () {
      checkPassword();
  });

  $('#conpassword').on('input', function () {
    checkConPassword();
  });


  $('#btnSignup').click(function () {


      if (!checkFirstName() && !checkLastName() && !checkEmail() && !checkPassword() && !checkConPassword()) {
          $("#message").html(`<div class="alert alert-danger p-3 rounded-4"><i class="fas fa-exclamation-circle"></i> Please fill all required field</div>`);
      } else if (!checkFirstName() || !checkLastName() || !checkEmail() || !checkPassword() || !checkConPassword())  {
          $("#message").html(`<div class="alert alert-danger p-3 rounded-4"><i class="fas fa-exclamation-circle"></i> Please fill all required field</div>`);
      }
      else {
          console.log("ok");
          $("#message").html("");
          var form = $('#form')[0];
          var data = new FormData(form);
          $.ajax({
              type: "POST",
              url: "/pages/customer/config/signupAction.php",
              data: data,
              processData: false,
              contentType: false,
              cache: false,
              async: false,

              success: function (data) {
                  $('#message').html(data);
                  window.location = "../customer/otp.php?email=";
              },
              complete: function () {
                  setTimeout(function () {
                      $('#form').trigger("reset");
                      $('#btnSignup').html('Submit');
                      $('#btnSignup').attr("disabled", false);
                      $('#btnSignup').css({ "border-radius": "4px" });
                  }, 30000);
              }
          });
      }
  });
});


function checkFirstName() {
  var pattern = /^[a-zA-Z\s]*$/;;
  var firstName = $('#firstName').val();
  var validuser = pattern.test(firstName);
    if (!validuser) {
        $('#errorFirst').html('First name should be a-z ,A-Z only');
        return false;
    }else if(firstName == ''){
        $('#errorFirst').html('Please provide your first name');
        return false;
    }else {
        $('#errorFirst').html('');
        return true;
    }
}

function checkLastName() {
    var pattern = /^[a-zA-Z\s]*$/;;
    var lastName = $('#lastName').val();
    var validuser = pattern.test(lastName);
      if (!validuser) {
          $('#errorLast').html('Last name should be a-z ,A-Z only');
          return false;
      }else if(lastName == ''){
        $('#errorLast').html('Please provide your last name');
        return false;
      }else {
          $('#errorLast').html('');
          return true;
      }
  }



function checkEmail() {

jQuery.ajax({
    url: "/pages/customer/config/emailCheck.php",
    data:'email='+$("#email").val(),
    type: "POST",
    success:function(data){
        $("#errorEmailDB").html(data);
    },
    error:function (){}
    });

  var regEx = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var email = $('#email').val();
  var validemail = regEx.test(email);
  if (email == "") {
      $('#errorEmail').html('Email is required');
      return false;
  } else if (!validemail) {
      $('#errorEmail').html('Invalid email address');
      return false;
  } else {
      $('#errorEmail').html('');
      return true;
  }
  
}


function checkPassword() {
  var regEx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  var password = $('#password').val();
  var validpass = regEx.test(password);

  if (password == "") {
      $('#errorPassword').html('Please enter your password');
      return false;
  } else if (!validpass) {
      $('#errorPassword').html('Password should atleast 7 characters, and one uppercase letter, one lowercase letter, one number');
      return false;
  } else {
      $('#errorPassword').html("");
      return true;
  }
}
function checkConPassword() {
  var password = $('#password').val();
  var conpassword = $('#conpassword').val();
  if (conpassword == "") {
      $('#errorConPass').html('Please enter your confirm password');
      return false;
  } else if (password !== conpassword) {
      $('#errorConPass').html('Confirm password did not match');
      return false;
  } else {
      $('#errorConPass').html('');
      return true;
  }
}


function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
  } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
  }
}