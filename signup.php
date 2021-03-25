<?php
	//comment lang din after nung dalawang forward slash

	//include lang din yung dalawang files tulad sa index.php lines 10 and 11
	include("connection.php"); 
	include("functions.php");

	/*
	this is a logic operator. so ganto lang siya:

	if yung server request method ay post kukunin lang yung username and password then ilalagay
	sa variable na $username and $password respectively. yung mga may $ pala sa simula ay variable. ibig sabihin
	pwede baguhin anytime. in this case, galing lang siya sa user lagi.
	*/
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];

		/*
		then after i-assign check kung not empty yung username and password na mga variables ($username and $password). 
		ang meaning ng ! before any statement or logic operation is not equal. so yung line 24 na if(!empty($username) && !empty($password))
		ay if not empty si $username and not empty si password. you might have also noticed yung &&. yan yung and ng programming.
		*/
		if(!empty($username) && !empty($password)) {

			/*random_num ay function galing sa functions.php yung structure ng mga function ay function_name(parameters) sa case sa baba ay random_num yung name nung function then 20 ay yung parameter. kung i-che-check mo siya sa functions.php function random_num($length) yung declaration sa kanya. ibig sabihin yung parameter niya ay $length. yun yung gagamitin sa loob ng random_num*/
			$user_id = random_num(20);

			/*yung 'insert into users (user_id,user_name,password) values ('$user_id','$username','$password')' is a simple structured query language (sql). bale insert into yung users table lahat ng values.*/
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$username','$password')";

			/*this is necessary to connect sa database. hindi need na kabisado 'to. as is the case sa programming most of the time, this is only one of the many varied solutions sa pag-connect sa db*/
			mysqli_query($connection, $query);

			//head to the resource location login.php
			header('Location: login.php');
			//terminate yung page. hindi naman ginagamit yung die masyado'
			die;
		}
		else {
			//a script that tells you to make an alert.
			echo '<script>alert("info invalid")</script>';
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Signup page</title>
	</head>
	<body>
		<h1>This is the signup page.</h1>
		<!-- a form tag. ibig sabihin mga nasa loob neto ay unified sa isang form. -->
		<form method="post">
			<!-- input fields sa loob ng form. -->
			<input type="text" name="username"/>
			<input type="password" name="password"/>

			<!-- submit button. and since type submit siya, hahanapin nito yung parent, which is yung form. then lahat ng input sa loob ng form ay magiging kasama sa kung anumang method yung specified. this case ay post. -->
			<input type="submit" value="Signup"/>
		</form>

		<!-- another a tag. this time pupuntahan yung login page kapag na-click -->
		<a href="login.php">Login</a>
	</body>
</html>
