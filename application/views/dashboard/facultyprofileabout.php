<?php

?>
	<!--*************ABOUT PAGE***************/-->
	<!DOCTYPE html>
	<html lang="en">

	<body>
		<?php
include_once("includes/header.php");
?>
			<?php
include_once("includes/left-sidebar.php");
include_once("includes/right-sidebar.php");
include_once("includes/header-bp.php");
include_once("modals/delete_modal.php");   
    extract($faculty);

	
?>
			
				<!-- Top Header-Profile -->
				<div class="container">
					<div class="row">
						<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="ui-block">
								<div class="top-header">
									<div class="top-header-thumb"> <img src="../../assets/theme/img/top-header1.jpg" alt="nature"> </div>
									<div class="profile-section">
										<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="show_profile" class="active">Timeline</a>
									</li>
									<li>
										<a href="show_profile_about">About</a>
									</li>
									<li>
										<a href="06-ProfilePage.html">Calendar</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="07-ProfilePage-Photos.html">Projects</a>
									</li>
									<li>
										<a href="show_announcements">Announcements</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
										</div>
										<div class="control-block-button">
											<a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue">
												<svg class="olymp-happy-face-icon">
													<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use>
												</svg>
											</a>
											<a href="#" class="btn btn-control bg-purple">
												<svg class="olymp-chat---messages-icon">
													<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
												</svg>
											</a>
											<div class="btn btn-control bg-primary more">
												<svg class="olymp-settings-icon">
													<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-settings-icon"></use>
												</svg>
												<ul class="more-dropdown more-with-triangle triangle-bottom-right">
													<li> <a href="#" data-toggle="modal" data-target="#update-header-photo">Update Profile Photo</a> </li>
													<li> <a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a> </li>
													<li> <a href="29-YourAccount-AccountSettings.html">Account Settings</a> </li>
												</ul>
											</div>
										</div>
									</div>
									<div class="top-header-author">
										<a href="02-ProfilePage.html" class="author-thumb"> <img src="../../assets/theme/img/author-main1.jpg" alt="author"> </a>
										<div class="author-content">
											<a href="02-ProfilePage.html" class="h4 author-name">
												<?php echo $faculty_first_name." ".$faculty_last_name; ?>
											</a>
											<div class="country">
												<?php echo $faculty_address_state ?>, India</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Main Content -->
				<div class="container">
					<div class="row">
						<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="ui-block">
								<div class="ui-block-title">
									<h6 class="title">Personal Information</h6>
									<button class="btn btn-primary btn-rounded edit-custom" name="edit_btn" id="edit_btn">
										<svg class="olymp-plus-icon">
											<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-plus-icon"></use>
										</svg>
									</button>
								</div>
								<div class="ui-block-content">
									<form class="needs-validation" novalidate>
										<div class="row row_to_be_hidden hidden">
											<div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4">
												<div class="form-group label-floating">
													<label class="control-label">First Name</label>
													<input class="form-control" type="text" placeholder="" value="<?php echo $faculty_first_name; ?>" disabled>
													<div class="invalid-feedback">
														<div class="error-box">
															<div class="danger">
																<svg class="olymp-little-delete">
																	<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
																</svg>
															</div>
															<h5 class="title">Error Box</h5>
															<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4">
												<div class="form-group label-floating">
													<label class="control-label">Last Name</label>
													<input class="form-control" type="text" placeholder="" value="<?php echo $faculty_last_name; ?>" disabled>
													<div class="invalid-feedback">
														<div class="error-box">
															<div class="danger">
																<svg class="olymp-little-delete">
																	<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
																</svg>
															</div>
															<h5 class="title">Error Box</h5>
															<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4">
												<div class="form-group label-floating">
													<label class="control-label">Date of Birth</label>
													<input class="form-control" type="text" placeholder="" value="<?php echo $faculty_dob; ?>" disabled>
													<div class="invalid-feedback">
														<div class="error-box">
															<div class="danger">
																<svg class="olymp-little-delete">
																	<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
																</svg>
															</div>
															<h5 class="title">Error Box</h5>
															<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4">
												<div class="form-group label-floating">
													<label class="control-label">Phone</label>
													<input class="form-control" type="text" placeholder="" value="<?php echo $faculty_phone; ?>" disabled>
													<div class="invalid-feedback">
														<div class="error-box">
															<div class="danger">
																<svg class="olymp-little-delete">
																	<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
																</svg>
															</div>
															<h5 class="title">Error Box</h5>
															<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
														</div>
													</div>
												</div>
											</div>
											
											<div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4">
												<div class="form-group label-floating">
													<label class="control-label">Gender</label>
													<input class="form-control" type="text" placeholder="" value="<?php echo ucfirst( $faculty_gender); ?>" disabled>
													<div class="invalid-feedback">
														<div class="error-box">
															<div class="danger">
																<svg class="olymp-little-delete">
																	<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
																</svg>
															</div>
															<h5 class="title">Error Box</h5>
															<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
														</div>
													</div>
												</div>
											</div>
											<div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4">
												<div class="form-group label-floating">
													<label class="control-label">City</label>
													<input class="form-control" type="text" placeholder="" value="<?php echo $faculty_address_city; ?>" disabled>
													<div class="invalid-feedback">
														<div class="error-box">
															<div class="danger">
																<svg class="olymp-little-delete">
																	<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
																</svg>
															</div>
															<h5 class="title">Error Box</h5>
															<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
														</div>
													</div>
												</div>
											</div>
										
											<div class="col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-4">
												<div class="form-group label-floating">
													<label class="control-label">Joined On</label>
													<input class="form-control" type="text" placeholder="" value="<?php echo $created_at;?>" disabled>
													<div class="invalid-feedback">
														<div class="error-box">
															<div class="danger">
																<svg class="olymp-little-delete">
																	<use xlink:href="../../assets/theme/svg-icons/sprites/icons.svg#olymp-little-delete"></use>
																</svg>
															</div>
															<h5 class="title">Error Box</h5>
															<p>Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod por incidid ut labore et lorem.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End of row -->
										<div class="row row_to_be_appended"> </div>
									</form>
								</div>
							</div>
							<!-- end of ui-block -->
						</div>
					</div>
					<!-- End of main row -->
					
	
				</div>
				<!-- End of conatiner -->
				<style>
					.fix-block-size-overflow {
						height: 250px;
						overflow: auto;
					}
				</style>
				<?php
    include_once("includes/footer.php");
?>
					<script src="../../assets/js/pages/profileabout.page.js"></script>
	</body>

	</html>