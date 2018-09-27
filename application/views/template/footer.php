<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 18-06-2018
 * Time: 13:14
 */
?>
<?php
    if($page == "Login"){
    ?>
    <!-- Essential javascripts for application to work-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="plugins/pace.min.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function() {
            $('.login-box').toggleClass('flipped');
            return false;
        });
    </script>
    <script src="plugins/slider/modernizr.custom.86080.js"></script>
    <script src="assets/js/bootstrapvalidator.min.js"></script>
        <script src="plugins/sweet-alert/sweetalert2.min.js"></script>
    <script src="assets/js/scripts.js"></script>
<?php
    } elseif ($page == "Register" || $page == "verifyemail" || $page == "ChangePassword" || $page == "Reset"){
        ?>

        <!-- Essential javascripts for application to work-->
        <script src="../../assets/js/jquery-3.2.1.min.js"></script>
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/main.js"></script>
        <!-- The javascript plugin to display page loading on top-->
        <script src="../../plugins/pace.min.js"></script>
        <script type="text/javascript">
            // Login Page Flipbox control
            $('.login-content [data-toggle="flip"]').click(function() {
                $('.login-box').toggleClass('flipped');
                return false;
            });
        </script>
        <script src="../../plugins/slider/modernizr.custom.86080.js"></script>
        <script src="../../plugins/sweet-alert/sweetalert2.min.js"></script>
        <script src="../../assets/js/scripts.js"></script>


<?php
    } elseif ($page == "StudentRegister"){
        ?>

        <!-- Include jQuery -->
        <script src="../../assets/js/jquery-3.2.1.min.js"></script>
        <!-- Include jQuery Validator plugin -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>

        <!-- Include SmartWizard JavaScript source -->
        <script type="text/javascript" src="../../plugins/smart-wizard/jquery.smartWizard.min.js"></script>

<?php
    }
?>
