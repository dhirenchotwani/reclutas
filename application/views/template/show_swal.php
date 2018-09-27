<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 6/26/2018
 * Time: 9:28 PM
 */
?>
<script>
    <?php
        if(isset($_GET['show_notification'])){
            $title = $text = $type = $where_to = "";
            if(isset($_GET['account_check'])){
                $what_to_do = $_GET['account_check'];
                $title = "Account Creation";
                switch ($what_to_do){
                    case "account_already":
                        $text = "Account cannot be created as the account with same email already exists";
                        $type = "error";
                        break;

                    case "account_successful":
                        $text = "An Email has been sent to the entered Account for confirmation";
                        $type = "success";
                        break;
                }
                $where_to = "create";

            } elseif (isset($_GET['logout'])){
                $title = "Logged Out";
                $text = "You have been successfully Logged out of session";
                $type = "success";
                $where_to = "../recruitment";
            } elseif( isset($_GET['reset'])){
                $title = "Reset Password";
                $text = "An email has been sent successfully to your account to change password";
                $type = "success";
                $where_to = "../recruitment";
            } elseif( isset($_GET['validation'])){
                $title = "Input Issues";
                $text = "You may have some input fields empty";
                $type = "error";
                $where_to = "../recruitment";
            } elseif ( isset($_GET['reported_post'])){
                if($_GET['reported_post']){
                    $title = "Report Post";
                    $text = "The Post have been successfully reported";
                    $type = "success";
                    $where_to = "../dashboard/show_newsfeed";
                } else{
                    $title = "Report Post";
                    $text = "There was an error in reporting Post";
                    $type = "error";
                    $where_to = "../dashboard/show_newsfeed";
                }
            }elseif(isset($_GET['postdeleted'])){
                if($_GET['postdeleted']){
                    $title = "Delete Post";
                    $text = "The Post have been successfully deleted";
                    $type = "success";
                    $where_to = "../dashboard/show_newsfeed";
                } else{
                    $title = "Report Post";
                    $text = "There was an error in deleting Post";
                    $type = "error";
                    $where_to = "../dashboard/show_newsfeed";
                }
            }
            ?>

    swal({
        title: "<?php echo $title; ?>",
        text: "<?php echo $text; ?>",
        type: "<?php echo $type; ?>"
    }).then(function () {
        window.location.href = "<?php echo $where_to; ?>";
    })

    <?php


        }


    ?>

</script>

