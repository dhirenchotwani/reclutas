<?php
extract($details);
?>
<html>
<head></head>
<body>
<form action="updateFaculty" method="post">
	<input type="text" name="faculty_first_name" value="<?php echo $faculty_first_name;  ?>">
	<input type="text" name="faculty_first_name" value="<?php echo $faculty_middle_name;  ?>">
	<input type="text" name="faculty_middle_name"value="<?php echo $faculty_last_name;  ?>">
	<input type="text" name="faculty_last_name"value="<?php echo $faculty_department;  ?>">
	<input type="text"name="faculty_phone_name" value="<?php echo $faculty_phone;  ?>">
	<input type="date"name="faculty_dob_name" value="<?php echo $faculty_dob;  ?>">
	<input type="text"name="faculty_designation" value="<?php echo $faculty_designation;  ?>">
	<input type="text"name="faculty_gender" value="<?php echo $faculty_gender;  ?>">
	<input type="text"name="faculty_maritial_status" value="<?php echo $faculty_maritial_status;  ?>">
	<input type="text" name="faculty_physically_challenged"value="<?php echo $faculty_physically_challenged;  ?>">
	<input type="text" name="faculty_address_
flat"value="<?php echo $faculty_address_flat;  ?>">
	<input type="text" name="faculty_address_
street"value="<?php echo $faculty_address_street;  ?>">
	<input type="text"name="faculty_address_
city" value="<?php echo $faculty_address_city;  ?>">
	<input type="text"name="faculty_address_
state" value="<?php echo $faculty_address_state;  ?>">
	<input type="text"name="faculty_address_
pincode" value="<?php echo $faculty_address_pincode;  ?>">
	<input type="submit" name="updateFaculty">
	</form>
</body>
</html>