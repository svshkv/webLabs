<?php
// Соединяемся, выбираем базу данных
$link = mysqli_connect('localhost', 'root', 'svshkvsvshkv')
    or die('Не удалось соединиться: ' . mysql_error());
echo 'Соединение успешно установлено';
mysqli_select_db($link, 'userlistdb') or die('Не удалось выбрать базу данных');

// Выполняем SQL-запрос
$query = 'SELECT * FROM posttbl';
$result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysql_error());

// Выводим результаты в html

while ($line = mysqli_fetch_array($result)) {
    {

    echo "<div class='doc_sp'>";
	echo "<h3>".$line['pid']."</h3><br>";     
	echo "<p>".$line['aid']."</p>";
	echo "<p align=’right’>".$line['text']."</p></div>";
	echo "<p align=’right’>".$line['headline']."</p></div>";
  }

}


// Освобождаем память от результата
mysqli_free_result($result);

// Закрываем соединение
mysqli_close($link);
?>