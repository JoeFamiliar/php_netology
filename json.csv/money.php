<?php
if (!empty($argv[1])) {

	$filename = 'money.csv';

	if (!file_exists($filename)) {
	    $handle = fopen('money.csv', 'w');
	    $row = ['дата', 'стоимость', 'описание'];
		fputcsv($handle, $row);
	}

	$today = date("Y-m-d");

	if($argv[1] === "--today") {

		$handle = fopen('money.csv', 'r');

		if($handle !== FALSE){
			$data = fgetcsv($handle, 1000, ",");
		}

		$total = 0;
		// считать данные из csv, пройти в цикле и сравнить текущую дату и вывести только те, у которых даты совпадают
		while($data !== FALSE){
			$num = count($data);
			for($i = 0; $i < $num; $i++){
				if($data[$i] == $today)
					$total += (int)$data[$i]['sum'];
			}
		}
		if($total == 0){
			echo "Операции отсутствуют в этот день";
		} else {
			echo "Общие расходы за сегодня $total р.";
		}

		fclose($handle);

	} else {

		$handle = fopen('money.csv', 'a+');

		if($handle !== FALSE){
			$data = fgetcsv($handle, 1000, ",");
		}

		list(, $sum, $target) = $argv;
		
		$row = [$sum, $target, $today];
		// записать в csv
		fputcsv($handle, $row);
		fclose($handle);
		
		echo "Добавлена строка $today, $sum, $target";
	}

	

} else {
    exit('Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}');
}
?>