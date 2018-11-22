<?php
session_start();

function checkUserPass($user, $pass) 
{
	$path = 'users' . DIRECTORY_SEPARATOR;
	$files = glob($path . '*.json');
	foreach ($files as $userFile) {
		$userName = explode('.', $userFile['name']);
		if($userName[0] == $user) {
			$content = file_get_contents($userFile['name']);
			$userJson = json_decode($content, true);
			if($userJson['password'] == $pass) {
				return true;
			}
		}
	}
	return false;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['username']) && isset($_POST['password'])) {
		if(checkUserPass($_POST['username'], $_POST['password'])) {
			$_SESSION['username'] = $_POST['username'];
			header('Location: admin.php');
		} else {
			header('Location: index.php');
		}
	} elseif(isset($_POST['username']) && !isset($_POST['password'])) {
		$_SESSION['guest'] = $_POST['username'];
		header('Location: admin.php');
	} else {
		header('Location: index.php');
	}
}

?>

<html>
	<head>
	</head>
	<body>
		<?php //echo $text; ?>
		<form action="index.php" method="POST">
			<p>Войти: </p>
			<input type="text" name="username">
			<input type="text" name="password">
			<input type="submit" value="Войти">
		</form>
	</body>
</html>