<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Пример выполнения задания "Сложные погодные условия"</title>
</head>
<style>
  body {
    font-family: sans-serif;
  }
  h3 {
    font-size: 50px;
    margin: 0;
  }
  img {
      vertical-align: middle;
  }
  table, td {
    border: 1px solid #999;
  }
  td {
      padding: 10px 30px 10px 5px;
  }
</style>
<body>
<?php
	$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Moscow,ru&APPID=67d8d9f2444c21abf1ea6b69a59d578b');
	$weather_ar = json_decode($json, true);
	?>
	<h2>Weather in Moscow:</h2>
  <h3><img src="https://openweathermap.org/img/w/<?php echo $weather_ar['weather'][0]['icon']; ?>.png" alt="">
  <?php echo (int)$weather_ar['main']['temp']-273.15; ?> °C</h3>
  <p><?php echo $weather_ar['weather'][0]['main']; ?></p>
  <table>
    <tr>
      <td>Wind</td>
      <td><?php echo $weather_ar['wind']['speed']; ?></td>
    </tr>
    <tr>
      <td>Pressure</td>
      <td><?php echo $weather_ar['main']['pressure']; ?> hPa</td>
    </tr>
    <tr>
      <td>Humidity</td>
      <td><?php echo $weather_ar['main']['humidity']; ?> %</td>
    </tr>
  </table>
  </body>
</html>
