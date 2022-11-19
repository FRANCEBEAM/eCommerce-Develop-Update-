$(document).ready(function () {


    $('#newpass').on('input', function () {
        checkPassword();
    });
  
    $('#conpass').on('input', function () {
      checkConPassword();
    });
  
  
    $('#btnChange').click(function () {
  
  
        if (!checkPassword() && !checkConPassword()) {
            $("#message").html(`<div class="alert alert-danger p-4 rounded-4"><i class="fas fa-exclamation-circle"></i> Please fill all fields</div>`);
        } else if (!checkPassword() || !checkConPassword())  {
            $("#message").html(`<div class="alert alert-danger p-4 rounded-4"><i class="fas fa-exclamation-circle"></i> Please fill all fields</div>`);
        }
        else {
            console.log("ok");
            $("#message").html("");
            var form = $('#form')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "/pages/customer/config/settingsAction.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
  
                success: function (data) {
                    $('#message').html(data);
            
                },
                complete: function () {
                    setTimeout(function () {
                        $('#form').trigger("reset");
                        $('#btnChange').html('Submit');
                        $('#btnChange').attr("disabled", false);
                        $('#btnChange').css({ "border-radius": "4px" });
                    }, 30000);
                }
            });
        }
    });
  });
  
  


  
  function checkPassword() {
    var regEx = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    var password = $('#newpass').val();
    var validpass = regEx.test(password);
  
    if (password == "") {
        $('#errorPassword').html('Enter your new password');
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
    var password = $('#newpass').val();
    var cpassword = $('#conpass').val();
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
  
