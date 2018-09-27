<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 22-06-2018
 * Time: 17:52
 */
?>
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
            $attributes = array('class'=>'login-form');
            echo form_open('register/changePassword' , $attributes);
        ?>

        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-unlock"></i>RESET PASSWORD</h3>
        <div class="form-group">
            <input type="text" hidden  value="<?php echo $user_email; ?>" name="user_email">

            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" autofocus  name="user_password">
        </div>
        <div class="form-group">
            <label class="control-label"> CONFIRM PASSWORD</label>
            <input class="form-control" type="password" placeholder="Confirm Password" name="confirm_user_password">
        </div>

        <div class="form-group btn-container pt-4" id="reset_btn">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg
            fa-fw"></i>RESET</button>
        </div>

        </form>




    </div>
</section>


</body>
</html>

