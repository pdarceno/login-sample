<?php
	session_start();


	//check niya kung naka-set
	if(isset($_SESSION['user_id'])) {
		//then unset
		unset($_SESSION['user_id']);
	}
	Header("Location: login.php");
	die;
