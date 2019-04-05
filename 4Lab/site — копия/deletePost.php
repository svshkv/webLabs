<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else { 
		$link = mysqli_connect('localhost', 'root', 'svshkvsvshkv')
	    or die('Не удалось соединиться: ' . mysql_error());
	//echo 'Соединение успешно установлено';
		mysqli_select_db($link, 'userlistdb') or die('Не удалось выбрать базу данных');

		// Выполняем SQL-запрос
		$query = "DELETE FROM posttbl WHERE (pid=".$_GET['pid'].")";
		mysqli_query($link, $query) or die('Удаление не удалось: ' . mysql_error());
		header("location:intropage.php");
} ?>