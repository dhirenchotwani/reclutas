<?php
/**
 * Created by PhpStorm.
 * User: Vidhi
 * Date: 20-06-2018
 * Time: 09:18
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html>
<body id="change_password_page">

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

    <div class="login-box">
        <?php
        echo validation_errors();       /*FOR PRINTING VALIDATION ERRORS*/
        $attributes = array(
                'class'=>'login-form',
                'id' => 'change_pass_form'
        );
        echo form_open('dashboard/verify' , $attributes);
        ?>
        <!--<form class="change-password-form" action="">-->
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Change Password</h3>
        <div class="form-group">
            <label class="control-label">OLD PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="old_user_password">
        </div>
        <div class="form-group">
            <label class="control-label"> NEW PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="user_password">
        </div>
        <div class="form-group">
            <label class="control-label">CONFIRM PASSWORD</label>
            <input class="form-control" type="password" placeholder="Confirm Password" name="confirm_user_password">
        </div>
        <div class="form-group">
            <p class="semibold-text mb-2"> &nbsp; </p>
        </div>
        <div class="form-group btn-container" id="sign_in_btn">
            <!--<input type="submit" name="change password" value="CHANGE PASSWORD" class="btn btn-primary btn-block" >-->
            <button class="btn btn-primary btn-block" type="submit" id="changePassword"><i class="fa fa-sign-in fa-lg fa-fw"></i>CHANGE PASSWORD</button>

        </div>

        </form>

    </div>
</section>


</body>
</html>
