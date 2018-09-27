<?php
class Work_Experience_model extends CI_Model
{
    //function to load the database
    //similar to view method of default controller
    public function __construct()
    {
        $this->load->database();
    }

    public function addWorkExperience($data){
        date_default_timezone_set("Asia/Kolkata");
        $t=time();
        $created_at = date("Y-m-d H:i:s",$t);
        $data_meta = array(
            'created_at' =>$created_at,
            'updated_at' => $created_at,
            'is_deleted' => 0,
        );
        $data = array_merge($data,$data_meta);
        $this->db->insert('student_work_experience', $data);
    }

    public function getWorkExpToEdit($work_exp_id){
        $get_work_exp_query = "SELECT student_work_experience_id, student_id, company_name,start_date,end_date, work_role FROM student_work_experience WHERE student_work_experience_id = $work_exp_id AND is_deleted = 0";
        $result_array = $this->db->query($get_work_exp_query);
        echo json_encode($result_array->result_array(), true);
    }

    public function editWorkExperience($data,$student_work_exp_id){
        date_default_timezone_set("Asia/Kolkata");
        $t=time();
        $updated_at= date("Y-m-d H:i:s",$t);
        $data_meta = array(
            'updated_at' => $updated_at,
        );
        $data = array_merge($data,$data_meta);
        $this->db->where('student_work_experience_id', $student_work_exp_id);
        $this->db->update('student_work_experience', $data);
    }

    public function getWorkExperienceOfStudent($student_id){
        $get_workexperience_query = "SELECT * FROM student_work_experience WHERE student_id = $student_id AND is_deleted = 0";
        $result_array = $this->db->query($get_workexperience_query);
        return $result_array;
    }

    public function deleteWorkExperience($workexp_id,$student_id){
        $delete_sql ="UPDATE student_work_experience SET is_deleted=1,deleted_at = CURRENT_TIMESTAMP() where student_work_experience_id= $workexp_id AND student_id =$student_id ";
        $row = $this->db->query($delete_sql);
        if($row){
            return true;
        }
        return false;
    }
}
?>