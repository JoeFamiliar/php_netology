<form method="post">
	Введите проверяемое число: 
	<input type="text" name="a" value=""><br>
	Введите крайние числа диапазона: <br>
	<input type="submit" value="Проверить">
</form>

<?php
 $a = (int)$_POST['a'];
 $fib1 = 0;
 $fib2 = 1;
 $check = 1;
 while($check){
	if($a < $fib1){
	 	echo "Число не входит в числовой ряд";
	 	$check = 0;
	}
	else {
	 	if($a == $fib1){
	 		echo "Число входит в числовой ряд";
	 		$check = 0;
	 	}
	 	else {
	 		$fib3 = $fib1;
	 		$fib1 += $fib2;
	 		$fib2 = $fib3;
	 	}
	}
 }
 ?>