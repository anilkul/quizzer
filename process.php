<?php include 'db.php' ?>
<?php session_start(); ?>
<?php
	//Check if see if score is set_error_handler
	if (!isset($_SESSION['score'])) {
		$_SESSION['score'] = 0;
	}

	if($_POST) {
	
		$num = $_POST['number'];
		$selected_choice = $_POST['choice'];
		$next = $num+1;

	//Get Total Questions
	$total_questions = "SELECT * FROM questions";

	//Get Result
	$results = $mysqli->query($total_questions) or die($mysqli->error);

	$total = $results->num_rows;


	//Get Coreect Choince
	$query = "SELECT * FROM choices 
				WHERE question_number = $num AND is_correct = 1";

	//Get REsult
	$result = $mysqli->query($query) or die($mysqli->error);

	//Get Row
	$row = $result->fetch_assoc();

	//Set Correct Choice
	$correct_choice = $row['id'];

	//Compare
	if ($correct_choice == $selected_choice) {
		//Answer is correct
		$_SESSION['score']++;
	}
	if ($num == $total) {
		header("Location: final.php");
		exit();
	} else {
		header("Location: question.php?n=".$next);
	}
	
	}
?>