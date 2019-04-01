<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>

<?php include("includes/header.php"); ?>

<?php
// Соединяемся, выбираем базу данных
$link = mysqli_connect('localhost', 'root', 'svshkvsvshkv')
    or die('Не удалось соединиться: ' . mysql_error());
//echo 'Соединение успешно установлено';
mysqli_select_db($link, 'userlistdb') or die('Не удалось выбрать базу данных');

// Выполняем SQL-запрос
$query = 'SELECT * FROM posttbl';
$result = mysqli_query($link, $query) or die('Запрос не удался: ' . mysql_error());

// Выводим результаты в html

while ($line = mysqli_fetch_array($result)) {
    {

    echo "<div id='welcome'>";
	echo "<h3>".$line['headline']."</h3><br>";     
	echo "<p>".$line['aid']."</p>";
	echo "<p>".$line['date']."</p>";
	echo "<p align=’right’>".$line['text']."</p></div>";
  }

}


// Освобождаем память от результата
mysqli_free_result($result);

// Закрываем соединение
mysqli_close($link);
?>
<div id="logout">	
	<p>Welcome, <span><?php echo $_SESSION['session_username'];?>! </span></p>
	<p><a href="logout.php">Logout</a> Here!</p>
</div>

	

<?php
}
?>
