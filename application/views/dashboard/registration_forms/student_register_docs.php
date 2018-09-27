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
    //include_once($url_for_includes . "left-sidebar.php");
   // include_once($url_for_includes . "right-sidebar.php");
   // include_once($url_for_includes . "header-bp.php")
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
 <?php
        $attributes = array(
            'class'=>'needs-validation',
            'id' => 'needs-validation'
        );
        echo form_open_multipart('Student/addDocuments' , $attributes);
?>
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">

                <div class="ui-block-content">
                    <div class="crumina-module crumina-heading with-title-decoration">
                        <h5 class="heading-title">Personal Documents</h5>
                    </div>
                        <div class="row">
                            
                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Aadhar Number</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="aadhar_number" id="aadhar_number" required>
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                           
                            <!-- <div class="file-upload">
                                <label for="upload" class="file-upload__label bg-breez">Upload</label>
                                <input id="upload" class="file-upload__input m-5" type="file" name="aadhar_image" id="aadhar_image" required>
                            </div> -->
                           
                                <div class="form-group label-floating">
                                    <label class="control-label">Aadhar Card</label>
                                    <input type="file" placeholder="" value="" name="aadhar_image" id="aadhar_image" required>
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Pan Number</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="pan_number" id="pan_number" required>
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Pan Card</label>
                                    <input type="file" placeholder="" value="" name="pan_image" id="pan_image" required>
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Passport Number</label>
                                    <input class="form-control" type="text" placeholder="" value="" name="passport_number" id="passport_number" required>
                                    
                                </div>
                            </div>

                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Passport</label>
                                    <input  type="file" placeholder="" value="" name="passport_image" id="passport_image" required>
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Driving License Number:</label>
                                    <input  class="form-control" type="text" placeholder="" value="" name="driving_licence_number" id="driving_licence_number" required>
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Driving License </label>
                                    <input  type="file" placeholder="" value="" name="driving_licence_image" id="driving_licence_image" required>
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Bank Account Number </label>
                                    <input class="form-control" type="text" placeholder="" value="" name="bank_account_number" id="bank_account_number" required>
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Caste Certificate </label>
                                    <input  type="file" placeholder="" value="" name="caste_certificate" id="caste_certificate" required>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Birth Certificate </label>
                                    <input  type="file" placeholder="" value="" name="birth_certificate" id="birth_certificate" required>
                                    
                                </div>
                            </div>


                            <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Leaving Certificate: </label>
                                    <input  type="file" placeholder="" value="" name="leaving_certificate" id="leaving_certificate" required>
                                    
                                </div>
                            </div>


                            </div><!-- end of row -->

                          </div>  
                        </div>  <!-- End of ui block -->
        </div>  <!-- End of col -->
    </div><!-- END OF ROW -->  


        
        
    <div class="form-group row">
        <div class="col-md-12 col-12">
            <button class="btn btn-primary float-right ml-3" type="submit" name="addDocuments">SUBMIT</button>
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







    

