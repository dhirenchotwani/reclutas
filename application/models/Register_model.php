<?php
/**
 * Created by PhpStorm.
 * User: Jatin Varlyani
 * Date: 19-06-2018
 * Time: 11:51
 */
?>
<?php
class Register_model extends CI_Model{

    //function to load the database
    //similar to view method of defalut contoller
    public function __construct()
    {
        $this->load->database();
    }

    public function getIsRegistered($user_id){
        $this->db->select("(SELECT is_fully_registered FROM users where users.user_id='$user_id')",FALSE);
        $query=$this->db->get('users');
        if($query->row_array()){
            return implode($query->row_array());
        }

    }

    public function editIsRegistered($id){
        $data=array( 'is_fully_registered'=>1);
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
    }

    public function update_user_verification($data){
        $user_email = $data['user_email'];
        $query = "UPDATE users SET user_token = '', is_email_verified=1 where user_email = '$user_email'";
        //$update_user_query = mysqli_query($this->db->connection,$query);

        $this->db->query($query);
    }

    public function getUserByEmail($user_email){
        $users_query = "SELECT * FROM users WHERE user_email = '$user_email'";
        $result_array = $this->db->query($users_query);
        return $result_array;
    }

    public  function  insert_user($data){
        $user_query  = $this->db->insert("users",  $data);
        //echo  "INSERTED SUCCESS";
        return $this->db->insert_id();

    }

    public function updatePassword($data){
        $user_id = $data['user_id'];
        $user_new_password = $data['user_new_password'];
        $update_pass_query = "UPDATE users SET user_password = '$user_new_password' WHERE user_id = $user_id";
        $this->db->query($update_pass_query);
    }

    public function updateFlag($flag, $value, $data){
        $user_id = $data['user_id'];
        $update_flag_query = "UPDATE users SET $flag = $value WHERE user_id = $user_id";
        $this->db->query($update_flag_query);
    }

     /**************************UPDATE TOKEN********************************/
    public  function  updateToken($token, $user_id){
        $update_token_query = "UPDATE users SET user_token = '$token' WHERE user_id = $user_id";
        $this->db->query($update_token_query);
    }
    
}

?>

