<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/12/2018
 * Time: 8:05 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<?php
    
    $user_role_session = $_SESSION['user_role_id'];
    if($user_role_session != 5){
        show_404();
    }else{
        $url_for_includes = APPPATH . "views/dashboard/includes/";
        include_once($url_for_includes . "header.php");
?>
<body>

<?php
   // include_once($url_for_includes . "left-sidebar.php");
   // include_once($url_for_includes . "right-sidebar.php");
   // include_once($url_for_includes . "header-bp.php")
?>


<!-- Main Container-->
<div class="container">
    <?php
        $attributes = array(
            'class'=>'needs-validation',
            'id' => 'needs-validation'
        );
        echo form_open('Student/addParents' , $attributes);
?>
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class=" container">
                    <div class="ui-block">
                        <div class="ui-block-content">
                                <div class="crumina-module crumina-heading with-title-decoration">
                                    <h5 class="heading-title">Parent Details</h5>
                                </div>
                                <h5 class="heading-title">Father Details</h5>
                                <div class="row">
                                    
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="father_parent_name" class="control-label">Parents First Name:</label>
                                            <input type="text" name="father_parent_name" id="father_parent_name" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="father_parent_email" class="control-label">Parent Email:</label>
                                            <input type="text" name="father_parent_email" id="father_parent_email" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="father_parent_phone" class="control-label">Parent Phone:</label>
                                            <input type="text" name="father_parent_phone" id="father_parent_phone" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="father_parent_occupation" class="control-label">Parent Occupation:</label>
                                            <input type="text" name="father_parent_occupation" id="father_parent_occupation" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="father_parent_income" class="control-label">Parent Income:</label>
                                            <input type="number" name="father_parent_income" id="father_parent_income" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                </div><!-- end of row -->


                                <h5 class="heading-title">Mother Details</h5>
                                <div class="row">
                                    
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="mother_parent_name" class="control-label">Parents First Name:</label>
                                            <input type="text" name="mother_parent_name" id="mother_parent_name" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="mother_parent_email" class="control-label">Parent Email:</label>
                                            <input type="text" name="mother_parent_email" id="mother_parent_email" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="mother_parent_phone" class="control-label">Parent Phone:</label>
                                            <input type="text" name="mother_parent_phone" id="mother_parent_phone" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="mother_parent_occupation" class="control-label">Parent Occupation:</label>
                                            <input type="text" name="mother_parent_occupation" id="mother_parent_occupation" class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="form-group label-floating">
                                            <label for="mother_parent_income" class="control-label">Parent Income:</label>
                                            <input type="number" name="mother_parent_income" id="mother_parent_income" placeholder="" class="form-control" required>
                                        </div>
                                    </div>
                                </div><!-- end of row -->





                                <div class="form-group row">
                                    <div class="col-md-12 col-12">
                                        <button class="btn btn-primary float-right ml-3" type="submit" name="addParents">SUBMIT</button>
                                        <button class="btn  btn-grey-light float-right" type="reset">Cancel</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    echo form_close();
?>          
</div><!-- end of container -->
</body>
<?php 
    include_once($url_for_includes . "footer.php");
    }
?>
</html>


