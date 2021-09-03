<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>VIEW_List</title>
	<style>
		table {

			border: 1px solid black;
			width: 40%;

			border-collapse: collapse;
		}

		.text {
			font-family: verdana;
		}

		tr {
			height: 40px;
		}

		td {
			color: darkred;

		}

		h3 {
			color: darkslategray;
			text-align: center;
		}

		body {

			background-image: url('view.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;

		}
	</style>
</head>

<body>
	<?php
	require_once "config.php";
	$sql = "SELECT * FROM list WHERE id=" . $_GET['id'];
	if ($result = mysqli_query($link, $sql)) {
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			echo "<table border='1px' align='center' class='text' >";
			echo "<tr>";
			echo "<td align='center' ><h1>View Task!</h1></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h3>Title:</h3></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo $row['title'];
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h3>Notes:</h3></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo $row['notes'];
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h3>Expected Time:</h3></td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>";
			echo $row['etime'];
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
	}
	?>
</body>

</html>