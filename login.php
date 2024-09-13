<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Accept only characters</title>
<style>
    #uni_modal .modal-content>.modal-footer, #uni_modal .modal-content>.modal-header {
        display: none;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <h3 class="float-left">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </h3>
    <div class="row">
        <div class="col-lg-5 border-right">
            <h3 class="text-center">Login</h3>
            <hr>
            <form action="" id="login-form">
                <div class="form-group">
                    <label for="" class="control-label">Username</label>
                    <input type="text" class="form-control form" name="username" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Password</label>
                    <input type="password" class="form-control form" name="password" required>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-primary btn-flat" id="login-btn">Login</button>
                </div>
            </form>
        </div>
        <div class="col-lg-7">
            <h3 class="text-center">Create New Account</h3>
            <hr class='border-primary'>
            <form action="" id="registration" onsubmit="return validateInput()">
                <div class="form-group">
                    <label for="" class="control-label">Name</label>
                    <input type="text" class="form-control form-control-sm form" name="firstname" pattern="[A-Za-z][A-Za-z\s]*" title="Name should consists of characters and can contain spaces only" required>
                </div>
                <div class="form-group">
                  <label for="" class="control-label">Last Name</label>
                 <input type="text" class="form-control form-control-sm form" name="lastname" pattern="[A-Za-z][A-Za-z\s]*" title="Last name consists of characters and can contain spaces only" required>
                 </div>
                 <div class="form-group">
                 <label for="username" class="control-label">Username</label>
                <input type="text" class="form-control form-control-sm form" name="username" pattern="^[A-Za-z]{5,}[A-Za-z0-9]*$" title="Please provide the valid Username!. Numbers can be included after the first 5 characters." required>
                </div>

                <div class="form-group">
                    <label for="" class="control-label">Password</label>
                    <input type="password" class="form-control form-control-sm form" name="password" required>
                </div>
                <div class="form-group">
                    <label for="" class="control-label">Contact Number (10 digits)</label>
                    <input type="tel" id="contact-number" class="form-control form-control-sm form" name="contactnumber" pattern="[1-9]{1}[0-9]{9}" required>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-primary btn-flat" id="register-btn">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function(){
        // Function to validate input fields
        function validateInput() {
            var contactNumber = $('#contact-number').val();
            if (contactNumber.length !== 10 || isNaN(contactNumber)) {
                alert('Please enter a valid 10-digit contact number.');
                return false;
            }
            return true;
        }

        // Enable/disable register button based on contact number length
        $('#contact-number').on('input', function() {
            var contactNumber = $(this).val();
            if (contactNumber.length === 10 && !isNaN(contactNumber)) {
                $('#register-btn').prop('disabled', false);
            } else {
                $('#register-btn').prop('disabled', true);
            }
        });

        // Registration form submission
        $('#registration').submit(function(e){
            e.preventDefault();
            start_loader();
            if($('.err-msg').length > 0)
                $('.err-msg').remove();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=register",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                error: err => {
                    console.log(err);
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        alert_toast("Account successfully registered", 'success');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else if (resp.status == 'failed' && !!resp.msg) {
                        var _err_el = $('<div>');
                        _err_el.addClass("alert alert-danger err-msg").text(resp.msg);
                        $('#registration').prepend(_err_el);
                        end_loader();
                    } else {
                        console.log(resp);
                        alert_toast("An error occurred", 'error');
                        end_loader();
                    }
                }
            });
        });

        // Login form submission
        $('#login-form').submit(function(e){
            e.preventDefault();
            start_loader();
            if($('.err-msg').length > 0)
                $('.err-msg').remove();
            $.ajax({
                url: _base_url_ + "classes/Login.php?f=login_user",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                error: err => {
                    console.log(err);
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (typeof resp == 'object' && resp.status == 'success') {
                        alert_toast("Login Successfully", 'success');
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else if (resp.status == 'incorrect') {
                        var _err_el = $('<div>');
                        _err_el.addClass("alert alert-danger err-msg").text("Incorrect Credentials.");
                        $('#login-form').prepend(_err_el);
                        end_loader();
                    } else {
                        console.log(resp);
                        alert_toast("An error occurred", 'error');
                        end_loader();
                    }
                }
            });
        });
    })
</script>
</body>
</html>
