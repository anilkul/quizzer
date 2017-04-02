<?php session_start() ?>
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
			<div class="container">
				<h2>You're Done!</h2>
				<p>Congrats! You have completed the test</p>
				<p>Final Score: <?php echo $_SESSION['score'] ?></p>
				<?php session_destroy() ?>
				<a href="question.php?n=1" class="start">Take Again</a>
			</div>
		</div>
	</main>
	<footer>
		<div class="container"><small>Copyright &copy; 2017, PHP Quizzer</small></div>
	</footer>
</body>
</html>