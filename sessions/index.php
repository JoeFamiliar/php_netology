<?php
session_start();

function checkUserPass($user, $pass) 
{
	$path = 'users' . DIRECTORY_SEPARATOR;
	$files = glob($path . '*.json');
	foreach ($files as $userFile) {
		$userName = str_replace('users/', '', $userFile);
		$userName = explode('.', $userFile);
		if($userName[0] == $user) {
			$content = file_get_contents($userFile);
			$userJson = json_decode($content, true);
			print_r($userJson);
			if($userJson['password'] == $pass) {
				return true;
			}
		}
	}
	return false;
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['username']) && !empty($_POST['password'])) { // если юзер, то в админку с правами
		if(checkUserPass($_POST['username'], $_POST['password'])) {
			$_SESSION['username'] = $_POST['username'];
			header('Location: admin.php');
		} else {
			header('Location: index.php');
		}
	} elseif(isset($_POST['username']) && empty($_POST['password'])) { // eсли без пароля, то гость и сразу на список тестов, минуя админку для добавления тестов
		$_SESSION['guest'] = $_POST['username'];
		header('Location: list.php');
	} else { // если ничего не ввели или ввели неверно, то обратно на index.php
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