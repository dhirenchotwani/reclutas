<html>
<head></head>
<body>
	<form action="../announcements/addFacultyAnnouncement" method="post">
		<label for="">Title:<input type="text" name="announcement_title"><br><br></label>
		<label for="">Notice:<textarea name="announcement_text"></textarea><br><br></label>
		<label for="">Last Date:<input type="date" name="announcements_due_date"><br><br></label>
		<label for="">Link:<input type="text" name="announcement_link"><br><br></label>
		<label for="">Image:<input type="file" name="announcement_image"><br><br></label>
		<input type="submit" name="addFacultyAnnouncement">
	</form>
</body>
</html>