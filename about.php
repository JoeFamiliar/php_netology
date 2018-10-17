<html>
	<head>
	</head>
	<body>
<?php
    $name = 'Антон';
    $age = 31;
    $email = 'joefamwork@gmail.com';
    $city = 'Ivanovo';
    $about = 'Разработчик шаблонов для парсера sliza.ru';
?>
		<h1>Профиль пользователя <?php echo $name; ?></h1>
		<table>
		    <tr>
		    	<td>Имя</td>
		    	<td><?php echo $name; ?></td>
		    </tr>
		    <tr>
		    	<td>Возраст</td>
		    	<td><?php echo $age; ?></td>
		    </tr>
		    <tr>
		    	<td>E-mail адрес</td>
		    	<td><?php echo $email; ?></td>
		    </tr>
		    <tr>
		    	<td>Город</td>
		    	<td><?php echo $city; ?></td>
		    </tr>
		    <tr>
		    	<td>О себе</td>
		    	<td><?php echo $about; ?></td>
		    </tr>
		</table>
	</body>
</html>
