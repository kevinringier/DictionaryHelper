<?php

if (isset($_GET['word'])) {

	include('db_connect.php');

	$query_word = mysqli_real_escape_string($dbc, trim(strip_tags(strtolower($_GET['word']))));

	$query = "SELECT * FROM definitions WHERE word='$query_word'";

	$result = mysqli_query($dbc, $query);

	$row = mysqli_fetch_array($result);

	if (strcasecmp($row['word'], $query_word) == 0) { // if word exists in database

		$word = $row['word'];

		switch ($row['type']) {
			case 'adj':
				$type = 'adjective';
				break;
			case 'noun':
				$type = 'noun';
				break;
			case 'verb':
				$type = 'verb';
				break;
			default:
				$type = 'Type Error';
		}
		
		$definition = $row['definition'];

		$page_title = "Definition: $word";
		include('templates/header.html');

		echo '<h1>' . $word . ' - '. $type . '</h1><br><br>
			  <h3>'. $definition . '</h3><br><br>';

		
	} else { // if word doesn't exist, redirect to dictionary.com
		
		header('Location: http://www.dictionary.com/browse/' . $query_word . '?s=t');
		exit();
	}

	include('templates/footer.html');
} else { // if no search variable was submitted
	echo '<p>You have accessed this page in error!  Please go back <a href="index.php">Home</a></p>';
}





