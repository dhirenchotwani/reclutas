//window.alert("CAME");
$(document).ready(function () {
$(".team_members").select2();
$(".faculty_member").select2(); 
$(".student_skills").select2();

});


var clicked = 0;
var id = 1;


$("input[type=checkbox]#currently_working_experience").on("change", function (e) {
	console.log(!clicked);
	clicked = !clicked;
});

$("input[type=checkbox]#currently_ongoing_project").on("change", function (e) {
	console.log(!clicked);
	if (!clicked) {
		$("#end_date").val("1000-01-01");
		$(".hide-date").attr("hidden", true);
	} else {
		$(".hide-date").removeAttr("hidden");
	}
	clicked = !clicked;
});
//  addStudents();
// function addStudents(){

$("#edit_btn").on("click", function () {

	if (!clicked) {
		$(".to_be_hidden").attr("hidden", "true");
        /* $(".to_be_hidden").hide("drop", {
        	direction: "down"
        }, "slow"); */
        /* $(".shown_after_hidden").effect("size", {
            to: {
                height: 1000
            }
        }, 100); */
		$(".row_to_be_hidden").attr("hidden", "true");

        /* $(".row_to_be_hidden").hide("drop", {
            direction: "down"
        }, "slow"); */
		$(".row_to_be_appended").append("<div class='col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 main-div hidden'><div class='ui-block'><div class='ui-block-content'><div class='row'><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>First Name</label><input class='form-control' type='text' placeholder='' value='' name='student_first_name' id='student_first_name' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Last Name</label><input class='form-control' type='text' placeholder='' value='' name='student_last_name' id='student_last_name' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Enrollment ID Name</label><input class='form-control' type='text' placeholder='' value='' name='student_enrollment_id' id='student_enrollment_id' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Branch </label><input class='form-control' type='text' placeholder='' value='' name='student_branch' id='student_branch' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Phone  Number</label><input class='form-control' type='text' placeholder='' value='' name='student_phone' id='student_phone' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>DOB</label><input class='form-control' type='text' placeholder='' value='' name='student_dob' id='student_dob' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Gender</label><select name='student_gender' id='student_gender' required><option value='male'>Male</option><option value='female'>Female</option></select></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Blood Group </label><select name='student_blood_group' id='student_blood_group' required><option value='a+'>A+</option><option value='b+'>B+</option><option value='o+'>O+</option><option value='ab+'>AB+</option><option value='a-'>A-</option><option value='b-'>B-</option><option value='o-'>O-</option><option value='ab-'>AB-</option></select></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Mother Tongue </label><input class='form-control' type='text' placeholder='' value='' name='student_mother_toungue' id='student_mother_toungue' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Religion </label><input class='form-control' type='text' placeholder='' value='' name='student_religion' id='student_religion' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Nationality </label><input class='form-control' type='text' placeholder='' value='' name='student_nationality' id='student_nationality' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Subcaste </label><input class='form-control' type='text' placeholder='' value='' name='student_sub_caste' id='student_sub_caste' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Caste Category </label><input class='form-control' type='text' placeholder='' value='' name='student_cast_category' id='student_cast_category' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Martial Status  </label><select name='student_maritial_status' id='student_maritial_status' required><option value='married'>Married</option><option value='single'>Single</option></select></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Physically Challenged </label><select name='student_physically_challenged' id='student_physically_challenged' required><option value='yes'>Yes</option><option value='no'>No</option></select></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Place of Birth </label><input class='form-control' type='text' placeholder='' value='' name='student_place_of_birth' id='student_place_of_birth' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Student Photo  </label><input  type='file' placeholder='' value='' name='student_photo' id='student_photo' required></div></div><div class='col col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'><div class='form-group label-floating'><label class='control-label'>Signature Photo</label><input  type='file' placeholder='' value='' name='student_signature_photo' id='student_signature_photo' required ></div></div></div><!-- end of row --></div>  </div>  <!-- End of ui block --></div>  <!-- End of col -->");
		//$(".main-div").removeAttr("hidden");
		/*         $(".main-div").effect({
					effect: "slide",
					easing: "easeInQuad",
				},5000);
		 */
		$(".main-div").animate({
			duration: 5000,
			easing: "slide",
		});

	} else {
		$(".to_be_hidden").removeAttr("hidden");
		$(".row_to_be_hidden").removeAttr("hidden");
		$(".main-div").hide();
	}
	clicked = !clicked;
	//console.log(clicked);



});





$("#HeyHere").on("click",function (params) {
	/* var team_members_choice = document.getElementById("team_members" + id); */
	//console.log($("#team_members" + id).val());

	//var project_role = document.getElementById("project_role" + id);
	console.log($("#project_role" + id).val());
});











$(".add-more-students").on("click", function (e) {

		//var clicked = $(this);
		//$(this).attr("hidden", true);
		
		var to_add = "<div class='row ' id='student-form" + id + "'><div class='col col-md-5 mt-2 form-group'><select  name='team_members[]' id='team_members" + id + "' data-placeholder='Select Team Members' style='width: 100%;'><option value='0' selected disabled>Select Student</option>     </select></div><div class='col col-md-5 mt-2'><input type='text' name='project_role' id='project_role" + id + "'></div><div class='col col-md-2 mt-2'><button type='button' class='form-control btn btn-danger delete_button' id='delete' onclick='deletePanel(" + id + ")'><i class='fa fa-trash'></i></button></div></div>";

		var to_append = "<div class='form-group add-student-form" + id + "'><div class='row' id='student-form'><div class='col col-md-5'><label class='control-label'>Student Name</label><select  name='team_members[]' id='team_members" + id + "' class='selectpicker form-control' data-placeholder='Select Team Members' style='width: 100%;'><option value='0' selected disabled>Select Student</option></select>    </div><div class='col col-md-5'><label>Role</label><input type='text' name='project_role[]' id='project_role" + id + "' >  </div><div class='col col-md-2'><label>&nbsp;</label><button type='button' class='form-control btn btn-danger delete_button' id='delete' onclick='deletePanel(" + id + ")'><i class='fa fa-trash'></i></button></div></div><!-- end of row --></div><!-- end of form group -->";
		
		$(".add-student-form").append(to_add);

		//team_members_choice = document.getElementById("#team_members" + id);

		team_members_choice = $("#team_members" + id);
		project_role  = $("#project_role " + id);


		//project_role = document.getElementById("#project_role" + id);
		
		console.log( team_members_choice);	
		console.log( project_role);	

		 $.ajax({
			type: 'POST',
			url: '../ajaxhelper/insert_team_member',
			processData: false,
			contentType: false

		}).done(function (response) {
			console.log(response);
			var json = $.parseJSON(response);
			var options = "";

		
			$.each(json, function (index, element) {
			 	options += "<option value = " + element.student_id + ">" + element.student_first_name +" "+element.student_last_name + "</option>";
			});

/* 			options += "<option value = " + json[0].student_id + ">" + json[0].student_first_name + "</option>";
 */			console.log(options);
			team_members_choice.append(options);

						
			
		}).fail(function (response) {
			console.log(response);
		}) 


		id++;







	});

	function deletePanel(val) {
		$("#student-form" + val).remove(); /*JQUERY HAS BUILT IN () TO REMOVE*/

	}
