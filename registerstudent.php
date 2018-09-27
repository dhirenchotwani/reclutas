<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 17-06-2018
 * Time: 19:12
 */
?>
<!DOCTYPE html>
<html>

<?php
$title = "Register | NameOfProject";
$page = "Register";
include_once ("includes/header.php");
?>

<body>

<ul class="cb-slideshow">
    <li><span>Image 01</span></li>
    <li><span>Image 02</span></li>
    <li><span>Image 03</span></li>
    <li><span>Image 04</span></li>
    <li><span>Image 05</span></li>
    <li><span>Image 06</span></li>
</ul>

<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">

    <div class="login-box  register-box">
        <form class="login-form" action="">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>REGISTER </h3>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label">FIRST NAME</label>
                    <input class="form-control" type="text" placeholder="First Name" autofocus>
                </div>
                <div class="form-group col-lg-6">
                    <label class="control-label">LAST NAME</label>
                    <input class="form-control" type="text" placeholder="Last Name" autofocus>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" type="text" placeholder="Email" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" type="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="control-label">CONFIRM PASSWORD</label>
                <input class="form-control" type="password" placeholder="Confirm Password">
            </div>

            <div class="form-group btn-container mt-2" id="register_btn">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
            </div>
            <div class="register_container">
                <p class="semibold-text my-2 pl-3">Already Have an account? &nbsp;<a href="index.php">Login Here</a></p>
            </div>
        </form>


    </div>
</section>

<?php
include_once ("includes/footer.php");
?>

</body>
</html>
