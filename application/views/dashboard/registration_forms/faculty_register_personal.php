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
    if($user_role_session != 4){
        show_404();
    } else{
?>
    <body>

<div class="container">
 <!-- <form class="needs-validation" action="../Faculty/addFaculty" novalidate> -->
 <?php
        $attributes = array(
            'class'=>'needs-validation',
            'id' => 'needs-validation'
        );
        echo form_open('Faculty/addFaculty' , $attributes);
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
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_first_name" id="faculty_first_name" required >
                                   
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Middle Name</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_middle_name" id="faculty_middle_name" required >
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_last_name" id="faculty_last_name" required >
                                    
                                </div>
                            </div>
							 <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Gender</label>
                                    <select name="faculty_gender" id="faculty_gender" required >
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Phone  Number</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_phone" id="faculty_phone" required >
                                    
                                </div>
                            </div>
                            
                             

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">DOB</label>
                                    <input class="form-control" type="date" placeholder="" value="" name="faculty_dob" id="faculty_dob" required >
                                </div>
                            </div>
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Department </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_department" id="faculty_department" required >
                                    
                                </div>
                            </div>
						  <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Designation </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_designation" id="faculty_designation" required >
                                    
                                </div>
                            </div>
                                                 
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Martial Status  </label>
                                     <select name="faculty_maritial_status" id="faculty_maritial_status" required >
                                        <option value="married">Married</option>
                                        <option value="single">Single</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Physically Challenged </label>
                                    <select name="faculty_physically_challenged" id="faculty_physically_challenged" required >
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    
                                </div>
                            </div>


                          

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Faculty Photo  </label>
                                    <input  type="file" placeholder="" value="" name="faculty_photo" id="faculty_photo" required >
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Faculty Signature Photo</label>
                                    <input  type="file" placeholder="" value="" name="faculty_signature_photo" id="faculty_signature_photo" required  >
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
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_address_flat" id="faculty_address_flat" required >
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Street </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_address_street" id="faculty_address_street" required >
                                   
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">City</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_address_city" id="faculty_address_city" required >
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">State</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_address_state" id="faculty_address_state" required >
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Pincode </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="faculty_address_pincode" id="faculty_address_pincode" required >
                                   
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
                <button class="btn btn-primary float-right ml-3" type="submit" name="addfaculty">Submit</button>
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







    

