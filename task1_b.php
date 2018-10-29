<?php
 $a = (int)$_POST['a'];
 $fib1 = 0;
 $fib2 = 1;
 if(!isset($a)){
	while($fib1 < $a){
 		$fib3 = $fib1;
 		$fib1 += $fib2;
 		$fib2 = $fib3;
 	}
	if($a < $fib1){
	 	$text = "Число не входит в числовой ряд";
	}
	elseif($a == $fib1){
	 	$text = "Число входит в числовой ряд";
	}
 }
 ?>
 <html>
 	<head>
 	</head>
 	<body>
		 <form method="post">
			Введите проверяемое число: 
			<input type="text" name="a" value=""><br>
			<input type="submit" value="Проверить">
		</form>
		Вы ввели: <?php echo $a; ?><br>
		<?php echo $text; ?>
	</body>
</html>
