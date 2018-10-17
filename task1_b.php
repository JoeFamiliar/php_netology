<form method="post">
	Введите проверяемое число: 
	<input type="text" name="a" value=""><br>
	Введите крайние числа диапазона: <br>
	<input type="text" name="left" value="0">
	<input type="text" name="right" value="100"><br>
	<input type="submit" value="Проверить">
</form>

<?php
 $a = $_POST['a'];
 $left = $_POST['left'];
 $right = $_POST['right'];

 if($a < $left || $a > $right){
 	echo "Число выходит за рамки диапазона";
 }
 else echo "Число входит в рамки";
 ?>