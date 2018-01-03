<?php

$page_title = 'Home';

include('templates/header.html');

?>

<div class="jumbotron">
  	<h1 class="display-4">Dictionary Web Application</h1>
  	<p class="lead">This is a fun project I decided to create to aid in my desire to build my vocabulary.  As a result of reading books, I create vocab lists that become too extensive for pen and paper.  Here is my solution.  </p>
  	<hr class="my-4">
  	<p>Add basic functionality of web app</p>
  	<p>Any words searched that are not stored in the database will be redirected to <a href="http://www.dictionary.com/">dictionary.com</a> with your search</p>
  	<p class="lead">
    	<a class="btn btn-primary btn-lg" href="add_word.php" role="button">Get Started!</a>
  	</p>
</div>

<?php

include('templates/footer.html');
