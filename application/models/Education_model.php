<?php
class Education_model extends CI_Model
{
	//function to load the database
	//similar to view method of default controller
	public function __construct(){
		$this->load->database();
	}

	public function getDegree(){
		$get_query = "SELECT * FROM education_type";
		$result_array = $this->db->query($get_query);
		return $result_array;
	}

	public function getPerformanceScale(){
		$get_query = "SELECT * FROM student_education_result_type";
		$result_array = $this->db->query($get_query);
		return $result_array;
	}

	public function insertEducationInfo($data){
		$user_query  = $this->db->insert("student_education_info",  $data);
		//echo  "INSERTED SUCCESS";
		return $this->db->insert_id();
	}

	public function getEducationDetails($student_id){
		$get_query = "SELECT * FROM student_education_info INNER JOIN student_education_result_type ON student_education_info.student_result_type = student_education_result_type.student_education_result_type_id INNER JOIN education_type ON student_education_info.education_type = education_type.education_type_id WHERE student_id = $student_id AND is_deleted = 0 ORDER BY education_type DESC";
		$result_array = $this->db->query($get_query);
		return $result_array;
	}

	public function deleteEducation($education_id,$student_id){
		$delete_sql ="UPDATE student_education_info SET is_deleted=1,deleted_at = CURRENT_TIMESTAMP() where student_education_info_id= $education_id AND student_id =$student_id ";
		$row = $this->db->query($delete_sql);
		if($row){
			return true;
		}
		return false;
	}
}