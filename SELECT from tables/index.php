<?php 
$pdo = new PDO("mysql:host=localhost;dbname=global", "akhripko", "neto1903");
$pdo->query("SET CHARACTER SET 'utf8'");
$sql = "SELECT * FROM books";
$text = "<table>";
foreach ($pdo->query($sql) as $row){
	$text .= "<tr>";
	for($i = 0; $i < count($row)/2; $i++){
		$text .= "<td>".$row[$i]."</td>";
	}
	$text .= "</tr>";
}
$text .= "</table>";
?>
<html>
	<head>
		<meta content="text/html; charset=utf-8">
	</head>
	<body>
	<?php echo $text; ?>
	</body>
</html>