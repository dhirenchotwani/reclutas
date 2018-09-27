<?php
/**
 * Created by PhpStorm.
 * User: Vidhi
 * Date: 19-06-2018
 * Time: 12:56
 */

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model');
        $this->load->model('Login_model');
        $this->load->model('Registration_model');
        $this->load->model('Skills_model');
        $this->load->model('Project_model');
        $this->load->model('Post_model');
        $this->load->helper('url_helper');
    }
    
    public function show()
    {

        $isRegistered=$this->Register_model->getIsRegistered($_SESSION['user_id']);
        if(!$isRegistered)
            header("Location:../registration/show");
        else{
            //give call to method load($user) of dashnoard controller to load the dashboard for the passed user
            //$this->load($_SESSION['user_role_id']);

            //THIS WILL LOAD THE DASHBOARD FOR USERS
            $data['page'] = "Dashboard";
            $data['title'] = "Dashboard | Reclutas";

            $this->load->view('dashboard/typography', $data);
            //echo "Pages to be loaded when the user has successfully registered itself!!";

        }

    }

    public function show_profile(){
        $data['page'] = "Profile";
        $data['title'] = "Profile | Reclutas";
        $posts_set=$this->Post_model->getPostsWithCondition('user_id',$_SESSION['user_id'],0);
			$shared_posts_set=$this->Post_model->getSharedPostsWithConditon('user_id',$_SESSION['user_id']);
				
			$shared_posts_set=$shared_posts_set->result_array();
			$shared_posts_set=array_merge($shared_posts_set,$posts_set);
		$data['posts'] = $shared_posts_set;
     
		
		if($_SESSION['user_role_id']==5){			$data['student']=$this->Registration_model->getUserDetails("student",$_SESSION['user_id']);
        $this->load->view('dashboard/profilepage', $data);
		}
		else if($_SESSION['user_role_id']==4){
		
			$data['faculty']=$this->Registration_model->getUserDetails("faculty",$_SESSION['user_id']);
			$_SESSION['faculty_id']=$data['faculty']['faculty_id'];
//			echo $_SESSION['faculty_id']."HI";
       $this->load->view('dashboard/facultyprofilepage', $data);
			
		}
    }

    public function show_profile_about(){
        $data['page'] = "Profile";
        $data['title'] = "Profile - About | Reclutas";

    	if($_SESSION['user_role_id']==5){		
        $all_skills = $this->Skills_model->getAllSkills();
        $data['skills'] = $all_skills;

        $all_students  =$this->Project_model->getAllStudents();
        $data['students']  = $all_students;

        $all_faculty =$this->Project_model->getAllFaculty();
        $data['faculty']  = $all_faculty;
		
         $data['student']=$this->Registration_model->getUserDetails("student",$_SESSION['user_id']);
        
		$student_id = $this->Login_model->getStudentIdByUserId($_SESSION['user_id']);
        
		$data['student_skills'] = $this->Skills_model->getSkillsOfStudent($student_id);
			$this->load->view("dashboard/profileabout", $data);
		}
		else if($_SESSION['user_role_id']==4){
			$data['faculty']=$this->Registration_model->getuserDetails("faculty",$_SESSION['user_id']);
			$this->load->view("dashboard/facultyprofileabout", $data);
		}
		
//		$data['user']=$this->Login_model->getUserWithCondition("user_id",$_SESSION['user_id']);

        
    }
	
	public function show_announcements(){
		 $data['page'] = "Profile";
        $data['title'] = "Profile - Announcements | Reclutas";
		$this->load->view("dashboard/announcements/faculty");
	}


    public function addSkills(){
        $skills = $this->input->post("student_skills");
        $student_id = $this->Login_model->getStudentIdByUserId($_SESSION['user_id']);
        foreach ($skills as $skill){
            $this->Skills_model->addASkill($skill, $student_id);
        }
        header("Location: ../dashboard/show_profile_about");
    }

    public function deleteSkill($skill_id){
        $student_id = $this->Login_model->getStudentIdByUserId($_SESSION['user_id']);
        return $this->Skills_model->deleteSkill($skill_id,$student_id);
    }
    
    public function addProject(){
        $project_snap = $_FILES['project_snap']['tmp_name'];
        if($project_snap == ""){
            $project_snap = "";
        }else {
            $project_snap = addslashes(file_get_contents($project_snap));
        }

        $project_name = $this->input->post("project_name");
        $start_date = $this->input->post("start_date");
        $end_date = $this->input->post("end_date");
        $project_description = $this->input->post("project_description");
        $project_link = $this->input->post("project_link");
        $faculty_member = $this->input->post("faculty_member");
        //$team_members = $this->input->post("team_members");

        $student_id = $this->Login_model->getStudentIdByUserId($_SESSION['user_id']);

         $data = array(
            'project_name' => $project_name,
            'project_start' => $start_date,
            'project_end' => $end_date,
            'project_description' => $project_description,
            'project_link' => $project_link,
            'project_faculty_id' => $faculty_member,
        );
        $project_id = $this->Project_model->addProject($data);
        echo $project_id;


        $this->Project_model->insertIntoStudent($project_id, $student_id);


        /* foreach ($skills as $skill){
            $this->Skills_model->addASkill($skill, $student_id);
        } */
        //header("Location: ../dashboard/show_profile_about");
    }



    public function deletePost($post_id){
        return $this->Post_model->deletePost($post_id);
    }

    public function show_newsfeed(){
        header("Location: ../post/show_newsfeed");
    }

    public function changepassword(){
        $data['page'] = "ChangePassword";
        $data['title'] = "Change Passsword | Name of Project";
        $this->load->view('template/header', $data);
        $this->load->view('change-password');
        $this->load->view('template/footer', $data);
    }

    public function verify(){
        //echo "TEST";
        //$this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'ATTEMPTING TO CHANGE PASSWORD';
        $data['page'] = "ChangePassword";

        $this->form_validation->set_rules('user_password', 'PASSWORD', 'required');
        $this->form_validation->set_rules('confirm_user_password', 'CONFIRM PASSWORD', 'required');


        if ($this->form_validation->run() === FALSE)
        {
            echo "VALIDATON REQUIRED ";
            header("Location: ../../");

        }else{
            //echo  "ENTERED EVERYTHING<br>";
            $old_password = $this->input->post("old_user_password");

            $user_email_to_change = $_SESSION['user_email'];

            $result_set = $this->Register_model->getUserByEmail($user_email_to_change);
            if($row = $result_set->row_array()){
                $user_password_hashed = $row['user_password'];
                $user_db_id = $row['user_id'];

                if(password_verify($old_password, $user_password_hashed)) {
                    $data = array(
                        'user_password'=> $this->input->post("user_password") ,
                        'confirm_user_password'=>$this->input->post("confirm_user_password")
                    );

                    $password = $data['user_password'];
                    $hashedpass =  password_hash("$password", PASSWORD_BCRYPT);

                    if($old_password === $data['user_password']){
                        die("NEW PASSWORD AND OLD PASSWORD CANNOT BE SAME");
                    }

                    if($data['user_password']===$data['confirm_user_password']) {

                        $data = array(
                            'user_id' => $user_db_id,
                            'user_new_password' => $hashedpass
                        );

                        $this->Register_model->updatePassword($data);
                        $this->Register_model->updateFlag("is_first_login" , 0, $data);

                        header("Location: ../login/logout"); // Logout User
                        //$pass = "FTkJ1umYjy";
                    }
                    else{
                        //header("Location: ../dashboard/changepassword");//tell user to retry
                        echo "NEW PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH";
                    }

                } else{
                    echo "PLEASE ENTER OLD PASSWORD CORRECT";
                }
            }
        }
    }//end of verify
    }//end of class
    ?>