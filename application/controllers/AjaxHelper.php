<?php
/**
 * Created by PhpStorm.
 * User: NIKHIL SHADIJA
 * Date: 7/9/2018
 * Time: 11:18 PM
 */
?>
<?php
class AjaxHelper extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('Project_model');
        $this->load->helper('url_helper');
    }

    public function like_post($post_id){
        $this->Post_model->like_post($post_id);
        $likes_count = $this->Post_model->get_likes($post_id);
        echo $likes_count;
    }

    public function report_post($post_id, $report_reason_id){
        $go_to_path = $this->Post_model->report_post($post_id, $report_reason_id, $_SESSION['user_id']);
        echo $go_to_path;
    }


    public function insert_team_member(){
        //echo "HERE";

        $student_data = $this->Project_model->getAllStudents();
        //echo $student_data;
        // echo "<pre>";
        echo json_encode($student_data,true);
    }


}
?>