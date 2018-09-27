<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/12/2018
 * Time: 7:20 PM
 */
?>
<!DOCTYPE html>
<html>
<?php
    $url_for_includes = APPPATH . "views/dashboard/includes/";
    include_once($url_for_includes . "header.php");
?>

<?php
   // include_once($url_for_includes . "left-sidebar.php");
    //include_once($url_for_includes . "right-sidebar.php");
    //include_once($url_for_includes . "header-bp.php")
?>
<body>

<?php
    $user_role_session = $_SESSION['user_role_id'];
    if($user_role_session != 5){
        show_404();
    } else{
?>
    <body>

<div class="container">
 <!-- <form class="needs-validation" action="../Student/addStudent" novalidate> -->
 <?php
        $attributes = array(
            'class'=>'needs-validation',
            'id' => 'needs-validation'
        );
        echo form_open('Student/addStudent' , $attributes);
?>
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">

                <div class="ui-block-content">
                    <div class="crumina-module crumina-heading with-title-decoration">
                        <h5 class="heading-title">Personal Details</h5>
                    </div>
                        <div class="row">
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">First Name</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_first_name" id="student_first_name" required>
                                   
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_last_name" id="student_last_name" required>
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Enrollment ID Name</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_enrollment_id" id="student_enrollment_id" required>
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Branch </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_branch" id="student_branch" required>
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Phone  Number</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_phone" id="student_phone" required>
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">DOB</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_dob" id="student_dob" required>
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Gender</label>
                                    <select name="student_gender" id="student_gender" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Blood Group </label>
                                    <select name="student_blood_group" id="student_blood_group" required>
                                        <option value="a+">A+</option>
                                        <option value="b+">B+</option>
                                        <option value="o+">O+</option>
                                        <option value="ab+">AB+</option>
                                        <option value="a-">A-</option>
                                        <option value="b-">B-</option>
                                        <option value="o-">O-</option>
                                        <option value="ab-">AB-</option>
                                    </select>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Mother Tongue </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_mother_toungue" id="student_mother_toungue" required>
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Religion </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_religion" id="student_religion" required>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nationality </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_nationality" id="student_nationality" required>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Subcaste </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_sub_caste" id="student_sub_caste" required>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Caste Category </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_cast_category" id="student_cast_category" required>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Martial Status  </label>
                                     <select name="student_maritial_status" id="student_maritial_status" required>
                                        <option value="married">Married</option>
                                        <option value="single">Single</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Physically Challenged </label>
                                    <select name="student_physically_challenged" id="student_physically_challenged" required>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Place of Birth </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_place_of_birth" id="student_place_of_birth" required>
                                   
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Student Photo  </label>
                                    <input  type="file" placeholder="" value="" name="student_photo" id="student_photo" required>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Signature Photo</label>
                                    <input  type="file" placeholder="" value="" name="student_signature_photo" id="student_signature_photo" required >
                                </div>
                            </div>


                            </div><!-- end of row -->

                          </div>  
                        </div>  <!-- End of ui block -->
        </div>  <!-- End of col -->
    </div><!-- END OF ROW -->  


        <!-- ADRRESS BLOCK -->
        <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <div class="ui-block-content">
                    <div class="crumina-module crumina-heading with-title-decoration">
                        <h5 class="heading-title">Address Details</h5>
                    </div>
                        <div class="row">
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Flat </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_address_flat" id="student_address_flat" required>
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Street </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_address_street" id="student_address_street" required>
                                   
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">City</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_address_city" id="student_address_city" required>
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">State</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_address_state" id="student_address_state" required>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Pincode </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="student_address_pincode" id="student_address_pincode" required>
                                   
                                </div>
                            </div>
                                
                                            
                            </div><!-- end of row -->
                          </div>  
                        </div>  
                    </div>  
                </div>  
        <!-- ADRRESS BLOCK -->
        
        <div class="form-group row">
            <div class="col-md-12 col-12">
                <button class="btn btn-primary float-right ml-3" type="submit" name="addStudent">Submit</button>
                <button class="btn  btn-grey-light float-right" type="reset">Cancel</button>
            </div>
        </div>
<?php
    echo form_close();
?>                              
</div>      <!-- End of container -->

</body>
<?php 
    include_once($url_for_includes . "footer.php");
    }
?>
</html>    







    

