<?php 
$pdo = new PDO("mysql:host=localhost;dbname=global", "akhripko", "neto1903");
$sql = "SELECT * FROM books";
$text = "<table>";
foreach ($pdo->query($sql) as $row){
	$text .= "<tr>";
	foreach($row as $column){
		$text .= "<td>".$column."</td>";
	}
	$text .= "</tr>";
}
$text .= "</table>";
?>
<html>
	<head>
	</head>
	<body>
	<?php echo $text; ?>
	</body>
</html>