<?php

class Certificates_model extends CI_Model
{
    //function to load the database
    //similar to view method of default controller
    public function __construct()
    {
        $this->load->database();
    }
    public function addCertificated($data){
        date_default_timezone_set("Asia/Kolkata");
        $t=time();
        $created_at = date("Y-m-d H:i:s",$t);
        $data_meta = array(
            'created_at' =>$created_at,
            'updated_at' => $created_at,
            'is_deleted' => 0,
        );

        $data = array_merge($data,$data_meta);
        $this->db->insert('student_certification', $data);
    }

    public function getCertificate($certificate_id){
        $get_certificates_query = "SELECT student_certification_id, student_id, certificate_name, certificate_discription, start_date, end_date, institute_name, certificate_license_number FROM student_certification WHERE student_certification_id = $certificate_id AND is_deleted = 0";
        $result_array = $this->db->query($get_certificates_query);
        echo json_encode($result_array->result_array(), true);
    }

    public function getCertificatesOfStudent($student_id){
        $get_certificates_query = "SELECT * FROM student_certification WHERE student_id = $student_id AND is_deleted = 0";
        $result_array = $this->db->query($get_certificates_query);
        return $result_array;
    }

    public function editCertificated($data,$certificate_id){
        date_default_timezone_set("Asia/Kolkata");
        $t=time();
        $updated_at= date("Y-m-d H:i:s",$t);
        $data_meta = array(
            'updated_at' => $updated_at,
        );

        $data = array_merge($data,$data_meta);
        $this->db->where('student_certification_id', $certificate_id);
        $this->db->update('student_certification', $data);
    }

    public function deleteCertificate($certificate_id,$student_id){
        $delete_sql ="UPDATE student_certification SET is_deleted=1,deleted_at = CURRENT_TIMESTAMP() where student_certification_id= $certificate_id AND student_id =$student_id ";
        $row = $this->db->query($delete_sql);
        if($row){
            echo true;
            return true;
        }
        echo false;
        return false;
    }

}
?>

