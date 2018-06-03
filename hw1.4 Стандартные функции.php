<?php

$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?id=1526395&APPID=8998437e66f99c1bb088eb04b0eeea53');
$object = json_decode($json, true);
// print_r ($object);
$objArray = (array) $object;

// echo "<pre>";
// print_r($objArray);
// echo "</pre>";

$temperature = $objArray["main"]["temp"];
$pressure = $objArray["main"]["pressure"];
$humidity = $objArray["main"]["humidity"];
$weather_pic = $objArray["weather"]["main"];

echo '<h3>'."Погода в Алматы на сегодня:" .'</h3>';
$temperature_res = (int)($temperature/17);
if ($temperature_res > 0){
    echo '<i>' . "Температура: +" . '</i>' . $temperature_res . 'C°'.'<br>';
} elseif ($temperature_res == 0) {
    echo '<i>' . "Температура: 0 C°" . '</i>' .'<br>';
} else  {
    echo '<i>' . "Температура: -" . '</i>' . $temperature_res . 'C°'.'<br>';
}
echo '<i>' . "Влажность:" . '</i>' . $humidity . '%'.'<br>';
echo '<i>' . "Атмосферное давление:" . '</i>' . $pressure . 'мм рт. ст.' . '<br>';
if ($weather_pic == "Cloud") {
    echo 'Облачно'.'<img src="https://u.cubeupload.com/Piligrimo/e326cf.jpg"><br>';
}   elseif ($weather_pic == "Rain") {
    echo 'Дождь'.'<img src="https://u.cubeupload.com/Piligrimo/f303e7.jpg"><br>';
}   elseif ($weather_pic == "Mist") {
    echo 'Туман'.'<img src="https://u.cubeupload.com/Piligrimo/cloudweathermistfog.png"><br>';
}   else  {
    echo 'Ясно'.'<img src="https://u.cubeupload.com/Piligrimo/c57771.jpg"><br>';
}
