<?php
require_once "config.php";
$title = $list = $etime = "";
$title_err = $notes_err = $etime_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//check for valid title
	$input_title = trim($_POST['title']);
	if (empty($input_title)) {
		$title_err = "Please Enter a Title .";
	} else {
		$title = $input_title;
	}
	//check for valid notes
	$input_notes = trim($_POST["notes"]);
	if (empty($input_notes)) {
		$notes_err = "Please enter a Notes.";
	} else {
		$notes = $input_notes;
	}
	//check for valid Expected time
	$input_etime = trim($_POST["etime"]);
	if (empty($input_etime)) {
		$etime_err = "Please enter the Expected time.";
	} elseif (!ctype_digit($input_etime)) {
		$etime_err = "Please enter a positive integer value.";
	} else {
		$etime = $input_etime;
	}
	if (empty($title_err) && empty($notes_err) && empty($etime_err)) {
		$sql = "INSERT INTO list (title, notes, etime) VALUES (?, ?, ?)";
		if ($stmt = mysqli_prepare($link, $sql)) {
			mysqli_stmt_bind_param($stmt, "ssi", $param_title, $param_notes, $param_etime);
			$param_title = $title;
			$param_notes = $notes;
			$param_etime = $etime;
			if (mysqli_stmt_execute($stmt)) {
				header("location: index.php");
				exit();
			} else {
				echo "Something went wrong. Please try again later.";
			}
		}
	}
	mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>CREATE_List</title>
	<link rel="stylesheet" href="stylesheet.css">

</head>

<body>
	<h1 align="center">Add Notes</h1>
	<div>
		<form action="create.php" method="POST">

			<label for="title">Title</label>
			<input type="text" name="title" placeholder="title">
			<span><?php echo $title_err; ?></span><br>


			<label for="note">Notes</label>
			<textarea name="notes" placeholder="abc"></textarea>
			<span><?php echo $notes_err; ?></span><br>

			<label for="etime">Expected time(In hour)</label>
			<input type="text" name="etime" placeholder="0">
			<span><?php echo $etime_err; ?></span>

			<input type="submit" value="Add">
		</form>
		<a href="index.php">Cancel</a>
	</div>
	<div class=bgimg>
		<img src="create.jpg" width="1300" height="500">
	</div>
</body>

</html>