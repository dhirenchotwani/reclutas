<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 6/17/2018
 * Time: 9:17 PM
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
      <div class="logo">
        <h1>NameOfProject</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ADMIN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">ROLE</label>
              <select name="" id="" class="form-control">
                  <option value="faculty">Faculty</option>
                  <option value="placement officer">Placement Officer</option>
                  <option value="company">Company</option>
              </select>

          </div>

          <div class="form-group btn-container mt-5" id="create_account_btn_div">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>CREATE ACCOUNT</button>
          </div>

        </form>


      </div>
    </section>

    <?php
        include_once ("includes/footer.php");
    ?>

  </body>
</html>