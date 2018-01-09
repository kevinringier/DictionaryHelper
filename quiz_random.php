<?php

ob_start();

include('templates/header.html');
include('db_connect.php');
include('functions/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // quiz has been submitted

	echo '<h1>Results for Quiz!</h1>';

	session_start();

	$used_words = $_SESSION['used_words'];

	$number_correct = 0;

	foreach ($used_words as $word => $definition) {
		if ($definition == $_POST[$word]) {

			echo '<div class="alert alert-success" role="alert"><b><em>CORRECT</em></b> ' .
    		       $word . ' - ' . $definition .
    		  '</div>';
			$number_correct++;

		} else {
			echo '<div class="alert alert-danger" role="alert"><b><em>INCORRECT</em></b> ' .
    		       $word . ' - ' . $_POST[$word] . '<br>
    		       <b><em>CORRECT DEFINITION:</em></b> ' . $definition .  
    		  '</div>';
		}
	}

	echo $number_correct;

} else { // quiz has not been submitted

	if (verify_minimum_words($dbc) >= 10) { // verify there are at least 10 words for quiz

		echo '<h1>Quiz on Random Stored Definitions</h1>';

		echo '<form action="quiz_random.php" method="post">';

		// initialize array to store all used words
		$used_words = [];

		while (count($used_words) < 10) {	

			// retrieve 1 random word for quiz
			$query = 'SELECT * FROM definitions ORDER BY RAND() LIMIT 1';
			$result = mysqli_query($dbc, $query);
			$row = mysqli_fetch_array($result);


			// verify word has not already been used
			if (!isset($used_words[$row['word']])) {

				$used_words = array_push_assoc($used_words, $row['word'], $row['definition']);
				
				//initialize array to store temporary definitions
				$definitions = [];

				// store correct definition in definitions array 
				array_push($definitions, $row['definition']);


				// begin form 
				echo '<div class="form-group">
						<label for="exampleFormControlSelect1"><h3>' . $row['word'] . ':</h3></label>';

				
				// find 3 more random definitions
				while (count($definitions) < 4) {
					$query = 'SELECT definition FROM definitions ORDER BY RAND() LIMIT 1';
					$result = mysqli_query($dbc, $query);
					$row = mysqli_fetch_array($result);

					if (!in_array($row['definition'], $definitions)) {
						array_push($definitions, $row['definition']);
					}
				}

				shuffle($definitions);	

				// create select with 1 correct definition and 3 incorrect
				echo '<select class="form-control" id="exampleFormControlSelect1" name="' . endKey($used_words) . '">';

				foreach ($definitions as $definition) {    

					echo '<option value="' . $definition . '">' . $definition . '</option>';
				}

				echo '</select></div><br>';
			}
		}

		session_start();

		$_SESSION['used_words'] = $used_words;

		echo '<input class="btn btn-primary" type="submit" name="submit" value="Submit Quiz!"><br><br>';



	} else { // NEED TO FORMAT
		echo '<h4>Sorry, there are not enough definitions for a quiz.  <a href="add_word.php">Add</a> more words.</h4>';
	}
}

?>



