<?php 

function verify_minimum_words($database) {
	$query = "SELECT COUNT(word) AS total_records FROM definitions";

	$result = mysqli_query($database, $query);

	$count = mysqli_fetch_array($result);

	return $count['total_records'];
}


function array_push_assoc($array, $key, $value) {
	$array[$key] = $value;

	return $array;
}

function endKey($array){
end($array);

return key($array);
}

