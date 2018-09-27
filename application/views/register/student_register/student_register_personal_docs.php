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

                <h3 class="register-head">Personal Documents Details</h3>

                <div class="row">
                    <div class="from-group col-md-6">
                        <label for="aadhar_number">Aadhar Number:</label>
                        <input type="number" class="form-control" name="aadhar_number" id="aadhar_number" placeholder="Enter your 12 digit Aadhar Number" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="aadhar_image">Aadhar Card:</label>
                        <input type="file" class="form-control" name="aadhar_image" id="aadhar_image" placeholder="Aadhar Image" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="pan_number">Pan Number:</label>
                        <input type="text" class="form-control" name="pan_number" id="pan_number" placeholder="Enter your 9 character PAN Number" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="pan_image">Pan Card:</label>
                        <input type="file" class="form-control" name="pan_image" id="pan_image" placeholder="" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="passport_number">Passport Number:</label>
                        <input type="text" class="form-control" name="passport_number" id="passport_number" placeholder="Enter your 8 characters PASSPORT Number" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="passport_image">Passport:</label>
                        <input type="file" class="form-control" name="passport_image" id="passport_image" placeholder="" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="driving_license_number">Driving License Number:</label>
                        <input type="text" class="form-control" name="driving_license_number" id="driving_license_number" placeholder="Enter Your 15 character DRIVING Licence Number" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="driving_license_image">Driving License:</label>
                        <input type="file" class="form-control" name="driving_license_image" id="driving_license_image" placeholder="" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="bank_account_number">Bank Account Number:</label>
                        <input type="text" class="form-control" name="bank_account_number" id="bank_account_number" placeholder="Enter Your 16 digits Bank Account Number" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="caste_certificate">Caste Certificate:</label>
                        <input type="file" class="form-control" name="caste_certificate" id="caste_certificate" placeholder="" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="birth_certificate">Birth Certificate:</label>
                        <input type="file" class="form-control" name="birth_certificate" id="birth_certificate" placeholder="" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="from-group col-md-6">
                        <label for="leaving_certificate">Leaving Certificate:</label>
                        <input type="file" class="form-control" name="leaving_certificate" id="leaving_certificate" placeholder="" required>
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

