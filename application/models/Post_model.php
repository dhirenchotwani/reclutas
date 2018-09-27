<?php
class Post_model extends CI_Model{

    //function to load the database
    //similar to view method of defalut contoller

    public function __construct()
    {
        $this->load->database();
    }

    public function getPosts($startCount){
        $result_array = array();
        $posts_query = "SELECT news_feed.*, users.user_email FROM users INNER JOIN news_feed ON users.user_id = news_feed.user_id WHERE deleted = 0 ORDER BY created_at DESC LIMIT $startCount,10;";
        $result_array = $this->db->query($posts_query);
        return $result_array;
    }
	
//	NEW
    public function getPostsWithCondition($condn,$key,$startCount){
        $user_posts="SELECT news_feed.*, users.user_email FROM users INNER JOIN news_feed ON users.user_id = news_feed.user_id WHERE news_feed.$condn=$key AND deleted = 0 ORDER BY created_at DESC LIMIT $startCount,10;";
       return $this->db->query($user_posts)->result_array();
         //return $user_posts;
    }
//	NEW
	public function getSharedPostsWithConditon($condn,$key){
		$share_post="SELECT news_feed.* FROM news_feed INNER JOIN news_shares ON news_feed.news_feed_id=news_shares.news_feed_id  where news_shares.$condn=$key ORDER BY shared_at DESC;";
		return $this->db->query($share_post);
		
	}
	//	NEW
	public function addSharePost($data){
		date_default_timezone_set("Asia/Kolkata");
        $t=time();
        $created_at = date("Y-m-d H:i:s",$t);
           
        $meta_data=array(
        'shared_at'=>$created_at,
        'deleted'=>0
        );
		$data=array_merge($data,$meta_data);
		$this->db->insert("news_shares",$data);
		header("Location: ../show_newsfeed");
	}
	//	NEW
	public function getSharedPosts(){
		$share_post="select news_feed.*, news_shares.*,users.user_email from news_feed INNER JOIN news_shares on news_feed.news_feed_id=news_shares.news_feed_id INNER JOIN users on news_shares.user_id=users.user_id ORDER BY shared_at DESC LIMIT 10;";
		return $this->db->query($share_post);
		
	}
	//	NEW
	public function getOneSinglePost($condn,$key){
		$post="SELECT news_feed.* FROM news_feed WHERE news_feed.$condn=$key";
		return $this->db->query($post)->row_array();
	}

    public function post_liked($news_feed_id, $user_id){
        $post_liked_query = "SELECT * FROM news_like WHERE news_feed_id = $news_feed_id AND user_id = $user_id";
        $result_query = $this->db->query($post_liked_query);
        $row = $result_query->row_array();
        if(isset($row)){
            return true;
        }
        return false;
    }
    
    public function deletePost($post_id){
        $delete_query = "UPDATE news_feed SET deleted=1,deleted_at = CURRENT_TIMESTAMP() where news_feed_id = $post_id";
        $row = $this->db->query($delete_query);
        if($row){
            return true;
        }
        return false;
    }


    public function report_post($post_id, $report_reason_id, $user_id){
        $report_news_feed = "INSERT INTO news_feed_report(news_feed_id, user_id, report_id, created_at) VALUES ($post_id,$user_id,$report_reason_id,CURRENT_TIMESTAMP())";
        $result = $this->db->query($report_news_feed);
        if($result){
            echo "../post/show_newsfeed?show_notification=1&reported_post=true";
        } else{
            echo "../post/show_newsfeed?show_notification=1&reported_post=false";
        }
    }

    public function is_post_reported($news_feed_id, $user_id){
        $get_reported_post_user_query = "SELECT * FROM news_feed_report WHERE news_feed_id = $news_feed_id AND user_id = $user_id";
        $result_array = $this->db->query($get_reported_post_user_query);
        $row = $result_array->result_array();
        if($row){
            return true;
        }
        return false;
    }
	
	
	//	NEW
	public function getShareCount($news_feed_id){
		$query="SELECT COUNT(*) FROM news_shares WHERE news_shares.news_feed_id='$news_feed_id'";
		$query=$this->db->query($query);
		echo implode($query->row_array());
	}

    public function getReasons(){
        $report_reasons_query = "SELECT * FROM report_reason";
        $result_array = $this->db->query($report_reasons_query);
        return $result_array;
    }

    public function get_likes($news_feed_id){
        $posts_likes = "SELECT COUNT(*) AS LIKE_COUNT FROM news_like where news_feed_id = $news_feed_id and dislike = 0";
        $row_count = $this->db->query($posts_likes);
        $row = $row_count->row_array();
        if($row){
            return $row['LIKE_COUNT'];
        }
    }

     
//	NEW
    public function addPosts($data){
        date_default_timezone_set("Asia/Kolkata");
        $t=time();
        $created_at = date("Y-m-d H:i:s",$t);
           
        $meta_data=array(
        'created_at'=>$created_at,
        'deleted'=>0
        );
        $data=array_merge($data,$meta_data);
        $this->db->insert("news_feed",$data);
        
        header("Location: ../dashboard/show_newsfeed");
    }

    public function like_post($post_id){
        $user_logged_in = $_SESSION['user_id'];
        $get_likes_query = "SELECT * FROM news_like WHERE news_feed_id = $post_id AND user_id = $user_logged_in";
        $result_array = $this->db->query($get_likes_query);
        $my_row = $result_array->row_array();
        if($my_row == ""){
            //echo "Empty result";
            $insert_like_query = "INSERT INTO news_like(news_feed_id, user_id, dislike, created_at, updated_at) VALUES ($post_id, $user_logged_in, 0, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP())";
            $this->db->query($insert_like_query);
            //echo "INSERTED INTO TABLE";
        } else{
            $dislike = $my_row['dislike'];
            if($dislike){
                $current_news_id = $my_row['news_like_id'];
                $like_again_query = "UPDATE news_like SET dislike=0,updated_at=CURRENT_TIMESTAMP() WHERE news_like_id = $current_news_id";
                $this->db->query($like_again_query);
                //echo "AGAIN LIKED";
            } else{
                $current_news_id = $my_row['news_like_id'];
                $dislike_post_query = "UPDATE news_like SET dislike=1,updated_at=CURRENT_TIMESTAMP() WHERE news_like_id = $current_news_id";
                $this->db->query($dislike_post_query);
                //echo "DISLIKED POST";
            }
        }
    }

}
?>


