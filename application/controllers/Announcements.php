<?php
class Announcements extends CI_Controller{

    public function __construct() {
	parent::__construct();
		$this->load->model('Announcement_model');
        
   }
	public function addFacultyAnnouncement(){
		if(isset($_POST['addFacultyAnnouncement'])){
			extract($_POST);

			if(isset($_FILES['announcement_image']['name'])){
             
          
            $img=$_FILES['announcement_image']['name'];
            $img_tmp=addslashes(file_get_contents( $_FILES['announcement_image']['tmp_name']));
				$data=array(
			'faculty_id'=>$_SESSION['faculty_id'],
			'announcement_title'=>$announcement_title,
			'announcement_text'=>$announcement_text,
			'announcement_due_date'=>$announcements_due_date,
			'announcement_media'=>$img_temp
				);
			}
			else if ($announcement_link!=null){
				$announcement_link_url=$announcement_link;
				$json=$this->fetchJSON($announcement_link_url);
				$data=array(
				'faculty_id'=>$_SESSION['faculty_id'],
			'announcement_text'=>$announcement_text,
			'announcement_title'=>$announcement_title,
			'announcement_due_date'=>$announcements_due_date,
			'announcement_link'=>$announcement_link_url,
			'announcement_link_meta'=>$json
					);
			}
			else{
			$data=array(
			'faculty_id'=>$_SESSION['faculty_id'],
			'announcement_text'=>$announcement_text,
			'announcement_title'=>$announcement_title,
			'announcement_due_date'=>$announcements_due_date,
			);
			}
			$this->Announcement_model->insert($data);
			header("Location: ../dashboard/show_profile_about");
		}
	}
	public function fetchJSON($link){
               
        $url = "http://api.urlmeta.org/?url=" . $link;
                  
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));
        $data = curl_exec($curl);
//        echo "<br>DATA: $data";          
        $err = curl_error($curl);
        curl_close($curl);
        return $data;
    }
}
?>