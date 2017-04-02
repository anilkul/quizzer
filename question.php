<?php include 'db.php' ?>
<?php
	$num = $_GET['n'];

	//Get Question
	$questions = "SELECT * FROM questions WHERE question_number = $num";
	$choices = "SELECT * FROM choices WHERE question_number = $num";

	//Get Total Questions
	$query = "SELECT * FROM questions";
	//Get Result
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;

	//Get Result
	$questionsResult = $mysqli->query($questions) or die($mysqli->error.__LINE__);
	$choicesResult = $mysqli->query($choices) or die($mysqli->error.__LINE__);

	$row = $questionsResult->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quizzer</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<header>
		<div class="container">
			<h1><a href="index.php">PHP Quizzer</a></h1>
		</div>
	</header>
	<main>
		<div class="container">
			<div class="current">Question <?php echo $row['question_number'] ?> of <?php echo $total ?></div>

				<p class="question"><?php echo $row['question_text'] ?></p>
				<form action="process.php" method="post">
					<ul class="choices">
					<?php while ($row = $choicesResult->fetch_assoc()) : ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id'] ?>"><?php echo $row['choice_text'] ?></li>
					<?php endwhile; ?>
					</ul>
					<input type="submit" value="Submit">
					<input type="hidden" name="number" value="<?php echo $num ?>">
				</form>
		</div>
	</main>
	<footer>
		<div class="container"><small>Copyright &copy; 2017, PHP Quizzer</small></div>
	</footer>
</body>
</html>