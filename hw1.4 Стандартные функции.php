<?php

$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?id=1526395&APPID=8998437e66f99c1bb088eb04b0eeea53');
if ($json === false) {
  exit('Не удалось получить данные');
}

if (empty($json)) {
        exit ('json пуст');
    } else {
$objArray = (array) json_decode($json, true);
if ($objArray === null) {
  exit('Ошибка декодирования json');
}
}

$temperature = $objArray['main']['temp'];
$temperature_res = (int)($temperature/17);
$pressure = $objArray['main']['pressure'];
$humidity = $objArray['main']['humidity'];
$weather_pic = $objArray['weather'][0]['main'];


if ($temperature_res > 0){
    $temp = '+' . $temperature_res;
} elseif ($temperature_res == 0) {
    $temp = '0';
} else  {
    $temp = '-' . $temperature_res;
}

if ($weather_pic == 'Clouds') {
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
     <style>
       @import url('https://fonts.googleapis.com/css?family=Lato:400,700,900|Merriweather:400,700,700i,900');

* {
 box-sizing: boreder-box;
 margin: 0;
}

body {
  font-size: 62.5%;
}

td {
  font: normal 600 14px Roboto, Arial, sans-serif;
  color: #505050;
}

h3 {
  font: 700 24px/1.4 Lato,Arial,sans-serif;
  color: #212121;
}

.col1 {
  padding: 5px;
  border: 1px solid #505050;
  background: #ddd;
}

.col2 {
  padding: 5px;
  border: 1px solid #505050;
}
    </style>
  </head>
  <body>
    <h3> Погода в Алматы на сегодня: </h3>
    <table>
    <td class="col1">Температура</td><td class="col1"><i><?php echo $temp . 'C°'?></i></td>
   </tr>
   <tr>
    <td class="col2">Влажность</td><td class="col2"><i><?php echo $humidity . '%'; ?></i></td>
   </tr>
   <tr>
    <td class="col1">Атмосферное давление</td><td class="col1"><?php echo $pressure . 'мм рт. ст.'; ?></i></td>
    <td><?php echo $picture; ?></td>
   </tr>
    </table>
  </body>
</html>
