<!DOCTYPE html>
<html lang="en">


<?php
    include_once("includes/header.php");
?>

<body>

<?php
    include_once("includes/left-sidebar.php");
    include_once("includes/right-sidebar.php");
    include_once("includes/header-bp.php");
	// NEW
	//extract($student);
	//extract($user);


?>


<div class="container">
	<div class="row">

        <!-- Left Sidebar -->
        		<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
		<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Latest News</h6>
				</div>
				<!-- W-Blog-Posts -->
			
				<ul class="widget w-blog-posts">
					<?php 
		for($i=1;$i<=10;$i++){
		?>
					<li>
						<article class="hentry post">
				
							<a href="<?php  echo $news['articles'][$i]['url'];  ?>" class="h4"><?php  echo $news['articles'][$i]['title'];  ?></a>
							<img src="<?php echo $news['articles'][$i]['urlToImage']; ?>" alt ="" style="height:100px width:50px;">
							<p><?php echo substr( $news['articles'][$i]['description'],0,100)?></p><a href="<?php  echo $news['articles'][$i]['url']; ?>">Read More</a>
							
						<p><?php echo "By:";
					if($news['articles'][$i]['author'] == "") 
						echo " Anonymous"; 
					else 
						echo " ".$news['articles'][$i]['author']; ?></p>
							<div class="post__date">
								<time class="published" datetime="2017-03-24T18:18">
									
								</time>
							</div>
				
						</article>
								<?php
		}
			?>
					</li>
			
					
				</ul>
				
				<!-- .. end W-Blog-Posts -->
			</div>
	
       </aside>
        
        <!-- ... end Left Sidebar -->

        <!-- Right Sidebar -->

        <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">

            <div class="ui-block">

                <div class="ui-block-title">
                    <h6 class="title">Announcements</h6>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
                </div>


                <!-- W-Activity-Feed -->

                <ul class="widget w-activity-feed notification-list">
                   <?php
					extract($announcements);
					foreach ( $announcements AS $announcement) {
						extract($announcement);
					?>
                    <li>
                        <div class="author-thumb">
                            <img src="../../assets/theme/img/avatar49-sm.jpg" alt="author">
                        </div>
                        <div class="notification-event">
                            <a href="#" class="h6 notification-friend"><?php echo $faculty_first_name." ".$faculty_last_name; ?></a> made a announcement!
                            <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18"><?php echo $created_at; ?></time></span><hr>
                            <label for=""><?php echo $announcement_text; ?></label><br>
                            <?php
						if($announcement_link!=null){
							?>
							<a href="<?php echo $announcement_link;  ?>"><?php echo $announcement_link;  ?></a><br>
							<?php
						}
						else if($announcement_media!=null){
							echo '<img src="data:image/jpeg;base64,'. base64_encode($announcement_media) .'" /><br>';
						}
							?>
                           
                            <label for="">Last date:<?php echo $announcement_due_date; ?></label>
                        </div>
                    </li>
                        <?php
					}
					?>

                        </ul>

                <!-- .. end W-Activity-Feed -->
            </div>


            <div class="ui-block">


                <!-- W-Action -->

                <div class="widget w-action">

                    <img src="../../assets/theme/img/logo.png" alt="Olympus">
                    <div class="content">
                        <h4 class="title">OLYMPUS</h4>
                        <span>THE BEST SOCIAL NETWORK THEME IS HERE!</span>
                        <a href="01-LandingPage.html" class="btn btn-bg-secondary btn-md">Register Now!</a>
                    </div>
                </div>

                <!-- ... end W-Action -->
            </div>

        </aside>

        <!-- ... end Right Sidebar -->

		<!-- Main Content -->


		<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">


            <?php
                include_once ("modals/report_modal.php");
                include_once ("modals/delete_modal.php");
            ?>

			<div class="ui-block">

				<!-- News Feed Form  -->

				<div class="news-feed-form">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">
								<svg class="olymp-status-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-status-icon"></use></svg>
								<span>Status</span>
							</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">

                            <?php
                            $attributes = array(
                                "id" => "post_form",
                                "enctype" => "multipart/form-data"
                            );
                            echo form_open("Post/addPost", $attributes);
                            ?>

								<div class="author-thumb">
									<img src="../../assets/theme/img/author-page.jpg" alt="author">
								</div>
								<div class="form-group with-icon label-floating is-empty">
									<label class="control-label">Share what you are thinking here...</label>
									<textarea class="form-control" placeholder="" name="news_feed_text"></textarea>
								</div>
                                <div hidden id="link_div" >
                                    <div class="form-group with-icon label-floating is-empty">
                                        <label class="control-label">Add Link</label>
                                        <input type="text" name="news_feed_name" id="news_feed_name" class="form-control" placeholder=""></input>
                                        <a class="show_link input-group-addon" style="margin-right: 15px; margin-bottom: 2px;"><svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg></a>
                                    </div>
                                </div>
								<div class="add-options-message">

                                    <a class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD PHOTOS" name="news_feed_media" id="news_feed_media" onclick="document.getElementById('news_feed_media').click()">
                                        <svg class="olymp-camera-icon" id="select_image"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-camera-icon"></use></svg>
                                    </a>
                                    &nbsp;
                                    <input type="file" hidden id="news_feed_media" name="news_feed_media">
                                    <a class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="ADD LINK">
                                        <svg class="olymp-computer-icon show_link"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
                                    </a>
                                    &nbsp;
                                    <div class="form-group" hidden id="image_name_container">
                                        <input type="text" value="selected filename" id="image_name" class="form-control" disabled style="height: 1.2rem;">
                                        <a class="input-group-addon" id="removeSelectedFile"><svg class="olymp-close-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-close-icon"></use></svg></a>
                                    </div>


									<button class="btn btn-primary btn-md-2" id="post_status">Post Status</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- ... end News Feed Form  -->			</div>

            <div id="preloader_newsfeed">
                <div id="status"> &nbsp; </div>
            </div>

			<div id="newsfeed-items-grid">

                <?php
                foreach ( $posts AS $post) {

                extract($post);
//					
                if ($news_feed_media == '' && $news_feed_name != '') {
                //for links display
                $data = $link_meta;
                $thumbnail = json_decode($data, true);
                if (isset($thumbnail['meta']['image'])) {
                    $link_image = $thumbnail['meta']['image'];
                } else {
                    $link_image = "../../assets/theme/img/shared_link.png";
                }

                if(isset($thumbnail['meta']['url'])){
                    $link_url = $thumbnail['meta']['url'];
                }else{
                    $link_url = $news_feed_name;
                }

                if(isset($thumbnail['meta']['url'])){
                    $link_title = $thumbnail['meta']['title'];
                }else{
                    $link_title = "";
                }

                /*switch (json_last_error()){
                            case JSON_ERROR_NONE:
                                echo ' - No errors';
                                break;
                            case JSON_ERROR_DEPTH:
                                echo ' - Maximum stack depth exceeded';
                                break;
                            case JSON_ERROR_STATE_MISMATCH:
                                echo ' - Underflow or the modes mismatch';
                                break;
                            case JSON_ERROR_CTRL_CHAR:
                                echo ' - Unexpected control character found';
                                break;
                            case JSON_ERROR_SYNTAX:
                                echo ' - Syntax error, malformed JSON';
                                break;
                            case JSON_ERROR_UTF8:
                                echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
                                break;
                            default:
                                echo ' - Unknown error';
                                break;
                        }*/

                ?>

                        <div class="ui-block" <?php if($post_controller->is_post_reported($news_feed_id, $_SESSION['user_id'])) echo "hidden"; ?>>

                            <article class="hentry post video">

                                <div class="post__author author vcard inline-items">
                                    <img src="../../assets/theme/img/avatar7-sm.jpg" alt="author">

                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#"><?php echo $user_email ?></a> shared a <a
                                                href="#">link</a>
                                        <div class="post__date">
                                            <time class="published" datetime="<?php echo $post['created_at']; ?>">
                                                <?php $date=date('d M Y', strtotime($post['created_at'])); echo $date; ?> at
                                                <?php $date=date('h:ia', strtotime($post['created_at'])); echo $date; ?>
                                            </time>
                                        </div>
                                    </div>

                                    <div class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                        <ul class="more-dropdown">
                                    <?php
                                        if($_SESSION['user_id'] != $user_id) {
                                    ?>
                                        <li>
                                        <a data-toggle="modal" data-target="#report-post-modal" class="post-add-icon report_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>"><svg class="olymp-block-from-chat" style="width: 22px; height: 22px;"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use></svg> Report Post</a>
                                        </li>
                                        <?php
                                    }else {
                                        ?>
                                        <li>
                                        <a class="post-add-icon delete_post inline-items"
                                        data-post_id="<?php echo $post['news_feed_id']; ?>"
                                        data-toggle="modal" data-target="#delete-post-modal">
                                        <svg class="olymp-block-from-chat"
                                            style="width: 22px; height: 22px;">
                                            <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use>
                                        </svg>
                                            Delete Post
                                        </a>
                                    </li>
                                            <?php
                                        }//end of if
                                            ?>
                                    </ul>
                                    </div>

                                </div>

                                <?php
                                if(isset($post['news_feed_text'])){
                                    echo "<p>".$post['news_feed_text']."</p>";
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

                                    <a class="post-add-icon like_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>">
                                        <svg class="olymp-heart-icon">
                                            <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-heart-icon"></use>
                                        </svg>
                                        <span data-post_id="<?php echo $post['news_feed_id']; ?>"><?php echo $post_controller->post_liked($news_feed_id, $_SESSION['user_id']); ?><?php echo $post_controller->get_likes($news_feed_id); ?></span>
                                    </a>

                                    <div class="comments-shared">
                                        <a href="addSharePost/<?php echo $news_feed_id?>" class="post-add-icon share_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>">
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
                    }else if ($news_feed_media != ''){
                        ?>
                        <div class="ui-block" <?php if($post_controller->is_post_reported($news_feed_id, $_SESSION['user_id'])) echo "hidden"; ?>>

                            <article class="hentry post has-post-thumbnail">

                                <div class="post__author author vcard inline-items">
                                    <img src="../../assets/theme/img/avatar5-sm.jpg" alt="author">

                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#"><?php echo $user_email ?></a>
                                        <div class="post__date">
                                            <time class="published" datetime="<?php echo $post['created_at']; ?>">
                                                <?php $date=date('d M Y', strtotime($post['created_at'])); echo $date; ?> at
                                                <?php $date=date('h:ia', strtotime($post['created_at'])); echo $date; ?>
                                            </time>
                                        </div>
                                    </div>

                                    <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                        <ul class="more-dropdown">
                                    <?php
                                        if($_SESSION['user_id'] != $user_id) {
                                    ?>
                                        <li>
                                        <a data-toggle="modal" data-target="#report-post-modal" class="post-add-icon report_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>"><svg class="olymp-block-from-chat" style="width: 22px; height: 22px;"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use></svg> Report Post</a>
                                        </li>
                                        <?php
                                    }else {
                                        ?>
                                        <li>
                                        <a class="post-add-icon delete_post inline-items"
                                        data-post_id="<?php echo $post['news_feed_id']; ?>"
                                        data-toggle="modal" data-target="#delete-post-modal">
                                        <svg class="olymp-block-from-chat"
                                            style="width: 22px; height: 22px;">
                                            <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use>
                                        </svg>
                                            Delete Post
                                        </a>
                                    </li>
                                            <?php
                                        }//end of if
                                            ?>
                                    </ul>
                                    </div>

                                </div>

                                <?php
                                if(isset($news_feed_text)){
                                    echo "<p> $news_feed_text</p>";
                                }
                                ?>

                                <div class="post-thumb">
                         <?php
					echo '<img src="data:image/jpeg;base64,'.base64_encode( $news_feed_media ).'" alt="There is error here" />';

					?>
                                </div>

                                <div class="post-additional-info inline-items">

                                    <a class="post-add-icon like_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>">
                                        <svg class="olymp-heart-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                        <span data-post_id="<?php echo $post['news_feed_id']; ?>"><?php echo $post_controller->post_liked($news_feed_id, $_SESSION['user_id']); ?><?php echo $post_controller->get_likes($news_feed_id); ?></span>
                                    </a>


                                    <div class="comments-shared">
                                        <a href="addSharePost/<?php echo $news_feed_id; ?>" class="post-add-icon share_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>">
                                            <svg class="olymp-share-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-share-icon"></use></svg>
                                            <span>37</span>
                                        </a>
                                    </div>


                                </div>

                            </article>
                        </div>
                        <?php
                    }else if($news_feed_text != ''){
                        ?>
                        <div class="ui-block" <?php if($post_controller->is_post_reported($news_feed_id, $_SESSION['user_id'])) echo "hidden"; ?>>

                            <article class="hentry post has-post-thumbnail">

                                <div class="post__author author vcard inline-items">
                                    <img src="../../assets/theme/img/avatar2-sm.jpg" alt="author">

                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="#"><?php echo $user_email ?></a>
                                        <div class="post__date">
                                            <time class="published" datetime="<?php echo $post['created_at']; ?>">
                                                <?php $date=date('d M Y', strtotime($post['created_at'])); echo $date; ?> at
                                                <?php $date=date('h:ia', strtotime($post['created_at'])); echo $date; ?>
                                            </time>
                                        </div>
                                    </div>

                                    <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                        <ul class="more-dropdown">
                                    <?php
                                        if($_SESSION['user_id'] != $user_id) {
                                    ?>
                                        <li>
                                        <a data-toggle="modal" data-target="#report-post-modal" class="post-add-icon report_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>"><svg class="olymp-block-from-chat" style="width: 22px; height: 22px;"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use></svg> Report Post</a>
                                        </li>
                                        <?php
                                    }else {
                                        ?>
                                        <li>
                                        <a class="post-add-icon delete_post inline-items"
                                        data-post_id="<?php echo $post['news_feed_id']; ?>"
                                        data-toggle="modal" data-target="#delete-post-modal">
                                        <svg class="olymp-block-from-chat"
                                            style="width: 22px; height: 22px;">
                                            <use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-block-from-chat"></use>
                                        </svg>
                                            Delete Post
                                        </a>
                                    </li>
                                            <?php
                                        }//end of if
                                            ?>
                                    </ul>
                                    </div>
                                </div>

                                <p><?php echo $news_feed_text; ?></p>

                                <div class="post-additional-info inline-items">

                                    <a class="post-add-icon like_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>">
                                        <svg class="olymp-heart-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
                                        <span data-post_id="<?php echo $post['news_feed_id']; ?>"><?php echo $post_controller->post_liked($news_feed_id, $_SESSION['user_id']); ?><?php echo $post_controller->get_likes($news_feed_id); ?></span>
                                    </a>

                                    <div class="comments-shared">
                                        <a href="addSharePost/<?php echo $news_feed_id; ?>" class="post-add-icon share_post inline-items" data-post_id="<?php echo $post['news_feed_id']; ?>">
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
                ?>
			</div>

            <div id="ajaxLoadInfo"></div>
            <a id="load-more-button" href="" class="btn btn-control btn-more"><svg class="olymp-three-dots-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>

		</main>

		<!-- ... end Main Content -->







	</div>
</div>


<a class="back-to-top" href="#">
	<img src="../../assets/theme/svg-icons/back-to-top.svg" alt="arrow" class="back-icon">
</a>




<!-- Window-popup-CHAT for responsive min-width: 768px -->

<div class="ui-block popup-chat popup-chat-responsive" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">

	<div class="modal-content">
		<div class="modal-header">
			<span class="icon-status online"></span>
			<h6 class="title" >Chat</h6>
			<div class="more">
				<svg class="olymp-three-dots-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
				<svg class="olymp-little-delete js-chat-open"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
			</div>
		</div>
		<div class="modal-body">
			<div class="mCustomScrollbar">
				<ul class="notification-list chat-message chat-message-field">
					<li>
						<div class="author-thumb">
							<img src="../../assets/theme/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="../../assets/theme/img/author-page.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Don’t worry Mathilda!</span>
							<span class="chat-message-item">I already bought everything</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:29pm</time></span>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="../../assets/theme/img/avatar14-sm.jpg" alt="author" class="mCS_img_loaded">
						</div>
						<div class="notification-event">
							<span class="chat-message-item">Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 8:10pm</time></span>
						</div>
					</li>
				</ul>
			</div>

			<form class="need-validation">

		<div class="form-group label-floating is-empty">
			<label class="control-label">Press enter to post...</label>
			<textarea class="form-control" placeholder=""></textarea>
			<div class="add-options-message">
				<a href="#" class="options-message">
					<svg class="olymp-computer-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-computer-icon"></use></svg>
				</a>
				<div class="options-message smile-block">

					<svg class="olymp-happy-sticker-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-happy-sticker-icon"></use></svg>

					<ul class="more-dropdown more-with-triangle triangle-bottom-right">
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat1.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat2.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat3.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat4.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat5.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat6.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat7.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat8.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat9.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat10.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat11.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat12.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat13.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat14.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat15.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat16.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat17.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat18.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat19.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat20.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat21.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat22.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat23.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat24.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat25.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="../../assets/theme/img/icon-chat26.png" alt="icon">
							</a>
						</li>
						<li>
							<a href="#"> 
								<img src="../../assets/theme/img/icon-chat27.png" alt="icon">
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

	</form>
		</div>
	</div>

</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->

<?php
    include_once("includes/footer.php");
?>

<script src="../../assets/js/pages/newsfeed.page.js"></script>

<?php
    $url_for_template = APPPATH . "views/template/show_swal.php";
    include_once ($url_for_template);
?>

</body>

</html>