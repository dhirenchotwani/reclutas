<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 6/17/2018
 * Time: 6:13 PM
 */

if($page == "Login" || $page == "Register"){
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
<?php
}
?>