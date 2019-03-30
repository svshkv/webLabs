<?php 
session_start();
if(!isset($_SESSION["session_username"])) {
	header("location:login.php");
} else {
?>

<?php require_once("includes/connection.php"); ?>
<?php include("includes/header.php"); ?>

<? 
//$query =mysqli_query($con, "SELECT * FROM posttbl");
//$message =  "'".$username."'";
// Выполняем SQL-запрос
$result = mysqli_query($con, "SELECT * FROM posttbl") or die('Запрос не удался: ' . mysql_error());

// Выводим результаты в html
echo "<table>\n";
while ($line = mysqli_fetch_array($result)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
?>
<div id="welcome">	
	<h2>Welcome, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
	<p><a href="logout.php">Logout</a> Here!</p>
</div>

	

<?php
}
?>
