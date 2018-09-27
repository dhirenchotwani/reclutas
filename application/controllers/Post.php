<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Post extends CI_Controller{
		
		//	NEW
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Post_model');
			$this->load->model('Login_model');
			$this->load->model('Announcement_model');
			$this->load->model('Registration_model');
            $this->load->helper('url_helper');
			
        }

        public function is_post_reported($news_feed_id, $user_id){
            if($this->Post_model->is_post_reported($news_feed_id, $user_id)){
                return true;
            }
            return false;
        }
		//	NEW
        public function show_newsfeed(){
            $data['page'] = "NewsFeed";
            $data['title'] = "News Feed | Reclutas";
		
            $posts_set = $this->Post_model->getPosts(0);
			$shared_posts_set=$this->Post_model->getSharedPosts();
			$posts_set=$posts_set->result_array();
			$shared_posts_set=$shared_posts_set->result_array();
			$shared_posts_set=array_merge($shared_posts_set,$posts_set);
//			foreach($shared_posts_set AS $post){
//				extract($post);
//				echo $user_email."<br>";
//			}
			$announcement_set=$this->Announcement_model->getAllAnnouncements();
			$announcement_set=$announcement_set->result_array();
			$data['announcements']=$announcement_set;
            $data['posts'] = $shared_posts_set;
            $data['post_controller'] = $this;
            $data['report_reasons'] = $this->Post_model->getReasons();
			$data['news']=$this->getNews();
//			$data['student']=$this->Registration_model->getUserDetails("student",$_SESSION['user_id']);
            $this->load->view('dashboard/newsfeed', $data);
        }

        public function post_liked($news_feed_id, $user_id){
            if($this->Post_model->post_liked($news_feed_id, $user_id)){
                return "You and ";
            } else{
                return "";
            }
        }

        public function get_likes($news_feed_id){
            if(!$this->Post_model->get_likes($news_feed_id))
                return $this->Post_model->get_likes($news_feed_id);
            else
                return $this->Post_model->get_likes($news_feed_id) - 1;
        }
		//	NEW
		  public function getNews(){
		$url = "https://newsapi.org/v2/top-headlines?country=in&apiKey=b4d7b9c0db404fdeb2c71e9b788888d4";
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
		$err = curl_error($curl);
		curl_close($curl);
		$result_set = json_decode($data,true);
		return $result_set;
    }

        public  function addPost(){
            $news_feed_text = $this->input->post('news_feed_text');
            //echo $news_feed_name;
            if(isset($_FILES['news_feed_media']['name']) && $_FILES['news_feed_media']['name'] != ""){
                $news_feed_name =  $_FILES['news_feed_media']['name'];
                $news_feed_media =addslashes(file_get_contents( $_FILES['news_feed_media']['tmp_name']));
 
                /*echo "FILE IS $news_feed_name";*/

                $data = array(
                    'news_feed_text' => $news_feed_text,
                    'news_feed_name' => $news_feed_name,
                    'news_feed_media' => $news_feed_media,
                    'user_id' =>$_SESSION['user_id']
                );

            } else{
                $news_feed_name =  $this->input->post('news_feed_name');
                if ($news_feed_name === ""){
                    /*echo "ONLY TEXT";*/
                    $data = array(
                        "news_feed_text" => $news_feed_text,
                        'news_feed_name' => "",
                        'news_feed_media' => "",
                        'user_id' =>$_SESSION['user_id'],
                    );
                } else{
                    /*echo "TEXT IS $news_feed_text <br>";
                    echo "NAME IS $news_feed_name";*/
                   
                    $json=$this->fetchJSON($news_feed_name);
                    //echo $json;
                    $data = array(
                        'news_feed_text' => $news_feed_text,
                        'news_feed_name' => $news_feed_name,
                        'news_feed_media' => "",
                        'link_meta' =>$json,
                        'user_id' =>$_SESSION['user_id'],
                        
                    );
                }
            }
            $this->Post_model->addPosts($data);
       }
		//	NEW
		public function addSharePost($id){
			$data=array(
			'news_feed_id'=>$id,
			'user_id'=>$_SESSION['user_id'],
			);
			$this->Post_model->addSharePost($data);
			
		
		}
		//	NEW
		public function getShareCount($id){
			$this->Post_model->getShareCount($id);
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


        public function infiniteLoad($postCount,$is_user_news_feed){
            if($is_user_news_feed){
                $result_set = $this->Post_model->getPostsWithCondition('user_id',$_SESSION['user_id'],$postCount);
            }else{
                $result_set = $this->Post_model->getPosts($postCount);                
            }
            foreach ($result_set->result() AS $post){
                if ($post->news_feed_media == '' && $post->news_feed_name != '') {
                    //for links display
                    $data = $post->link_meta;
                    $thumbnail = json_decode($data, true);
                    if (isset($thumbnail['meta']['image'])){
                        $link_image = $thumbnail['meta']['image'];
                    } else {
                        $link_image = "../../assets/theme/img/shared_link.png";
                    }

                    if(isset($thumbnail['meta']['url'])){
                        $link_url = $thumbnail['meta']['url'];
                    }else{
                        $link_url = $post->news_feed_name;
                    }

                    if(isset($thumbnail['meta']['url'])){
                        $link_title = $thumbnail['meta']['title'];
                    }else{
                        $link_title = "";
                    }
                    ?>
                    <div class="ui-block" <?php if($this->is_post_reported($post->news_feed_id, $_SESSION['user_id'])) echo "hidden"; ?>>

                        <article class="hentry post video">

                            <div class="post__author author vcard inline-items">
                                <img src="../../assets/theme/img/avatar7-sm.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#"><?php echo $post->user_email; ?></a> shared a <a
                                        >link</a>
                                    <div class="post__date">
                                        <time class="published" datetime="<?php echo $post->created_at; ?>">
                                            <?php $date=date('d M Y', strtotime($post->created_at)); echo $date; ?> at
                                            <?php $date=date('h:ia', strtotime($post->created_at)); echo $date; ?>
                                        </time>
                                    </div>
                                </div>

                                <div class="more">
                                    <svg class="olymp-three-dots-icon">
                                        <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                    </svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a class="post-add-icon report_post inline-items" data-post_id="<?php echo $post->news_feed_id ?>" data-toggle="modal" data-target="#report-post-modal">
                                                <svg class="olymp-block-from-chat"
                                                     style="width: 22px; height: 22px;">
                                                    <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use>
                                                </svg>
                                                Report Post
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <?php
                            if(isset($post->news_feed_text)){
                                echo "<p>".$post->news_feed_text."</p>";
                            }
                            ?>

                            <a href="<?php echo $link_url; ?>" target="_blank">
                                <div class="post-video">
                                    <div class="video-thumb">
                                        <img src="<?php echo $link_image; ?>" style="width: 197px; height: auto;" alt="photo">
                                        <!--                                            <a href="https://youtube.com/watch?v=excVFQ2TWig" class="play-video">-->
                                        <!--                                                <svg class="olymp-play-icon">-->
                                        <!--                                                    <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-play-icon"></use>-->
                                        <!--                                                </svg>-->
                                        <!--                                            </a>-->
                                    </div>

                                    <div class="video-content">
                                        <a target="_blank" href="<?php echo $link_url; ?>" class="h4 title"><?php echo $link_title; ?></a>
                                    </div>
                                </div>
                            </a>
                            <div class="post-additional-info inline-items">

                                <a class="post-add-icon like_post inline-items" data-post_id="<?php echo $post->news_feed_id; ?>">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                    </svg>
                                    <span data-post_id="<?php echo $post->news_feed_id; ?>"><?php echo $this->post_liked($post->news_feed_id, $_SESSION['user_id']); ?><?php echo $this->get_likes($post->news_feed_id); ?></span>
                                </a>

                                <div class="comments-shared">
                                    <a class="post-add-icon share_post inline-items" data-post_id="<?php echo $post->news_feed_id; ?>">
                                        <svg class="olymp-share-icon">
                                            <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-share-icon"></use>
                                        </svg>
                                        <span>16</span>
                                    </a>
                                </div>


                            </div>

                        </article>
                    </div>
                    <?php
                }else if ($post->news_feed_media != ''){
                    ?>
                    <div class="ui-block" <?php if($this->is_post_reported($post->news_feed_id, $_SESSION['user_id'])) echo "hidden"; ?>>

                        <article class="hentry post has-post-thumbnail">

                            <div class="post__author author vcard inline-items">
                                <img src="../../assets/theme/img/avatar5-sm.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#"><?php echo $post->user_email; ?></a>
                                    <div class="post__date">
                                        <time class="published" datetime="<?php echo $post->created_at; ?>">
                                            <?php $date=date('d M Y', strtotime($post->created_at)); echo $date; ?> at
                                            <?php $date=date('h:ia', strtotime($post->created_at)); echo $date; ?>
                                        </time>
                                    </div>
                                </div>

                                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a data-toggle="modal" data-target="#report-post-modal" class="post-add-icon report_post inline-items" data-post_id="<?php echo $post->news_feed_id ?>"><svg class="olymp-block-from-chat" style="width: 22px; height: 22px;"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use></svg> Report Post</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <?php
                            if(isset($post->news_feed_text)){
                                echo "<p> $post->news_feed_text </p>";
                            }
                            ?>

                            <div class="post-thumb">
                                <img src="data:image/png;base64,<?php echo base64_encode($post->news_feed_media); ?>" alt="Post Image">
                            </div>

                            <div class="post-additional-info inline-items">

                                <a class="post-add-icon like_post inline-items" data-post_id="<?php echo $post->news_feed_id; ?>">
                                    <svg class="olymp-heart-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span data-post_id="<?php echo $post->news_feed_id; ?>"><?php echo $this->post_liked($post->news_feed_id, $_SESSION['user_id']); ?><?php echo $this->get_likes($post->news_feed_id); ?></span>
                                </a>


                                <div class="comments-shared">
                                    <a class="post-add-icon share_post inline-items" data-post_id="<?php echo $post->news_feed_id; ?>">
                                        <svg class="olymp-share-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                        <span>37</span>
                                    </a>
                                </div>


                            </div>

                        </article>
                    </div>
                    <?php
                }else if($post->news_feed_text != ''){
                    ?>
                    <div class="ui-block" <?php if($this->is_post_reported($post->news_feed_id, $_SESSION['user_id'])) echo "hidden"; ?>>

                        <article class="hentry post has-post-thumbnail">

                            <div class="post__author author vcard inline-items">
                                <img src="../../assets/theme/img/avatar2-sm.jpg" alt="author">

                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="#"><?php echo $post->user_email; ?></a>
                                    <div class="post__date">
                                        <time class="published" datetime="<?php echo $post->created_at; ?>">
                                            <?php $date=date('d M Y', strtotime($post->created_at)); echo $date; ?> at
                                            <?php $date=date('h:ia', strtotime($post->created_at)); echo $date; ?>
                                        </time>
                                    </div>
                                </div>

                                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                    <ul class="more-dropdown">
                                        <li>
                                            <a data-toggle="modal" data-target="#report-post-modal" class="post-add-icon report_post inline-items" data-post_id="<?php echo $post->news_feed_id ?>"><svg class="olymp-block-from-chat" style="width: 22px; height: 22px;"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use></svg> Report Post</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <p><?php echo $post->news_feed_text; ?></p>

                            <div class="post-additional-info inline-items">

                                <a class="post-add-icon like_post inline-items" data-post_id="<?php echo $post->news_feed_id; ?>">
                                    <svg class="olymp-heart-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                    <span data-post_id="<?php echo $post->news_feed_id; ?>"><?php echo $this->post_liked($post->news_feed_id, $_SESSION['user_id']); ?><?php echo $this->get_likes($post->news_feed_id); ?></span>
                                </a>

                                <div class="comments-shared">
                                    <a class="post-add-icon share_post inline-items" data-post_id="<?php echo $post->news_feed_id; ?>">
                                        <svg class="olymp-share-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                        <span>2</span>
                                    </a>
                                </div>


                            </div>

                        </article>
                    </div>
                    <?php
                }
            }
        }


    }

?>