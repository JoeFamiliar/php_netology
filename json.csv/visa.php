<?php

$filename = "https://raw.githubusercontent.com/netology-code/php-2-homeworks/master/files/countries/opendata.csv";
$contents = file_get_contents($filename);
$lines = explode("\n", $contents);
$data = [];
$text = "Введите название страны";

foreach( $lines as $key => $line )
{
	$data[] = str_getcsv( $line, ","); // linedata
	unset( $lines[$key] );
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$country = $_POST['country'];
	$res = 0;
	$text = '';
	
	for($i = 1; $i < count($data); $i++)
	{
		if($country == $data[$i][1]){
			$text = "Режим для въезда в страну <b>".$country."</b>: ".$data[$i][4];
			$res = 1;
		}
	}

	if(!$res)
	{
		$text = "Такой страны нет в нашем списке";
	}
}

?>
<html>
	<head>
	</head>
	<body>
		<form method="post">
			Введите название страны: 
			<input type="text" name="country" value=""><br>
			<input type="submit" value="Проверить">
		</form>
		<?php echo $text; ?>
	</body>
</html>
