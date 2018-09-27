<?php
/*
this controller deals with the registrations of the faculty and loading  of the first personal details form. This controller is routed from registration model whenever a user with user_role ="FACULTY" logs in for the first time or needs to add/update its registration form
*/
class Faculty extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Registration_model');
        $this->load->model('Register_model');
         $this->load->model('Post_model');
    }


/*
This function is called when submit button("addFaculty) of afculty_register_personal form is clicked which 
1.adds the details of the faculty registering into the "faculty" table 
2.Sets the faculty session id which is used to in later views
INPUT --> NONE
RETURNS -->NONE
*/
        
     public function addFaculty(){
      if(isset($_POST["addfaculty"])){
          extract($_POST);
           
      include_once("Functions.php");
        $func=new Functions(); 
               if(isset($_FILES['faculty_photo']['name']) && $_FILES['faculty_signature_photo']['name']){
             
          
            $img=$_FILES['faculty_photo']['name'];
            $img_tmp=$_FILES['faculty_photo']['tmp_name'];
                   
            $sig=$_FILES['faculty_signature_photo']['name'];
            $sig_tmp=$_FILES['faculty_signature_photo']['tmp_name'];
                   
            $random=$func->convertToPdf($img_tmp,$faculty_first_name);
            $sign=$func->convertToPdf($sig_tmp,$faculty_first_name."Sign");
            
        }
           
           $data = array(
               'user_id'=>$_SESSION['user_id'],
               'faculty_first_name'=>$faculty_first_name,
			   'faculty_middle_name'=>$faculty_middle_name,
               'faculty_last_name'=>$faculty_last_name,
               'faculty_department'=>$faculty_department,
               'faculty_phone'=>$faculty_phone,
               'faculty_dob'=>$faculty_dob,
               'faculty_designation'=>$faculty_designation,
               'faculty_gender'=>$faculty_gender,
               'faculty_maritial_status'=>$faculty_maritial_status,
    'faculty_physically_challenged'=>$faculty_physically_challenged,
            'faculty_address_flat'=>$faculty_address_flat,
               'faculty_address_street'=>$faculty_address_street,
               'faculty_address_city'=>$faculty_address_city,
               'faculty_address_state'=>$faculty_address_state,
               'faculty_address_pincode'=>$faculty_address_pincode
                  
              
           );
//           $_SESSION['faculty_id']=$this->Registration_model->insert("faculty",$data);
           if($_SESSION['faculty_id'] = $this->Registration_model->insert("faculty",$data)){
                $this->Register_model->editIsRegistered($_SESSION['user_id']);
			    $data['page'] = "Profile";
                $data['title'] = "Profile | Reclutas";
 $this->load->view('dashboard/profilepage', $data);
    			
           }else{
               echo "SOME ERROR";
           }

         /*GIVE THE PAGE NAME OF THE NEXT VIEW TO BE LOADED*/
         /*$this->loadPage("page_name");*/
          /*FORM ACTION SHOULD BE faculty/addDocuments AND BUTTON NAME addDocuments*/
         /*$this->loadPage("student_register_personal_docs");*/


       }
         //****************     nikhil your modal code here ****************
               
        }
    
          

    public function getFaculty(){
        $data['title']="View | Name of Project";
        $data['page']="View";
        $this->load->view('template/header',$data);
        $result=$this->Registration_model->getUserDetails("faculty",$_SESSION['user_id']);
		?>
      <script>window.alert(<?php $_SESSION['user_id'] ?>)</script>
       <?php
        extract($result);
      $data['details'] = array(
              'user_id'=>$_SESSION['user_id'],
               'faculty_first_name'=>$faculty_first_name,
			   'faculty_middle_name'=>$faculty_middle_name,
               'faculty_last_name'=>$faculty_last_name,
               'faculty_department'=>$faculty_department,
               'faculty_phone'=>$faculty_phone,
               'faculty_dob'=>$faculty_dob,
               'faculty_designation'=>$faculty_designation,
               'faculty_gender'=>$faculty_gender,
               'faculty_maritial_status'=>$faculty_maritial_status,
    'faculty_physically_challenged'=>$faculty_physically_challenged,
               'faculty_address_flat'=>$faculty_address_flat,
               'faculty_address_street'=>$faculty_address_street,
               'faculty_address_city'=>$faculty_address_city,
               'faculty_address_state'=>$faculty_address_state,
               'faculty_address_pincode'=>$faculty_address_pincode
                  
              
           );
     
    $this->load->view('edit_faculty',$data);
    $this->load->view('template/footer',$data);
       
    }
    
    public function updateFaculty(){
        if(isset($_POST["updateFaculty"])){
            $id=$this->Registration_model->getFacultyId($_SESSION['user_id']);
          //this is coming from view
            extract($_POST); 
            
           $data = array(
              'user_id'=>$_SESSION['user_id'],
               'faculty_first_name'=>$faculty_first_name,
			   'faculty_middle_name'=>$faculty_middle_name,
               'faculty_last_name'=>$faculty_last_name,
               'faculty_department'=>$faculty_department,
               'faculty_phone'=>$faculty_phone,
               'faculty_dob'=>$faculty_dob,
               'faculty_designation'=>$faculty_designation,
               'faculty_gender'=>$faculty_gender,
               'faculty_maritial_status'=>$faculty_maritial_status,
    'faculty_physically_challenged'=>$faculty_physically_challenged,
               'faculty_address_flat'=>$faculty_address_flat,
               'faculty_address_street'=>$faculty_address_street,
               'faculty_address_city'=>$faculty_address_city,
               'faculty_address_state'=>$faculty_address_state,
               'faculty_address_pincode'=>$faculty_address_pincode
                  
              
           );
        
            $this->Registration_model->update("faculty",$id,$data);
      
            
       }
    }
  
}// end of class
?>