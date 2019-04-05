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
	$text = "12345";
	$del = "deletePost.php";
	while ($line = mysqli_fetch_array($result)) {
	    {

	    echo "<div id='welcome'>";
		echo "<h3>".$line['headline']."</h3><br>";     
		echo "<p>".$line['postDate']."</p>";
		echo "<p align=’right’>".$line['body']."</p>";
		echo "<a href='deletePost.php?pid=".$line['pid']."'>Удалить</a></div>";

	  }

	}


	// Освобождаем память от результата
	mysqli_free_result($result);

	// Закрываем соединение
	mysqli_close($link);
?>

<link href="css/style1.css" media="screen" rel="stylesheet">

<div id="menu"><p class="leftstr"><a href="addPost.php">Добавить пост</a></p>
	<p class="rightstr"><a href="logout.php">Выйти</a></p>
</div>


	

<?php
}
?>
