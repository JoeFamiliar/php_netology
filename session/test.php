<?php
if(!empty($_FILES) && array_key_exists(key: "json", $_FILES)) {

}
?>
<html>
	<head>
	</head>
	<body>
		<form action="." method="POST" enctype="multipart/form-data">
			<input type="file" name="json">
			<input type="submit">
		</form>
	</body>
</html>