<?php
class Registration_model extends CI_Model{

    //function to load the database
    //similar to view method of defalut contoller
    public function __construct()
    {
        $this->load->database();
    }
    
    public function getRoleName($user_id){
        $this->db->select("(SELECT user_role.role_name FROM user_role WHERE user_role.user_role_id='$user_id')",FALSE);
        $query=$this->db->get('user_role');
        if($query->row_array()){
            return implode($query->row_array());
        }
        
    }
    
    public function insert($table="student",$data){
		date_default_timezone_set("Asia/Kolkata");
        $t=time();
        $created_at = date("Y-m-d H:i:s",$t);
           
        $meta_data=array(
        'created_at'=>$created_at,
        'is_deleted'=>0
        );
        $data=array_merge($data,$meta_data);
		
         $this->db->insert($table,$data);
        return  $this->db->insert_id();
    }
    public function update($table="student",$id,$data){
        if($table=="student")
        $this->db->where('student_id',$id);
        else if($table=="parents")
        $this->db->where('parent_id',$id);
		else if($table=="faculty")
        $this->db->where('faculty_id',$id);
		
        $this->db->update($table,$data);
    }
    
    public function getUserName($table="student",$user_id){
        $this->db->select("(SELECT student_first_name FROM student where student.user_id='$user_id')",FALSE);
        $query=$this->db->get($table);
        if($query->row_array()){
            return implode($query->row_array());
        }
    }

    		public function getUserDetails($table="student",$user_id){
       $get_details="SELECT * FROM $table where $table.user_id=$user_id";
         $query=$this->db->query($get_details);
        return $query->row_array();
   } 
    public function getStudentId($user_id){
         $this->db->select("(SELECT student_id FROM student where student.user_id='$user_id')",FALSE);
        $query=$this->db->get('student');
        if($query->row_array()){
            return implode($query->row_array());
        }
    }
	   public function getFacultyId($user_id){
         $this->db->select("(SELECT faculty_id FROM faculty where faculty.user_id='$user_id')",FALSE);
        $query=$this->db->get('faculty');
        if($query->row_array()){
            return implode($query->row_array());
        }
    }
    public function getFatherDetails($stud_id){
        $sql = "SELECT * FROM parents WHERE parent_id in (SELECT parent_id FROM student_to_parent WHERE student_id =$stud_id) AND parent_gender='Male'";
        $query=$this->db->query($sql);
        return $query->row_array();
        
        }
public function getMotherDetails($stud_id){
        $sql = "SELECT * FROM parents WHERE parent_id in (SELECT parent_id FROM student_to_parent WHERE student_id =$stud_id) AND parent_gender='Female'";
        $query=$this->db->query($sql);
        return $query->row_array();
        
        }

public function getFatherId($stud_id){
     $sql = "SELECT parent_id FROM parents WHERE parent_id in (SELECT parent_id FROM student_to_parent WHERE student_id =$stud_id) AND parent_gender='Male'";
        $query=$this->db->query($sql);
     if($query->row_array()){
            return implode($query->row_array());
        }
}
public function getMotherId($stud_id){
     $sql = "SELECT parent_id FROM parents WHERE parent_id in (SELECT parent_id FROM student_to_parent WHERE student_id =$stud_id) AND parent_gender='Female'";
        $query=$this->db->query($sql);
     if($query->row_array()){
            return implode($query->row_array());
        }
}    
}
?>