<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 18-06-2018
 * Time: 13:14
 */
?>
<head>
    <?php
        if($page == "Login") {
            ?>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Main CSS-->
            <link rel="stylesheet" type="text/css" href="assets/css/main.css">

            <!-- Font-icon css-->
            <link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.min.css">

            <link rel="stylesheet" href="plugins/slider/style1.css">

            <link rel="stylesheet" href="assets/css/bootstrapValidator.min.css">

            <link rel="stylesheet" href="plugins/sweet-alert/sweetalert2.min.css">

            <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
<?php
        } elseif ($page=="Register" || $page == "verifyemail" || $page == "ChangePassword" || $page == "Reset") {
            ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/main.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../plugins/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../plugins/slider/style3.css">

            <link rel="stylesheet" href="../../plugins/sweet-alert/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">
<?php
        } elseif ($page == "StudentRegister"){
            ?>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <!-- Include Bootstrap CSS -->
            <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
            <!-- Optional Bootstrap theme -->
<!--            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">-->

            <!-- Include SmartWizard CSS -->
            <link href="../../plugins/smart-wizard/smart_wizard.css" rel="stylesheet" type="text/css" />

            <!-- Optional SmartWizard theme -->
            <link href="../../plugins/smart-wizard/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

            <link rel="stylesheet" type="text/css" href="../../assets/css/styles.css">

    <?php
        }
?>


    <title><?php echo $title; ?></title>
</head>
