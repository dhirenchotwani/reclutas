
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 18-06-2018
 * Time: 14:51
 */
$user_role_id = $_SESSION['user_role_id'];
?>
<!DOCTYPE html>
<html>

<?php
if($user_role_id ==2 || $user_role_id ==4 || $user_role_id == 5) {
    show_404();
}
else{
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
        <div class="logo">
            <h1>NameOfProject</h1>
        </div>
        <div class="login-box">

            <?php
            echo validation_errors();
            $attributes = array(
                'class'=>'login-form',
                'name' => 'admin-form',
                'id' => 'sign_up_form',
            );
                echo form_open('register/create_account' , $attributes);
            ?>

<!--            <form class="login-form" action="">-->
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ADMIN</h3>
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    <input class="form-control" type="text" placeholder="Email" name="user_email" id="user_email" autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">ROLE</label>
                    <?php
                        if ($user_role_id == 1) {
                            $options = array(
                                4=> 'Faculty',
                                3=> 'Placement Officer',
                                2=> 'Company',
                            );
                            $extra = array(
                                'class' => 'form-control',
                                'id' => 'user_role_id',
                            );
                    } elseif ($user_role_id == 3) {
                            $options = array(
                                2=> 'Company',
                                5=> 'Student'
                            );
                            $extra = array(
                                'class' => 'form-control',
                                'id' => 'user_role_id',
                            );
                    }
                    echo  form_dropdown( "user_role_id" , $options , '5' ,$extra);
                    ?>
                </div>

                <div class="form-group btn-container mt-5" id="create_account_btn_div">
                    <button class="btn btn-primary btn-block" id="registerButton" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>CREATE ACCOUNT
                    </button>
                </div>

            </form>


        </div>
    </section>


    </body>
    <?php

    $url_for_template = APPPATH . "views/template/show_swal.php";
    include_once ($url_for_template);

}//end of outer if
?>

</html>

