<?php
$row = 1;
$handle = fopen("money.csv", "r");

if($handle !== FALSE){
	$data = fgetcsv($handle, 1000, ",");
}

list(, $sum, $target) = $argv;

if($sum === "--today") {
	$total = 0;
	// считать данные из csv, пройти в цикле и сравнить текущую дату и вывести только те, у которых даты совпадают
	while($data ! == FALSE){
		$num = count($data);
		for($i = 0; $i < $num; $i++){
			$total += $data[$i]['sum'];
		}
		$text = "Общие расходы за сегодня $total р.";
	}
} else {

$today = date("Y-m-d");
$row = [$sum, $target, $today];
fputcsv($handle, $row);
  // записать в csv
$text = "Мы потратили $sum р. на $target $today";
}

?>

<html>
	<head>
    	<meta content="text/html; charset=utf-8">
	</head>
	<body>
		<?php echo $text; ?>
	</body>
</html>