<?php

/*
ganto yung syntax ng function sa php
function function_name(parameters) {
	function logic
}
*/

//again, 'di mo na kailangan alamin 'to by heart
function check_login($connection) {
	//if set ang session user id
	if(isset($_SESSION['user_id'])) {

		//assign session id sa variable na $id.
		$id = $_SESSION['user_id'];
		//select ALL from users where user_id ay yung current session id. kasi nga di'ba nag-assign. 
		$query = "select * from users where user_id = '$id' limit 1";

		//you can figure out lines 21 to 25 naman na, i think. similar lang siya sa line 17 to 42 sa login.php, onting variation lang nang very slight
		$result = mysqli_query($connection, $query);
		if($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}		
	}
	else {
		//else redirect to login page
		header('Location: login.php');
		die;
	}
}

//anotha' function
function random_num($length) {
	//declares a variable $text with empty string as value
	$text = "";

	//if yung $length ay less than 5. once lang naman ginamit yung function na 'to. line 27 sa signup.php. tapos 20 naman nakalagay si laging false 'to.
	if($length < 5) {
		$length = 5;
	}

	/*
	declares a variable that randomizes $len from 4 to $length, which is 20.
	so ang possible value ng $len na 'to ay 4-20. 
	*/
	$len = rand(4, $length);

	/*
	for loop. so ganto siya:
	nag declare ng variable $i na value ay 0. yun yung $i = 0.
	then if $i is less than $len. yun yung $i < $len.
		increase value ng $i. yun yung $i++
			if ongoing pa yung for loop, gagawin niya yung nasa loob. 
			yung $text .= rand(0,9) ibig sabihin lang concatenate. or pagdudugtungin lang yung current value ng $text sa value na lalabas sa randomizer with range 0 to 9.

	eto sample: 

	$len mo ay 11.

	11 times niya gagawin yung nasa $text .= rand(0,9)
	so kung random parang ganto kakalabasan niya 92599310326
	*/
	for($i = 0; $i < $len; $i++) {
		$text .= rand(0,9);
	}

	//tapos return value $text
	return $text;
}