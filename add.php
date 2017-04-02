<?php include 'db.php' ?>
<?php
	if(isset($_POST['submit'])) {
		//Get Post Variables
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];

		//Choices array
		$choices[1] = $_POST['choice1'];
		$choices[2] = $_POST['choice2'];
		$choices[3] = $_POST['choice3'];
		$choices[4] = $_POST['choice4'];


		//Question query
		$query = "INSERT INTO questions(question_number, question_text) VALUES($question_number, '$question_text')";

		//Run Query
		$insert_row = $mysqli->query($query) or die($mysqli->errno." ".$mysqli->error.__LINE__);

		//Validate insert
		if ($insert_row) {
			foreach ($choices as $choice => $value) {
				if ($value !='') {
					if ($correct_choice == $choice) {
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}
					//Choice Query
					$query = "INSERT INTO choices(question_number, is_correct, choice_text) VALUES($question_number, $is_correct, '$value')";

					//Run Query
					$insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

					//Validate insert
					if($insert_row) {
						continue;
					} else {
						die('Error: ('.$mysqli->errno . ') '. $mysqli->error);
					}
				}
			}
		$msg = 'Question has been added';
		}
	}
?>

<?php
	//Get Total Questions
	$query = "SELECT * FROM questions";
	//Get Result
	$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $results->num_rows;
	$next = $total+1;
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
			<h2>Add A Question</h2>
			<?php
				if(isset($msg)) {
					echo '<p>'.$msg.'</p>';
				}
			?>
			<form action="add.php" method="post">
				<p>
					<label >Question Number: </label>
					<input type="number" name="question_number" value="<?php echo $next; ?>">
				</p>
				<p>
					<label >Question Text: </label>
					<input type="text" name="question_text">
				</p>
				<p>
					<label >Choice #1: </label>
					<input type="text" name="choice1">
				</p>
				<p>
					<label >Choice #2: </label>
					<input type="text" name="choice2">
				</p>
				<p>
					<label >Choice #3: </label>
					<input type="text" name="choice3">
				</p>
				<p>
					<label >Choice #4: </label>
					<input type="text" name="choice4">
				</p>
				<p>
					<label >Correct Choice Number: </label>
					<input type="text" name="correct_choice">
				</p>
				<p><input type="submit" name="submit" value="Submit"></p>
			</form>
			
		</div>
	</main>
	<footer>
		<div class="container"><small>Copyright &copy; 2017, PHP Quizzer</small></div>
	</footer>
</body>
</html>