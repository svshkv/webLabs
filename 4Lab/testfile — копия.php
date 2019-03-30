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
echo "<table border = 1>\n";
while ($line = mysqli_fetch_array($result)) {
    {
    echo "<tr><td>".$line['pid']."&nbsp;</td><td>".$line['aid']."
    &nbsp </td><td>".$line['text']."&nbsp;</td><td>".  
    $line['headline']."&nbsp;</td></tr>";
  }
  echo "</table>";
}


// Освобождаем память от результата
mysqli_free_result($result);

// Закрываем соединение
mysqli_close($link);
?>