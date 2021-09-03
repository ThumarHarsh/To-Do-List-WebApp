<?php
require_once "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();
	$sql = "DELETE FROM list WHERE id=" . $_SESSION['stored_id'];

	if (mysqli_query($link, $sql)) {
		header("location: index.php");
		exit();
	} else {
		echo "Something went wrong. Please try again later.";
	}
}
mysqli_close($link);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>DELETE_List</title>
	<link rel="stylesheet" href="stylesheet.css">

	<style>
		h1 {
			background-color: pink;
			padding: 20px 20px;
			text-align: center;
		}

		p {
			background-color: lightsalmon;
			padding: 30px 30px;
			font-size: large;
		}
	</style>
</head>

<body>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		session_start();
		$_SESSION['stored_id'] = $_GET['id'];
	}
	?>
	<div>
		<form action="delete.php" method="POST">

			<h1>Finsh Task!</h1>
			<p>Are you sure you want to finish this task?.</p>
			</td>

			<input type="submit" value="Yes">


		</form>
		<a href="index.php">No</a>
	</div>
	<div class=bgimg>
		<img src="delete1.jpg" width="1300" height="500">
	</div>
</body>

</html>