<?php 
$pdo = new PDO("mysql:host=localhost;dbname=global;charset=utf8", "akhripko", "neto1903");
$current = $_GET['table'];
$sql = "SHOW COLUMNS FROM ".$current;
$text = "<table><tr><td>Имя поля</td><td>Тип поля</td></tr>";
$typeVariants = ['int(11)', 'varchar(255)', 'text', 'bool', 'int', 'float', 'date'];
foreach ($pdo->query($sql) as $row){
   // $text .= "<tr><td>".$row['Field']."</td><td>".$row['Type']."</td></tr>";
    $text .= "<form action='' method='POST'><tr><td><input type='text' value=".$row['Field']." name='name'></td><td><select name='type'>"; 
    foreach ($typeVariants as $type) {
        if($row['Type'] == $type)
          $text .= "<option selected value=".$type.">".$type."</option>";
        else
          $text .= "<option value=".$type.">".$type."</option>";
    }
    $text .= "</select><input type='hidden' name='oldname' value='".$row['Field']."'><input type='submit' value='Изменить'></form></td></tr>";
}
$text .= "</table>";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $change = "ALTER TABLE ".$_GET['table']."CHANGE ".$_POST['oldname']." ".$_POST['name']." ".$_POST['type'];
  echo $change;
  $pdo->query($change);
}
?>
<html>
  <head>
    <meta content="text/html; charset=utf-8">
  </head>
  <body>
  <?php echo $text; ?>
  <br>
  <a href="index.php">Вернуться к списку таблиц</a>
  </body>
</html>