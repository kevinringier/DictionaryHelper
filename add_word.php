<?php

$page_title = 'Add Word';

include('templates/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // check if form has been submitted
	if (!empty($_POST['word']) && !empty($_POST['type']) && !empty($_POST['definition'])) { // check if form has been submitted properly

		include('db_connect.php');

    // set form variables and remove inadvertant form characters
		$word = mysqli_real_escape_string($dbc, trim(strip_tags(strtolower($_POST['word']))));
		$type = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['type'])));
		$definition = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['definition'])));


    $query = "INSERT INTO definitions (word, type, definition, date_added)
               VALUES ('$word', '$type', '$definition', NOW())";

    mysqli_query($dbc, $query);

    if (mysqli_affected_rows($dbc) == 1) {
      echo '<br><div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Success!</h4>
              <p>Your definition was stored successfully in our database.</p>
            </div>';
    } else {
      echo '<br><div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Error!</h4>
              <p>Your definition could not be stored.</p>
            </div>';
    }
  } else {
		echo '<br><div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Form Error!</h4>
              <p>Please fulfill all the required fields.</p>
          </div>';
	}
}

?>

<h1>Add a Word</h1>

<form action="add_word.php" method="post">

	<!-- WORD INPUT -->
  	<div class="form-group">
    	<label for="exampleFormControlInput1">Word</label>
    	<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add Word" name="word">
  	</div>

  	<!-- WORD TYPE -->
  	<div class="form-group">
    <label for="exampleFormControlSelect1">Type of Word</label>
    <select class="form-control" id="exampleFormControlSelect1" name="type">
      	<option>Choose...</option>
      	<option value="adj">Adjective</option>
      	<option value="noun">Noun</option>
      	<option value="verb">Verb</option>
    </select>
  	</div>

  	<!-- WORD DEFINITION INPUT -->
  	<div class="form-group">
    	<label for="exampleFormControlTextarea1">Word Definition</label>
    	<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="definition" placeholder="Add Definition Here"></textarea>
 	</div>

 	<input class="btn btn-primary" type="submit" name="submit" value="Add Word!">
</form>


<?php
include('templates/footer.html');
?>