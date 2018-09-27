<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 6/23/2018
 * Time: 10:22 AM
 */
?>
<!DOCTYPE html>
<html>
<?php
$user_role_session = $_SESSION['user_role_id'];
if($user_role_session != 5){
    show_404();
} else{
    ?>
    <body>

    <div class="register-page container">
        <div class="register-contents">
            <form action="<?php  ?>" class="register-student">

                <h3 class="register-head">Parents Details</h3>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="parent_name">Parents First Name:</label>
                        <input type="text" name="parent_name" id="parent_name" placeholder="Enter Parents First Name" class="form-control" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parent_email">Parent Email:</label>
                        <input type="text" name="parent_email" id="parent_email" placeholder="Enter Parents Email ID" class="form-control" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parent_phone">Parent Phone:</label>
                        <input type="text" name="parent_phone" id="parent_phone" placeholder="Enter Parents Contact Number" class="form-control" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parent_occupation">Parent Occupation:</label>
                        <input type="text" name="parent_occupation" id="parent_occupation" class="form-control" placeholder="Enter Parents Occupation" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parent_income">Parent Income:</label>
                        <input type="number" name="parent_income" id="parent_income" placeholder="Enter Parents Income" class="form-control" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="parent_gender">Parent Gender:</label>
                        <?php
                        $options=array(
                            'male' => 'Male',
                            'female' => 'Female',


                        );
                        $extra = array(
                            'class' =>'form-control',
                            'id' => 'parent_gender',
                        );
                        echo form_dropdown("parent_gender",$options,'male',$extra);
                        ?>
                        <div class="help-block with-errors"></div>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-md-6 ml-3">
                        <button class="btn btn-success" type="submit">Submit</button>
                        <button class="btn btn-danger" type="reset">Cancel</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


    </body>
<?php } ?>
</html>

