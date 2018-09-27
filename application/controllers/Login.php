<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct(){
        parent::__construct();
        
        $this->load->model('Login_model');
        $this->load->helper('url_helper');
        $this->load->library("encryption");
    }


	public function index(){

        if(isset($_COOKIE["Recruitment_User"])){
            $user_id = $this->encryption->decrypt($_COOKIE["Recruitment_User"]);
            //echo $user_id;
            $result_array = $this->Login_model->getUserByUserId($user_id);
            if($result_array){
                $row_array = $result_array->row_array();
                $this->setSession($row_array);

                $url = "";
                if($row_array['user_role_id'] == 1){
                    $url = base_url() . "index.php/register/create";
                } elseif ($row_array['user_role_id'] == 2 || $row_array['user_role_id'] == 3 || $row_array['user_role_id'] == 4 || $row_array['user_role_id'] == 5){
                    if($row_array['is_first_login'] == 1){
                        $url = base_url() . "index.php/dashboard/changepassword";
                    } else{
                        $url = base_url() . "index.php/dashboard/show";
                    }
                }
                header("Location: $url");
            }

        } else{
            $data['page'] = "Login";
            $data['title'] = "Login | Name of Project";

            $this->load->view('template/header', $data);
            $this->load->view('template/footer', $data);
            $this->load->view('login_page');
        }
	}

	public function logout(){

        $cookie_name = "Recruitment_User";
        $user_id_to_logout = $_SESSION['user_id'];
        $encrypt_id = $this->encryption->encrypt($user_id_to_logout);
        $cookie_content = $encrypt_id;
        $cookie_time = time() - 86400 * 30;
        $path = "/";
        setcookie($cookie_name, $cookie_content, $cookie_time, $path);
		
        $_SESSION['user_id'] = "";
        $_SESSION['user_email'] = "";
        $_SESSION['user_role_id'] = "";
        session_destroy();

        header("Location: ../../?show_notification=1&logout=1");
    }

    public function setSession($row_array){
        $_SESSION['user_id'] = $row_array['user_id'];
        $_SESSION['user_email'] = $row_array['user_email'];
        $_SESSION['user_role_id'] = $row_array['user_role_id'];
	}
	
  
    public function login($data){
        $row_array = $this->Login_model->get_user($data);
        if($row_array){
            //echo $row_array['user_email'];

            if(password_verify($data['user_password'], $row_array['user_password']) && $data['user_email'] === $row_array['user_email']) {
                if($row_array['user_role_id'] == 1){
                    $url = base_url() . "index.php/register/create";
                } elseif ($row_array['user_role_id'] == 2 || $row_array['user_role_id'] == 3 || $row_array['user_role_id'] == 4 || $row_array['user_role_id'] == 5){
                    if($row_array['is_first_login'] == 1){
                        $url = base_url() . "index.php/dashboard/changepassword";
                    } else{
                        $url = base_url() . "index.php/dashboard/show";
                    }
                }

                $this->setSession($row_array);

                $signed_in = $this->input->post("stay_signed_in");

                if($signed_in){
                    $cookie_name = "Recruitment_User";
                    $user_id_to_login = $row_array['user_id'];
                    $encrypt_id = $this->encryption->encrypt($user_id_to_login);
                    $cookie_content = $encrypt_id;
                    $cookie_time = time() + 86400 * 30;
                    $path = "/";
                    setcookie($cookie_name, $cookie_content, $cookie_time, $path);
                } else{
                    $cookie_name = "Recruitment_User";
                    $user_id_to_login = $row_array['user_id'];
                    $encrypt_id = $this->encryption->encrypt($user_id_to_login);
                    $cookie_content = $encrypt_id;
                    $cookie_time = time() + 3600;
                    $path = "/";
                    setcookie($cookie_name, $cookie_content, $cookie_time, $path);
                }

            } else{
                $url = "../../?wronguser=true";
            }

        } else{
            $url = "../../?nosuchuser=true";
        }
        header("Location: $url");
    }

	public function verify(){
        //echo "TEST";
        //$this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'ATTEMPTING TO LOGIN';
        $data['page'] = "Login";

        $this->form_validation->set_rules('user_email', 'EMAIL', 'required');
        $this->form_validation->set_rules('user_password', 'PASSWORD', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            echo "VALIDATON REQUIRED ";
            header("Location: ../../?validation=false");

        }else{
            echo  "ENTERED EVERYTHING<br>";
            $data = array(
                    'user_email'=> $this->input->post("user_email") ,
                    'user_password'=>$this->input->post("user_password")
            );
            $this->login($data);
            ?>
            <script>
                window.alert("Data added successfully!");
            </script>
        <?php
        }

    }


}
?>
