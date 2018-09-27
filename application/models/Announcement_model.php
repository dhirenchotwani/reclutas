<?php
    class Announcement_model extends CI_Model{

    //function to load the database
    //similar to view method of defalut contoller
    public function __construct()
    {
        $this->load->database();
    }
	public function insert($data){
		date_default_timezone_set("Asia/Kolkata");
        $t=time();
        $created_at = date("Y-m-d H:i:s",$t);
           
        $meta_data=array(
        'created_at'=>$created_at,
        'is_deleted'=>0
        );
        $data=array_merge($data,$meta_data);
		
         $this->db->insert("announcement",$data);
        return  $this->db->insert_id();
	}
		
		public function getAllAnnouncements(){
		$query="SELECT announcement.*,faculty.faculty_first_name,faculty.faculty_last_name FROM `announcement` INNER JOIN faculty on announcement.faculty_id = faculty.faculty_id order by announcement.announcement_due_date";
		return $query=$this->db->query($query);
		}
		
		public function getAnnouncements($id){
			$query="select * from announcement where announcements.faculty_id=$id ORDER BY announcement_due_date";
			return $query=$this->db->query($query);
		return $query=$this->db->query($query);
		}
}
?>