<?php
header('Content-type: text/html; charset=utf-8');
//POST

$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news=  explode("\n", $news);

function all_news($news) {
	echo 'Все новости<br>';
	foreach($news as $key => $value) {
		echo $key + 1 . ') ' .$value. "<br>";
	}
}


 if(!empty($_POST)){        
       if(isset($_POST['id']) && $_POST['id']!=null && preg_match('#^\d+$#', $_POST['id']) && $_POST['id'] >= 0){ // тут я в Гугле нашел способ проверить , чтоб id параметр был целым положительным числом (preg_match('#^\d+$#', $_GET['id']) && $_GET['id'] > 0)
            $id = (int)$_POST['id'];
	        if (array_key_exists($id, $news)) {
		    echo $id + 1 . ') ' .$news[$id]."<br>";
	        } else {
                        header('HTTP/1.0 404 NOT FOUND');
                        echo 'ERROR 404'."<br>";
                        echo 'Такой новости не существует'."<br>";
                        echo '<a href="/dz5_2.php">Перейти к списку новостей</a>';
	               }
       } else {
                header('HTTP/1.0 404 NOT FOUND');
                echo 'ERROR 404'."<br>";
                echo 'Такого запроса не существует'."<br>";  
               }
// Выводим все новости
} else {
	all_news($news);
}
?>

<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>FORM_5_2</title>
 </head>
 <body>

     <form action="dz5_2.php" method="POST">
  <p><b>Какую новость вы бы хотели прочесть?</b></p>
  <p>
  <input type="text" name="id" value="">
  </p>
  <p><input type="submit"></p>
 </form>

 </body>
</html>