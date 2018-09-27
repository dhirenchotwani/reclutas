<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 18-06-2018
 * Time: 15:28
 */

class Login_model extends CI_Model{

    //function to load the database
    //similar to view method of defalut contoller
    public function __construct()
    {
        $this->load->database();
    }

    public  function  get_user($data){
        $user_query = $this->db->get_where("users", array('user_email' => $data['user_email']));
        if($user_query->row_array()){
            return $user_query->row_array();
        }
    }
	// NEW
public function getUserWithCondition($condn,$key){
	$get_details="SELECT * FROM users where users.$condn=$key";
	 $query=$this->db->query($get_details);
        return $query->row_array();
	
}
    public function getStudentIdByUserId($user_id){
        $get_student = "SELECT student_id FROM student WHERE user_id = $user_id";
        $row_array = $this->db->query($get_student);
        $row_array = $row_array->row_array();
        return $row_array['student_id'];
    }

    public function getUserByUserId($user_id){
        $users_query = "SELECT * FROM users WHERE user_id = $user_id";
        $result_array = $this->db->query($users_query);
        return $result_array;
    }

    public function getUserByEmail($key)
    {
        echo $key['user_email'];
        $user_query = $this->db->get_where("users", $key['user_email']);
        if($user_query){
            //return $user_query->row_array();
        }
    }


}
?>