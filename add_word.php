<?php

define('TITLE', 'Home Page');
include('templates/header.html');
include('db_conntect.php');
?>

<form action="" method="post">
	<p>Word: <input type="text" name="word"></p>
	<p>
		Type of Word:
		<select name="type">
			<option value="">Type</option>
			<option value="adjective">Adjective</option>
			<option value="noun">Noun</option>
			<option value="verb">Verb</option>		
		</select>
	</p>	
	<p>
		<textarea rows="5" cols="80">Enter the definition here!</textarea>
	</p>
	<input type="submit" name="submit" value="Create Word!">
</form>


<?php
include('templates/footer.html');
?>