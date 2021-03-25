<?php
//eto yung juicy part. haha.

//eto 'yung pinakita ko sa'yo kanina lang
$dbhost = "localhost";	
$dbuser = "root";	
$dbpassword = "";	
$dbname = "login_sample_db";	

/*
attempt to connect sa database. again yung mysqli_connect ay not necessary na alamin. madali 'tong i-search.
a good programmer much like a good student knows what he doesn't know para alam niya rin kung ano hahanapin. 
mantra ko na 'to hahaha
*/
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

//if the attempt to connect failed. you die.
if(!$connection) {
	die("failed to connect");
}

/*also wala nang ?> kasi full php file na 'to. no need to close. but take note, php lang may feature na ganto as far as i'm concerned. don't attempt to do this nonsense na wala nang closing tag sa ibang programming languages. */