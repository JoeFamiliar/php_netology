<?php
if (!empty($argv[1])) {

	$handle = fopen("money.csv", "w");

	if($handle !== FALSE){
		$data = fgetcsv($handle, 1000, ",");
	}

	if($argv[1] === "--today") {
		$total = 0;
		// считать данные из csv, пройти в цикле и сравнить текущую дату и вывести только те, у которых даты совпадают
		while($data !== FALSE){
			$num = count($data);
			for($i = 0; $i < $num; $i++){
				$total += $data[$i]['sum'];
			}
			$text = "Общие расходы за сегодня $total р.";
		}
	} else {
		list(, $sum, $target) = $argv;
		$today = date("Y-m-d");
		$row = [$sum, $target, $today];
		// записать в csv
		fputcsv($handle, $row);
		  
		$text = "Мы потратили $sum р. на $target $today";
	}

	echo $text;
	
} else {
    exit('Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}');
}
?>