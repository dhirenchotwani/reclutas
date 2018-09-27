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

                <h3 class="register-head">Personal Details</h3>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="student_first_name">First Name:</label>
                        <input type="text" class="form-control" name="student_first_name" id="student_first_name" placeholder="Write your First Name" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_last_name">Last Name:</label>
                        <input type="text" class="form-control" name="student_last_name" id="student_last_name" placeholder="Write your Last Name" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_enrollment_id">Enrollment Id:</label>
                        <input type="number" class="form-control" name="student_enrollment_id" id="student_enrollment_id" placeholder="Write your Enrollment Id" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="student_branch">Branch:</label>
                        <input type="text" class="form-control" name="student_branch" id="student_branch" placeholder="Write your Branch" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_contact">Contact No.</label>
                        <input type="number" class="form-control" name="student_phone" id="student_phone" placeholder="Write your Contact Number" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_dob">Date Of Birthday</label>
                        <input type="text" class="form-control" name="student_dob" id="student_dob" placeholder="Place Of Birthday" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_gender">Gender</label>
                        <?php
                        $options=array(
                            'male' => 'Male',
                            'female' => 'Female',


                        );
                        $extra = array(
                            'class' =>'form-control',
                            'id' => 'student_gender',
                        );
                        echo form_dropdown("student_gender",$options,'male',$extra);
                        ?>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="student_blood_group">Blood Group</label>
                        <?php
                        $options=array(
                            'a+' => 'A+',
                            'b+' => 'B+',
                            'o+' => 'O+',
                            'ab+' => 'AB+',
                            'a-' => 'A-',
                            'b-' => 'B-',
                            'o-' => 'O-',
                            'ab-' => 'AB-',

                        );
                        $extra = array(
                            'class' =>'form-control',
                            'id' => 'student_blood_group',
                        );
                        echo form_dropdown("student_blood_group",$options,'a+',$extra);
                        ?>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="student_mother_tongue">Mother tongue:</label>
                        <input type="text" class="form-control" name="student_mother_tongue" id="student_mother_tongue" placeholder="Write your Mothertongue" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_religion">Religion</label>
                        <input type="text" class="form-control" name="student_religion" id="student_religion" placeholder="Write your Religion" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_nationality">Nationality</label>
                        <input type="text" class="form-control" name="student_nationality" id="student_nationality" placeholder="Write Your Nationality" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_sub_caste">SubCaste</label>
                        <input type="text" class="form-control" name="student_sub_caste" id="student_sub_caste" placeholder="Write your Sub Caste" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_cast_category">Cast Category</label>
                        <input type="text" class="form-control" name="student_cast_category" id="student_cast_category" placeholder="Write your Caste" required>
                        <div class="help-block with-errors"></div>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="student_marital_status">Marital Status:</label>
                        <?php
                        $options=array(
                            'married' => 'Married',
                            'single' => 'Single',
                        );
                        $extra = array(
                            'class' =>'form-control',
                            'id' => 'student_marital_status',
                        );
                        echo form_dropdown("student_marital_status",$options,'single',$extra);
                        ?>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="challenged">Physically Challenged</label>
                        <?php
                        $options = array(
                            'yes'=> 'Yes',
                            'no'=> 'No',
                        );
                        $extra = array(
                            'class' => 'form-control',
                            'id' => 'student_physically_challenged',
                        );

                        echo  form_dropdown( "student_physically_challenged" , $options , 'no' ,$extra);
                        ?>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_place_of_birth">Place Of Birth</label>
                        <input type="text" class="form-control" name="student_place_of_birth" id="student_place_of_birth" placeholder="Place Of Birth" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_photo">Photo</label>
                        <input type="file" class="form-control" name="student_photo" id="student_photo" placeholder="" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_signature_photo">Photo</label>
                        <input type="file" class="form-control" name="student_signature_photo" id="student_signature_photo" placeholder="" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_address_flat">Flat</label>
                        <input type="text" class="form-control" name="student_address_flat" id="student_address_flat" placeholder="Write your Flat" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_address_street">Street</label>
                        <input type="text" class="form-control" name="student_address_street" id="student_address_street" placeholder="Write your Street" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_address_city">City</label>
                        <input type="text" class="form-control" name="student_address_city" id="student_address_city" placeholder="Write your City" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_address_state">State</label>
                        <input type="text" class="form-control" name="student_address_state" id="student_address_state" placeholder="Write your state" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_address_pincode">Pincode</label>
                        <input type="text" class="form-control" name="student_address_pincode" id="student_address_pincode" placeholder="Write your Pincode" required>
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
