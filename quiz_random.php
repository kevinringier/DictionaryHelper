<?php

include('templates/header.html');
include('db_connect.php');
include('functions/functions.php');

if (verify_minimum_words($dbc) >= 10) { // verify there are at least 10 words for quiz

	echo '<h1>Quiz on Random Stored Definitions</h1>';

	echo '<form action="quiz_random.php" method="post">';

	for ($i = 0; $i < 10; $i++) {

		// associative array with words as key and definitions as value
		$used_words;

		// associative array with true or false as key and definition as value, true indicates correct definition
		$definitions;

		$query = 'SELECT word FROM definitions ORDER BY RAND LIMIT 1';

		// print word

		// store definition in definitions array along with boolean

		// find 3 more random definitions

		// randomize array and print 4 definitions with radio buttons

	 	// 
	}
} else { // NEED TO FORMAT
	echo '<h4>Sorry, there are not enough definitions for a quiz.  <a href="add_word.php">Add</a> more words.</h4>';
}

