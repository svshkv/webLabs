<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>
<?php require_once("includes/connection.php"); ?>
<?php

if(isset($_POST["addpost"])){

	if(!empty($_POST['headline']) && !empty($_POST['text'])) {
		$headline=$_POST['headline'];
		$text=$_POST['text'];
		$aid = 1;
		$date = date('Y-m-d');

		$sql="INSERT INTO posttbl
				(aid, headline, body, postDate) 
				VALUES('$aid', '$headline','$text', '$date')";

		$result=mysqli_query($con, $sql);


		if($result){
		 header("location:intropage.php");
		} else {
		 $message = "Failed to insert data information!";
		}
	} else {
		 $message = "All fields are required!";
	}
}
?>
<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
<?php include("includes/header.php"); ?>
<div class="container mregister">
			<div id="login">
	<h1>Новый пост</h1>
<form name="registerform" id="registerform" action="addPost.php" method="post">
	<p>
		<label for="headline">Заголовок<br />
		<input type="text" name="headline" id="headline" class="input" size="32" value=""  /></label>
	</p>
	
	
	<p>
		<label for="user_pass">Текст<br />
		<input type="text" name="text" id="text" class="input" value="" size="2000" /></label>
	</p>
		<p class="submit">
		<input type="submit" name="addpost" id="register" class="button" value="Создать" />
	</p>
	
</form>
	
	</div>
	</div>
<?php
}
?>