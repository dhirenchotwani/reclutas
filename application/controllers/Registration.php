<?php
/**
 * Created by PhpStorm.
 * User: Vidhi
 * Date: 20-06-2018
 * Time: 23:32
 */?>
<?php
class Registration extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('Registration_model');
        
    }


    public function show()
    {   
    
        $user=$_SESSION['user_role_id'];
        $data['page'] = "Registration";
        $data['title'] = "Registration | Reclutas.in";

        switch($user){
        case 2:
            $this->load->view('register/company.php');
            break;
        case 3:
            $this->load->view('register/placement_officer.php');
            break;
        case 4:

            $data['page'] = "FacultyRegister";
            $data['title'] = "Faculty - Student | Reclutas.in";

            /*OPEN FACULTY REGISTRATION*/
            /*FORM ACTION SHOULD BE Faculty/addFaculty and BUTTON NAME BE addFaculty*/

              $this->load->view("dashboard/registration_forms/faculty_register_personal", $data);
            break;
        case 5:
            $data['page'] = "StudentRegister";
            $data['title'] = "Register - Student | Reclutas.in";

            /*OPEN STUDENT PERSONAL DETAILS REGISTRATION*/
            /*FORM ACTION SHOULD BE Student/addStudent and BUTTON NAME BE addStudent*/


            /*$this->load->view('dashboard/includes/header', $data);
            $this->load->view('dashboard/includes/footer', $data);
            $this->load->view('dashboard/includes/navbar', $data);
            $this->load->view('dashboard/includes/left_sidebar', $data);
            $this->load->view('dashboard/dashboard', $data);*/

            $this->load->view("dashboard/registration_forms/student_register_personal", $data);
            break;
        default:
                echo "User session id not set!";
        }
        //$this->load->view('template/footer', $data);
        
    }

   
}
?>