<?php 

$page_title = 'View Words';

include('templates/header.html');
include('../db_connect.php');

echo '<h1>View All Words</h1>';

$query = 'SELECT * FROM definitions ORDER BY word';

if ($r = mysqli_query($dbc, $query)) {

	echo '<div class="list-group">';

	while ($row = mysqli_fetch_array($r)) {
		print '<a href="word.php?word=' . $row['word'] . '" class="list-group-item list-group-item-action">' .
    		       $row['word'] . ' - ' . $row['definition'] .
    		  '</a>';
	}

	echo '</div>';

} else {
	print '<p>Could not retrieve the data</p>';
}

include('templates/footer.html');

?>


