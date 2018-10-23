<form method="post">
	Введите название страны: 
	<input type="text" name="country" value=""><br>
	<input type="submit" value="Проверить">
</form>
<?php
$filename = "https://raw.githubusercontent.com/netology-code/php-2-homeworks/master/files/countries/opendata.csv";
$contents = file_get_contents($filename);
$lines = explode("\n", $contents);
$data = [];
	foreach( $lines as $key => $line ){
		$data[] = str_getcsv( $line, ","); // linedata
		unset( $lines[$key] );
	}
$country = $_POST['country'];
$res = 0;
for($i = 1; $i < count($data); $i++){
	if($country == $data[$i][1]){
		echo $data[$i][4];
		$res = 1;
	}
}
if(!$res){
	echo "такой страны нет в нашем списке";
}
?>