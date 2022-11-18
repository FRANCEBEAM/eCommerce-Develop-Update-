$(document).ready(function () {


    $('#password').on('input', function () {
        checkPassword();
    });
  
    $('#cpassword').on('input', function () {
      checkConPassword();
    });
  
  
    $('#btnResetPass').click(function () {
  
  
        if (!checkPassword() && !checkConPassword()) {
            $("#message").html(`<div class="bg-danger text-white p-3 rounded-4"><i class="fas fa-exclamation-circle"></i>Please create new password</div>`);
        } else if (!checkPassword() || !checkConPassword())  {
            $("#message").html(`<div class="bg-danger text-white p-3 rounded-4"><i class="fas fa-exclamation-circle"></i>Please create new password</div>`);
        }
        else {
            console.log("ok");
            $("#message").html("");
            var form = $('#form')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "/pages/customer/config/newpassAction.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
  
                success: function (data) {
                    $('#message').html(data);
                    // window.location = "../customer/changed.php";
                },
                complete: function () {
                    setTimeout(function () {
                        $('#form').trigger("reset");
                        $('#btnResetPass').html('Submit');
                        $('#btnResetPass').attr("disabled", false);
                        $('#btnResetPass').css({ "border-radius": "4px" });
                    }, 30000);
                }
            });
        }
    });
  });
  
  


  
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
    var cpassword = $('#cpassword').val();
    if (cpassword == "") {
        $('#errorConPass').html('Please enter your confirm password');
        return false;
    } else if (password !== cpassword) {
        $('#errorConPass').html('Confirm password did not match');
        return false;
    } else {
        $('#errorConPass').html('');
        return true;
    }
  }
  
