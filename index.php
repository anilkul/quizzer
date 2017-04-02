<?php include 'db.php' ?>
<?php
	//Total Questions
	$query = "SELECT * FROM questions";

	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quizzer</title>
	<link rel="stylesheet" href="css/style.css" >
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="index.php">PHP Quizzer</a></h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Test Your PHP Knowledge</h2>
			<p>This is a multiple choice to test your knowledge of PHP</p>
			<ul>
				<li><strong>Number Of Questions: </strong><?php echo $total ?></li>
				<li><strong>Type: </strong>Multiple Choice</li>
				<li><strong>Estimated Time: </strong><?php echo $total * .5 ?> min(s)</li>
			</ul>
			<a href="question.php?n=1" class="start">Start Quiz</a>
			<a href="add.php" class="start">Add Question</a>
		</div>
	</main>
	<footer>
		<div class="container"><small>Copyright &copy; 2017, Anil Kul</small></div>
	</footer>
</body>
</html>