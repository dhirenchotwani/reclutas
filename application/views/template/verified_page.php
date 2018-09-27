<?php


/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 6/21/2018
 * Time: 4:13 PM
 */
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
        $attributes = array('class'=>'login-form');
        echo form_open('login/verify' , $attributes);
        ?>
        <!--<form class="login-form" action="">-->
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>VERIFY ACCOUNT</h3>
        <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" value="<?php echo $user_email; ?>" disabled placeholder="Email" autofocus  name="user_email">
        </div>
        <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="text" value="<?php echo $user_password; ?>" disabled placeholder="Password" name="user_password">
        </div>

        <div class="form-group">
            <label for="">Note: You must change the password after logging in.</label>
        </div>

        <div class="form-group btn-container" id="sign_in_btn">
            <!--                <input type="submit" name="login" value="SIGN IN" class="btn btn-primary btn-block" >-->
            <a class="btn btn-primary btn-block" href="../../"><i class="fa fa-sign-in fa-lg fa-fw"></i> SIGN IN</a>
        </div>

        </form>

    </div>
</section>


</body>
</html>
