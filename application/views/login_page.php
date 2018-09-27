<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html>
<body id="loginPage">

<div id="preloader">
    <div id="status"> &nbsp; </div>
</div>

<ul class="cb-slideshow" hidden>
    <li><span>Image 01</span></li>
    <li><span>Image 02</span></li>
    <li><span>Image 03</span></li>
    <li><span>Image 04</span></li>
    <li><span>Image 05</span></li>
    <li><span>Image 06</span></li>
</ul>

<section class="material-half-bg" hidden>
    <div class="cover"></div>
</section>
<section class="login-content" hidden>

    <div class="login-box" hidden>
<?php
        echo validation_errors();       /*FOR PRINTING VALIDATION ERRORS*/
        $attributes = array(
            'class'=>'login-form',
            'id' => 'login_form'
        );
        echo form_open('login/verify' , $attributes);
?>
        <!--<form class="login-form" action="">-->
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" type="text" placeholder="Email" autofocus  name="user_email">
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" placeholder="Password" name="user_password">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="stay_signed_in"><span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                </div>
            </div>
            <div class="form-group btn-container" id="sign_in_btn">
<!--                <input type="submit" name="login" value="SIGN IN" class="btn btn-primary btn-block" >-->
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>

            <div class="form-group">
                <div id="messages" class="error-container"></div>
            </div>

        </form>


<?php 
    $attributes = array(
        "class" => "forget-form",
        "id" => "forget_form"
    );
    echo form_open("register/forgot", $attributes);
?>

<!--        <form class="forget-form" action="register/forgot">-->
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
            <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input class="form-control" type="text" placeholder="Email" name="user_email">
            </div>
            <div class="form-group btn-container">
                <button name="forgot_btn" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
            </div>
        </form>

    </div>
</section>

<?php
    $url_for_template = APPPATH . "views/template/show_swal.php";
    include_once ($url_for_template);
?>

<script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
</script>

</body>
</html>