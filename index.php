<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>To-DO LIST</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<style>
		.text {
			font-family: Arial, Helvetica, sans-serif;
		}

		tr {
			height: 40px;
		}

		.header {
			padding: 80px;
			text-align: center;
			color: lightgoldenrodyellow;
			font-size: 100px;
			font-stretch: semi-expanded;
			background-image: url('title1.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
			margin-bottom: 20px;

		}

		.addnote {
			padding: 20px;
			text-align: center;
			background: #1abc9c;
			margin-bottom: 20px;
		}
	</style>
</head>

<body>
	<link rel="stylesheet" href="footer.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">To-Do List</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Home</a>
					</li>

				</ul>
			</div>
		</div>
	</nav>

	<div class="header">
		<h1>To-Do List</h1>

	</div>

	<?php
	require_once "config.php";
	$sql = "SELECT * FROM list";
	if ($result = mysqli_query($link, $sql)) {
		if (mysqli_num_rows($result) > 0) {
			echo "<table class='table table-success table-striped' border=1>";

			echo "<thead>";
			echo "<tr>";
			echo "<th scope='col'>S_no</th>";
			echo "<th scope='col'>Title</th>";
			echo "<th scope='col'>To-Do</th>";
			echo "<th scope='col'>Expected-Time(Hour)</th>";
			echo "<th scope='col'>ACTION</th>";
			echo "</tr>";
			echo "</thead>";
			$sno = 0;
			echo "<tbody>";
			while ($row = mysqli_fetch_array($result)) {
				$sno++;
				echo "<tr>";
				echo "<th scope='row'>" . $sno . "</th>";
				echo "<td >" . $row['title'] . "</td>";
				echo "<td >" . $row['notes'] . "</td>";
				echo "<td >" . $row['etime'] . "</td>";
				echo "<td >";
				echo "<a href='view.php?id=" . $row['id'] . "' class='btn btn-outline-dark'>View Notes</a>";
				echo "   ";
				echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-outline-dark'>Update Notes</a>";
				echo "   ";
				echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-outline-dark'>Delete Notes</a>";
				echo "   ";

				echo "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo "<div class='addnote'>";
			echo "<a href='create.php' class='btn btn-outline-dark' >Create Notes</a>";
			echo "</div>";
			mysqli_free_result($result);
		} else {
			echo "<div class='addnote'>";
			echo "<h4><em>Hurryyy!!! You are Free Now!</em></h4><br>";
			echo "<a href='create.php'  class='btn btn-outline-dark'>Add To-Do List</a>";
			echo "</div>";
		}
	} else {
		echo "ERROR (NOT ABLE TO EXECUTE $sql : )" . mysqli_error($link);
	}
	mysqli_close($link);
	?>
	<div class=bgimg>
		<img src="home.jpg" class="img-fluid" alt="...">
	</div>
	<div class="footer-dark">
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6 item text">
						<h3>Company Name</h3>
						<p>MalGadi</p>
					</div>
					<div class="col item social"><a href="https://www.facebook.com/malgadi.co.in/"><i class="icon ion-social-facebook"></i></a><a href="https://www.youtube.com/channel/UC37swT-hpPGfXfg01CTPOBQ"><i class="icon ion-social-youtube"></i></a><a href="https://www.instagram.com/malgadi_ddu/"><i class="icon ion-social-instagram"></i></a></div>
				</div>
				<p class="copyright">Malgadi © 2021</p>
			</div>
		</footer>
	</div>

</body>

</html>