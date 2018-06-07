<?php

$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?id=1526395&APPID=8998437e66f99c1bb088eb04b0eeea53');
if ($json === false) {
  exit('Не удалось получить данные');
}

if (empty($json)) {
        echo 'json пуст';
    }

$objArray = (array) json_decode($json, true)
if ($object === null) {
  exit('Ошибка декодирования json');
}


$temperature = $objArray['main']['temp'];
$pressure = $objArray['main']['pressure'];
$humidity = $objArray['main']['humidity'];
$weather_pic = $objArray['weather'][0]['main'];

$temperature_res = (int)($temperature/17);

if ($temperature_res > 0){
    $temp = '+' . $temperature_res;
} elseif ($temperature_res == 0) {
    $temp = '0';
} else  {
    $temp = '-' . $temperature_res;
}

if ($weather_pic == 'Cloud') {
    $picture = print 'Облачно'.'<img src="http://openweathermap.org/img/w/04n.png"><br>';
}   elseif ($weather_pic == "Rain") {
    $picture = 'Дождь'.'<img src="http://openweathermap.org/img/w/09d.png"><br>';
}   elseif ($weather_pic == "Mist") {
    $picture = 'Туман'.'<img src="http://openweathermap.org/img/w/50d.png"><br>';
}   else  {
    $picture = 'Ясно'.'<img src="http://openweathermap.org/img/w/01d.png"><br>';
}
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
     <meta charset="UTF-8">
     <title>1.4. Стандартные функции</title>
  </head>
  <body>
    <h3>Погода в Алматы на сегодня: </h3>
    <table>
      <thead>
        <tr>
          <td>Температура</td>
          <td>Влажность</td>
          <td>Атмосферное давление</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><i><?php echo $temp . 'C°'?></i></td>
          <td><i><?php echo $humidity . '%'; ?></i></td>
          <td><i><?php echo $pressure . 'мм рт. ст.'; ?></i></td>
        </tr>
      </tbody>
    </table>
    <?php echo $picture; ?><
  </body>
</html>
