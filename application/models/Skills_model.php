<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/10/2018
 * Time: 12:18 PM
 */
class Skills_model extends CI_Model
{
    //function to load the database
    //similar to view method of default controller
    public function __construct()
    {
        $this->load->database();
    }

    public function checkSkill($other_skills){
        $this->db->where('skill_name',$other_skills);
        $check = $this->db->get('skill');
        if ( $check->num_rows() > 0 )
        {
            $row = $check->row();
            return $row->skill_id;

        }else{
            $data = array(
                'skill_name' => $other_skills,
            );
            $this->db->insert('skill', $data);
            return $id = $this->db->insert_id();
        }
    }

    public function getAllSkills(){
        $get_skills_query = "SELECT * FROM skill";
        $result_array = $this->db->query($get_skills_query);
        return $result_array;
    }
    public function addASkill($data){
        $student_id = $data['student_id'];
        $skill = $data['student_skill'];
        $getStudentSkill = "SELECT * FROM student_skills WHERE student_id = $student_id AND student_skill = $skill AND is_deleted = 0";
        $row = $this->db->query($getStudentSkill);
        $flag = 0;
        if($row->num_rows() == 0){
            date_default_timezone_set("Asia/Kolkata");
            $t=time();
            $created_at = date("Y-m-d H:i:s",$t);
            $data_meta = array(
                'created_at' =>$created_at,
                'is_deleted' => 0,
            );

            $data = array_merge($data,$data_meta);
            $this->db->insert('student_skills', $data);
            $flag = 1;
        }else{
            $flag = 0;
        }
        return $flag;
    }
    public function getSkillsOfStudent($student_id){
        $get_skills_query = "SELECT * FROM student_skills, skill WHERE student_skills.student_skill = skill.skill_id AND student_skills.student_id = $student_id AND student_skills.is_deleted = 0";
        $result_array = $this->db->query($get_skills_query);
        return $result_array;
    }

    public function deleteSkill($skill_id,$student_id){
        $delete_sql ="UPDATE student_skills SET is_deleted=1,deleted_at = CURRENT_TIMESTAMP() where student_skill= $skill_id AND student_id =$student_id ";
        $row = $this->db->query($delete_sql);
        if($row){
            return true;
        }
        return false;
    }

}
?>
