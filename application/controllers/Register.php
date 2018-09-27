<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 18-06-2018
 * Time: 15:43
 */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model');
        $this->load->helper('url_helper');
        $this->load->library("encryption");
    }

    public function create(){
        $data['page'] = "Register";
        $data['title'] = "Register | Name of Project";
        $data['user_role']  = "";

        $this->load->view('template/header', $data);
        $this->load->view('template/footer', $data);
        $this->load->view('register_page');
    }

    public function  create_account(){

        $this->load->library('form_validation');
        $data['title'] = 'ATTEMPTING TO REGISTER BY ADMIN';
        $data['page'] = "Register";

        $this->form_validation->set_rules('user_email', 'EMAIL', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo "VALIDATON REQUIRED ";
            //header("Location: ../../");

        } else {

            $user_email = $this->input->post('user_email');

            $result_array = $this->Register_model->getUserByEmail($user_email);
            if($row_result = $result_array->row_array()){
                header("Location: create?show_notification=1&account_check=account_already");
            }
            else{
                //echo "ENTERED EVERYTHING<br>";
                require_once ("RandomPassword.php");
                $password= RandomPassword::generate();
                $hashedpass =  password_hash("$password", PASSWORD_BCRYPT);       //3 argu ie plain password,technique,options*/
                //echo $password;
                //echo "<br>";
                //echo  $hashedpass;
                //$hashedpass = hash('sha512', $password);
                $user_role_id = $this->input->post('user_role_id');
                //echo  $user_role_id;

                //echo $data['user_email'];
                //echo $data['user_role_id'];
                //echo  $data['user_password'];


                /*$key = bin2hex($this->encryption->create_key(16));
                echo $key;*/

                $plain_text_password = "password=$password";
                $ciphertext_password = $this->encryption->encrypt($plain_text_password);

                $data = array(
                    'user_email' => $user_email,
                    'user_role_id' => $user_role_id,
                    'user_password' => $hashedpass,
                    'is_first_login' => 1,
                    'is_email_verified'=> 0,
                    'user_token' => $ciphertext_password,
                );

                //echo $ciphertext . "<br>";
                // Outputs: This is a plain-text message!
                //echo $this->encryption->decrypt("2a70d8473369f39f99e769f3c0676de939501220122340efc78bad57f211e81c8a386b3a5638d1c8f6b2fee86b53500bed773c0471debac5d1fb3f4a4d10fc0bY0Lf+FYfYE2qeB5rMPq5K089WW/FzAhjQKCD7NE73FHeEOOM4MDhx+bRET5WApkS");

                $result_id = $this->Register_model->insert_user($data);
                //echo $result_id;

                $this->sendEmailToRecipient($user_email, $ciphertext_password);

                header("Location: create?show_notification=1&account_check=account_successful");
            }
        }
    }

    private function sendEmailToRecipient($email, $token){
        $plain_text_email = "$email";
        $ciphertext_email= $this->encryption->encrypt($plain_text_email);

        require_once("Mailer.php");
        $mailer = new Mailer();
        $user_email = "$email";
        $subject = "NameOfProject Account Confirmation";

        $base_url_link = base_url() . "index.php/register/verify?XSRS=$ciphertext_email&token=$token";
        $body = "
        <div style='font-family:Roboto; font-size:16px; max-width: 600px; line-height: 21px;'>    
            <h4>Hello,</h4>
            <h3>Your Recruitment Account is Ready.</h3>
            <br>  
            <a style='text-decoration:none; color:#fff; background-color:#348eda;border:solid #348eda; border-width:2px 10px; line-height:2;font-weight:bold; text-align:center; display:inline-block;border-radius:4px' href='$base_url_link'>
            Activate your account </a>
            <br>  
            <h3>Thank you for Registering.</h3>
            <br>
            <br>
            <h4>Sincerely,</h4>
            <h5>The Recruitment Team.</h5>
            </div>";

        $mailer->send_mail($user_email, $body, $subject);
    }

    public function verify() {
        $user_email = $_GET['XSRS']; //A KEYWORD USED FOR EMAIL FOR SECURITY PURPOSE
        $token = $_GET['token'];
        $user_email = str_replace(" ","+",$user_email);
        $decrypted_email = $this->encryption->decrypt($user_email);

        //echo "User email is $user_email and Token is $token";
        $token = str_replace(" ","+",$token);
        $decrypted_password = $this->encryption->decrypt($token);

        $pass_array = explode("=", "$decrypted_password");
        $password_is = $pass_array[1];
		
        $data = array(
            'title' => "Verify Email | NameOfProject",
            'page' => "verifyemail",
            'user_email' => $decrypted_email,
            'user_password' => $password_is
        );

        $result_array = $this->Register_model->getUserByEmail($decrypted_email);

        if($row = $result_array->row_array()){
            $is_email_verify = $row['is_email_verified'];
            //$email_id = $row['user_email'];
            $user_token = $row['user_token'];
            //echo $is_email_verify . " " . $email_id;

            if($is_email_verify == 0 && $user_token != "" ){
                $this->load->view('template/header', $data);
                $this->load->view('template/verified_page', $data);
                $this->load->view('template/footer', $data);
                $this->Register_model->update_user_verification($data);
            } else{
                echo "<h2> EMAIL ALREADY VERIFIED </h2>";
            }
        } else{
            echo "<h2> NO SUCH USER FOUND </h2>";
        }

    }
    
    
    /****************************FORGOT PASSWORD*****************************/
    public function forgot(){
        //echo 'CAME';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_email', 'EMAIL', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            echo "VALIDATON REQUIRED ";
            header("Location: ../../?show_notification=1&validation=false");

        }else {
            echo "ENTERED EMAIL<br>";
            $data = array(
                'user_email' => $this->input->post("user_email")
            );
            $user_email = $data['user_email'];
            $result_array = $this->Register_model->getUserByEmail($user_email);

            if($row = $result_array->row_array()){
                echo "USER FOUND IN THE DB";   //Send Mail and update the token
                $user_id = $row['user_id'];
                $length = 500;
                $token = bin2hex(openssl_random_pseudo_bytes($length)); //Generate a Random Token

                $this->Register_model->UpdateToken($token, $user_id);
                $this->sendEmailForForgotPassword($user_email, $token);
                echo "MAIL SENT SUCCESSFULLY";
                header("Location: ../../?show_notification=1&reset=successful");

            }else{
                echo "NO SUCH USER EXISTS";
            }
        }
    }// END OF FUNC

    /*******************SEND MAIL FOR FORGOT PASS******************************/
    private function sendEmailForForgotPassword($email, $token){
        /*This function takes the email and sends the email using Php Mailer which accepts three arguments ie body, email, subject*/

        $plain_text_email = "$email";
        $ciphertext_email= $this->encryption->encrypt($plain_text_email);

        require_once("Mailer.php");
        $mailer = new Mailer();
        $user_email = "$email";
        $subject = "Forgot Password Request";
        $base_url_link = base_url() . "index.php/register/reset?XSRS=$ciphertext_email&token=$token";

        $body = "
        <form action=''>
            <div style='font-family:Roboto; font-size:16px; max-width: 600px; line-height: 21px;'>    
            <h4>Hello,</h4>
            <h3>Your Reset Password for Recruitment Account.</h3>
            <br>  
            <br>
            <a style='text-decoration:none; color:#fff; background-color:#348eda; border:solid #348eda; border-width:3px 10px; line-height:2; font-weight:bold; text-align:center; display:inline-block; border-radius:4px' href='$base_url_link'>
            RESET THE PASSWORD</a>
            <br>
            <br>
            <br>
            Sincerely,
            <br>
            The Recruitment Team.
            </div>
        </form>";

        $mailer->send_mail($user_email, $body, $subject);
    }//end of func


    /******************************RESET***************************/
    public function reset(){
        /*This function takes the user to the Reset Page in case of Forgot Password*/
        $user_email = $_GET['XSRS'];         //A KEYWORD USED FOR EMAIL FOR SECURITY PURPOSE
        $token = $_GET['token'];
        $user_email = str_replace(" ","+",$user_email);
        $decrypted_email = $this->encryption->decrypt($user_email);

        $result_array = $this->Register_model->getUserByEmail($decrypted_email);
        if($row = $result_array->row_array()) {    //User Exists
            $user_db_token = $row['user_token'];
            $user_db_id = $row['user_id'];

            $data = array(
                'title' => "Reset Password| NameOfProject",
                'page' => "Reset",
                'user_email' => $decrypted_email,
                'user_token' => $token,
                'user_db_id' => $user_db_id,
            );
            if($user_db_token === $data['user_token']){ //Wen the token Matches
                $this->load->view('template/header', $data);
                $this->load->view('reset_page', $data);
                $this->load->view('template/footer', $data);
            }else{
                echo  "TOKEN DOESN'T MATCHES";
            }

        }//end of if

    }//end of function


    
    public function changePassword()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('user_email', 'EMAIL', 'required');
        if ($this->form_validation->run() === FALSE) {
            echo "VALIDATON REQUIRED ";
            header("Location: ../../?validation=false");

        } else {
            echo "ENTERED BOTH PASSWORD <br>";
            $data = array(
                'user_password' => $this->input->post("user_password"),
                'confirm_user_password' => $this->input->post("confirm_user_password"),
                'user_email' => $this->input->post("user_email"),
            );

            if ($data['user_password'] === $data['confirm_user_password']) {
                $password = $data['user_password'];
                $hashedpass = password_hash("$password", PASSWORD_BCRYPT);

                $result_array = $this->Register_model->getUserByEmail($data['user_email']);

                if ($row = $result_array->row_array()) {
                    $user_id = $row['user_id'];
                    $this->Register_model->update_user_verification($data);

                    $data = array(
                        'user_id' => $user_id,
                        'user_new_password' => $hashedpass,
                    );

                    $this->Register_model->updatePassword($data);
                    echo "PASSWORD UPDATED SUCCESSFULLY";

                } else {
                    echo "NO SUCH STUFF FOUND";
                }
            }
        }
    }//end of func


} // end  of CONTROLLER
?>


