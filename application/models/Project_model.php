<?php
class Project_model extends CI_Model
{
    //function to load the database
    //similar to view method of default controller
    public function __construct()
    {
        $this->load->database();
    }
    public function getAllStudents(){
        $get_students_query = "SELECT * FROM student";
        $result_array = $this->db->query($get_students_query);
        return $result_array->result_array();
    }

    public function getAllFaculty(){
        $get_faculty_query = "SELECT * FROM faculty";
        $result_array = $this->db->query($get_faculty_query);
        return $result_array;
    }

    public function insertIntoProjectStudent($data){
        $this->db->insert('project_to_student', $data);
        return $this->db->insert_id();
    }

    public function insertIntoProjectSnapShot($data){
        $this->db->insert('project_snapshots', $data);
        return $this->db->insert_id();
    }

    public function getProjectOfStudent($student_id){
        $get_project_query = "SELECT project_to_student.project_role, project.project_id,project.project_name,project.project_start,project.project_end,faculty.faculty_first_name,faculty.faculty_last_name FROM project,project_to_student,faculty WHERE project_to_student.student_id =$student_id AND project.project_id = project_to_student.project_id AND project.project_faculty_id = faculty.faculty_id AND project.is_deleted = 0 AND project_to_student.isRemoved = 0";
        $result_array = $this->db->query($get_project_query);
        return $result_array;
    }


    public function deleteProject($project_id){

    }




    public function addProject($data){

        date_default_timezone_set("Asia/Kolkata");
        $time = time();
        $created_at = date("Y-m-d H:i:s", $time);
        $data_meta = array(
            'created_at'=>$created_at,
            'is_deleted'=> 0,
            'updated_at'=>$created_at,
        );
        $data  = array_merge($data,$data_meta);

        $this->db->insert('project',$data);
        return $this->db->insert_id();
    }

}//end of model
?>