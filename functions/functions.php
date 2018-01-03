<?php 

function verify_minimum_words($database) {
	$query = "SELECT COUNT(word) AS total_records FROM definitions";

	$result = mysqli_query($database, $query);

	$count = mysqli_fetch_array($result);

	return $count['total_records'];
}