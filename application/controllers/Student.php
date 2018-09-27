<?php
/*
this controller deals with the registrations of the student and loading  of the first personal details form. This controller is routed from registration model whenever a user with user_role ="STUDENT" logs in for the first time or needs to add/update its registration form
*/
class Student extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Registration_model');
        $this->load->model('Register_model');
         $this->load->model('Post_model');
    }

/*this function loads the different student registration pages 
    INPUT --> Form(View) name which is to be loaded
    RETURNS --> NONE
*/    public function loadPage($page_name){
        $data['page'] = "Registration";
        $data['title']="Student Registration";
        $this->load->view('template/header',$data);
        $this->load->view('register/student/'.$page_name);
        $this->load->view('template/footer',$data);
            
    }
/*
This function is called when submit button("addStudent) of student_register_personal form is clicked which 
1.adds the details of the student registering into the "student" table 
2.Sets the student session id which is used to in later views
3.Loads the student_personal_documents view once the details are added
INPUT --> NONE
RETURNS -->NONE
*/
        
     public function addStudent(){
      if(isset($_POST["addStudent"])){
          extract($_POST);
        
        
      include_once("Functions.php");
        $func=new Functions(); 
               if(isset($_FILES['student_photo']['name']) && $_FILES['student_signature_photo']['name']){
             
          
            $img=$_FILES['student_photo']['name'];
            $img_tmp=$_FILES['student_photo']['tmp_name'];
                   
            $sig=$_FILES['student_signature_photo']['name'];
            $sig_tmp=$_FILES['student_signature_photo']['tmp_name'];
                   
            $random=$func->convertToPdf($img_tmp,$student_first_name);
            $sign=$func->convertToPdf($sig_tmp,$student_first_name."Sign");
            
        }
           
           $data = array(
               'user_id'=>$_SESSION['user_id'],
               'student_first_name'=>$student_first_name,
               'student_last_name'=>$student_last_name,
               'student_enrollment_id'=>$student_enrollment_id,
               'student_branch'=>$student_branch,
               'student_phone'=>$student_phone,
               'student_dob'=>$student_dob,
               'student_blood_group'=>$student_blood_group,
               'student_gender'=>$student_gender,
               'student_mother_toungue'=>$student_mother_toungue,
               'student_religion'=>$student_religion,
               'student_nationality'=>$student_nationality,
               'student_sub_caste'=>$student_sub_caste,
               'student_cast_category'=>$student_cast_category,
               'student_maritial_status'=>$student_maritial_status,
    'student_physically_challenged'=>$student_physically_challenged,
               'student_place_of_birth'=>$student_place_of_birth,
               'student_address_flat'=>$student_address_flat,
               'student_address_street'=>$student_address_street,
               'student_address_city'=>$student_address_city,
               'student_address_state'=>$student_address_state,
               'student_address_pincode'=>$student_address_pincode
                  
              
           );
//           $_SESSION['student_id']=$this->Registration_model->insert("student",$data);
           if($_SESSION['student_id'] = $this->Registration_model->insert("student",$data)){
                $data['page'] = "StudentRegister";
                $data['title'] = "Register - Student | Reclutas.in";
                 $this->load->view("dashboard/registration_forms/student_register_parents", $data);
           }else{
               echo "SOME ERROR";
           }

         /*GIVE THE PAGE NAME OF THE NEXT VIEW TO BE LOADED*/
         /*$this->loadPage("page_name");*/
          /*FORM ACTION SHOULD BE Student/addDocuments AND BUTTON NAME addDocuments*/
         /*$this->loadPage("student_register_personal_docs");*/


       }
         //****************     nikhil your modal code here ****************
               
        }
    
          
/*
This function is called when submit button("addDocuments) of student_register_personal_docs form is clicked which 
1.adds the digital documents of the student registering into the "student_documents" table 
2.Performs the OCR on the documents that are being uploaded
************************** DO THIS **************************
3.Converts the uploading documents into .pdf file which is to be served on the server temporary.
4.Loads the student_register_parents view once the OCR has been completed successfully and the pdfs are formed.
5. sets the isRegistered column in the user table to 1 for the user indicating that the user has successfully registered itself.
    1 --> successfully registered
    0 --> still registering/unsuccessfull registering
3.Loads the Dashboard for the user.
INPUT --> NONE
RETURNS -->NONE
*/
    public function addDocuments(){
        if(isset($_POST['addDocuments'])){
            extract($_POST);
            require_once("Functions.php");
           $func=new Functions();
            
            
            $adhaar_img=$_FILES['aadhar_image']['name'];
            $adhaar_img_tmp=$_FILES['aadhar_image']['tmp_name'];
            $pan_img=$_FILES['pan_image']['name'];
            $pan_img_tmp=$_FILES['pan_image']['tmp_name'];
            $pass_img=$_FILES['passport_image']['name'];
            $pass_img_tmp=$_FILES['passport_image']['tmp_name'];
            $lsc_img=$_FILES['driving_licence_image']['name'];
            $lsc_img_tmp=$_FILES['driving_licence_image']['tmp_name'];
            $caste_img=$_FILES['caste_certificate']['name'];
            $caste_img_tmp=$_FILES['caste_certificate']['tmp_name'];
            $birth_img=$_FILES['birth_certificate']['name'];
            $birth_img_tmp=$_FILES['caste_certificate']['tmp_name'];
            $leaving_img=$_FILES['leaving_certificate']['name'];
            $leaving_img_tmp=$_FILES['leaving_certificate']['tmp_name'];
            $username=$this->Registration_model->getUserName("student",$_SESSION['user_id']);
          
            //OCR happens here
        if($func->doOCR('addDocuments', 'aadhar_image', 'aadhar_number') && $func->doOCR('addDocuments', 'pan_image', 'pan_number') && $func->doOCR('addDocuments', 'passport_image', 'passport_number') && $func->doOCR('addDocuments', 'driving_licence_image', 'driving_licence_number')){
// $func->convertToPdf($adhaar_img_tmp,$username."Aadhar");
//            $func->convertToPdf($pan_img_tmp,$username."PAN");
//            $func->convertToPdf($pass_img_tmp,$username."Passport");
//            $func->convertToPdf($lsc_img_tmp,$username."Liscense");
//            $func->convertToPdf($caste_img_tmp,$username."Caste");
//            $func->convertToPdf($birth_img_tmp,$username."BirthC");
//            $func->convertToPdf($leaving_img_tmp,$username."Leaving");
            $data=array(
                'student_id'=>$_SESSION['student_id'],
                'aadhar_number'=>$aadhar_number,
                'pan_number'=>$pan_number,
                'passport_number'=>$passport_number,
                'driving_licence_number'=>$driving_licence_number,
                'bank_account_number'=>$bank_account_number,
            );
			
//            $this->Registration_model->insert("student_documents",$data);
			
 if($this->Registration_model->insert("student_documents",$data)){
     $this->Register_model->editIsRegistered($_SESSION['user_id']);
                $data['page'] = "Profile";
                $data['title'] = "Profile | Reclutas";
     $data['student']=$this->Registration_model->getStudentDetails($_SESSION['user_id']);
     $data['posts']=$this->Post_model->getPostsWithCondition('user_id',$_SESSION['user_id'],0);
                $this->load->view('dashboard/profilepage', $data);
            }else{
                echo "INSERT ERROR";
            }
			
            /*LOAD THE STUDENT PARENTS REGISTER VIEW FROM HERE*/
            /*$this->loadPage("page_name");*/
            /*FORM ACTION SHOULD BE Student/addParents AND BUTTON NAME addParents*/
            /*$this->loadPage("student_register_parents");*/
        }
            else
                 /* Nikhil Ux modal here to display error in documents.
                 IMAGE DOCUMENTS ONLY(PREFERRED)
                 Possible errors:
                 1.Quality of documents
                 2.Details do not match in the uploaded document
                 3.Wrong document uploaded when asked for something else!*/
               echo "OCR false";      
       }
    }
/*
This function is called when the submit button("addParents") of the student_register_parents is clicked which
1.Add the details of the parents for the student which is still registring itself
INPUT --> NONE
RETURNS -->NONE
*/
  
    public function addParents(){
        if(isset($_POST['addParents'])){
           extract($_POST);
            $data=array(
            'parent_name'=>$father_parent_name,
            'parent_email'=>$father_parent_email,
            'parent_phone'=>$father_parent_phone,
            'parent_occupation'=>$father_parent_occupation,
            'parent_income'=>$father_parent_income,
            'parent_gender'=>"Male"
            );
            $father=$this->Registration_model->insert("parents",$data);
            $data=array(
            'student_id'=>$_SESSION['student_id'],
            'parent_id'=>$father
            );
            $this->Registration_model->insert("student_to_parent",$data);
            
            $data=array(
            'parent_name'=>$mother_parent_name,
            'parent_email'=>$mother_parent_email,
            'parent_phone'=>$mother_parent_phone,
            'parent_occupation'=>$mother_parent_occupation,
            'parent_income'=>$mother_parent_income,
            'parent_gender'=>"Female"
            );
            $mother=$this->Registration_model->insert("parents",$data);
             $data=array(
            'student_id'=>$_SESSION['student_id'],
            'parent_id'=>$mother
            );
            $this->Registration_model->insert("student_to_parent",$data);
            
        }

if($this->Registration_model->insert("student_to_parent",$data)){
                $data['page'] = "StudentRegister";
                $data['title'] = "Register - Student | Reclutas.in";
                 $this->load->view("dashboard/registration_forms/student_register_docs", $data);
           }else{
               echo "SOME ERROR";
           }
        /*URL TO THE NEXT VIEW AFTER THE STUDENT REGISTRATION IS COMPLETED*/
        /*AND ALERT STUDENT REGISTRATION IS COMPLETED*/
        
        
    }
    
    public function getStudent(){
        $data['title']="View | Name of Project";
        $data['page']="View";
        $this->load->view('template/header',$data);
        $result=$this->Registration_model->getStudentDetails($_SESSION['user_id']);
        extract($result);
      $details = array(
               'student_first_name'=>$student_first_name,
               'student_last_name'=>$student_last_name,
               'student_enrollment_id'=>$student_enrollment_id,
               'student_branch'=>$student_branch,
               'student_phone'=>$student_phone,
               'student_dob'=>$student_dob,
               'student_blood_group'=>$student_blood_group,
               'student_gender'=>$student_gender,
               'student_mother_toungue'=>$student_mother_toungue,
               'student_religion'=>$student_religion,
               'student_nationality'=>$student_nationality,
               'student_sub_caste'=>$student_sub_caste,
               'student_cast_category'=>$student_cast_category,
               'student_maritial_status'=>$student_maritial_status,
    'student_physically_challenged'=>$student_physically_challenged,
               'student_place_of_birth'=>$student_place_of_birth,
               'student_address_flat'=>$student_address_flat,
               'student_address_street'=>$student_address_street,
               'student_address_city'=>$student_address_city,
               'student_address_state'=>$student_address_state,
               'student_address_pincode'=>$student_address_pincode
                  
              
           );
     
    $this->load->view('view/edit_student',$details);
    $this->load->view('template/footer',$data);
       
    }
    
    public function updateStudent(){
        if(isset($_POST["updateStudent"])){
            $id=$this->Registration_model->getStudentId($_SESSION['user_id']);
          //this is coming from view
            extract($_POST); 
            
           $data = array(
               'user_id'=>$_SESSION['user_id'],
               'student_first_name'=>$student_first_name,
               'student_last_name'=>$student_last_name,
               'student_enrollment_id'=>$student_enrollment_id,
               'student_branch'=>$student_branch,
               'student_phone'=>$student_phone,
               'student_dob'=>$student_dob,
               'student_blood_group'=>$student_blood_group,
               'student_gender'=>$student_gender,
               'student_mother_toungue'=>$student_mother_toungue,
               'student_religion'=>$student_religion,
               'student_nationality'=>$student_nationality,
               'student_sub_caste'=>$student_sub_caste,
               'student_cast_category'=>$student_cast_category,
               'student_maritial_status'=>$student_maritial_status,
    'student_physically_challenged'=>$student_physically_challenged,
               'student_place_of_birth'=>$student_place_of_birth,
               'student_address_flat'=>$student_address_flat,
               'student_address_street'=>$student_address_street,
               'student_address_city'=>$student_address_city,
               'student_address_state'=>$student_address_state,
               'student_address_pincode'=>$student_address_pincode
                  
              
           );
        
            $this->Registration_model->update("student",$id,$data);
        $this->getDocuments();
        
            
       }
    }
    public function getDocuments(){
        //Update documents code here 
        $this->getParents();
    }
    public function getParents(){

       $result=$this->Registration_model->getFatherDetails($this->Registration_model->getStudentId($_SESSION['user_id']));
      extract($result);
     $data=array(
            'father_parent_name'=>$parent_name,
            'father_parent_email'=>$parent_email,
            'father_parent_phone'=>$parent_phone,
            'father_parent_occupation'=>$parent_occupation,
            'father_parent_income'=>$parent_income,
            'father_parent_gender'=>"Male",
            );
        
    $result=$this->Registration_model->getMotherDetails($this->Registration_model->getStudentId($_SESSION['user_id']));
      extract($result);
        
        $dataM=array(
            'mother_parent_name'=>$parent_name,
            'mother_parent_email'=>$parent_email,
            'mother_parent_phone'=>$parent_phone,
            'mother_parent_occupation'=>$parent_occupation,
            'mother_parent_income'=>$parent_income,
            'mother_parent_gender'=>"Female",
        );
        $data=array_merge($data,$dataM);
        $this->load->view('view/edit_parents',$data);
        
    }
public function updateParents(){
    if(isset($_POST['updateParents'])){
    $father_id=$this->Registration_model->getFatherId($this->Registration_model->getStudentId($_SESSION['user_id']));
    $mother_id=$this->Registration_model->getMotherId($this->Registration_model->getStudentId($_SESSION['user_id']));
   extract($_POST);
        $data=array(
            'parent_name'=>$father_parent_name,
            'parent_email'=>$father_parent_email,
            'parent_phone'=>$father_parent_phone,
            'parent_occupation'=>$father_parent_occupation,
            'parent_income'=>$father_parent_income,
            'parent_gender'=>"Male"
            );
            $father=$this->Registration_model->update("parents",$father_id,$data);
            
            $data=array(
            'parent_name'=>$mother_parent_name,
            'parent_email'=>$mother_parent_email,
            'parent_phone'=>$mother_parent_phone,
            'parent_occupation'=>$mother_parent_occupation,
            'parent_income'=>$mother_parent_income,
            'parent_gender'=>"Female"
            );
            $mother=$this->Registration_model->update("parents",$mother_id,$data);
     ?>
	<script>
		window.alert("Data Edited Successfully!!");
	</script>
	<?php       
    }
    }
}// end of class
?>