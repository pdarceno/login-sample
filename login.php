<?php
	/*check kung in session.*/
	session_start(); 

	include("connection.php"); 
	include("functions.php");

	//line 9 to 13 dito ay same lang sa line 15 to 24 ng signup.php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password)) {

			/*yung 'select * from users where user_name = '$username' and password = '$password' bale select ALL from users where user_name = '$username' and password = '$password limit to 1.*/
			$query = "select * from users where user_name = '$username' and password = '$password' limit 1";
			$result = mysqli_query($connection, $query);

			/*this means if result exists and the number of rows returned ay greater than 0*/
			if($result && mysqli_num_rows($result) > 0) {
				/*fetch the result which from the sql query on line 16 would return ALL data galing sa user that would satisfy user_name = '$username' and password = '$password' limit 1 */
				$user_data = mysqli_fetch_assoc($result);

				/*the $user_data is an object na parang ganto
					{
						"id":"2",
						"user_id":"92599310326.",
						"user_name":"joel",
						"password":"password",
						"date":"2020-12-16 22:47:56"
					}
					this is a javascript object notation (JSON). so yung $user_data, kukunin yung value ng key user_id which is kung gagamitin mo sa sample for line 26 to 30 ay 92599310326.
				*/

				//after nun ilalagay niya yung user_id na yun sa user_id ng session. which is kailangan para makita kung stayed signed in siya.
				$_SESSION['user_id'] = $user_data['user_id']; 

				//punta sa index.php
				header('Location: index.php');
				//terminate the page. again sa tingin ko lang redundant kapag nilagyan pa neto
				die;
			}
			else {
				/*displays an alert na mali yung info. yung else kasi na 'to kapantay niya yung
				if result exists and the number of rows returned ay greater than 0. so either man sa if result exist or sa if result ay greater than 0 ang mag false, mapupunta siya sa else na 'to.

				parang:
					

				 if (a > 2 && a < 4){
					a is between 2 and 4, so si a ay 3
				 }else {
					a is not between 2 and 4, so si a ay hindi 3
				 }
				*/
				echo '<script>alert("wrong info")</script>';
			}
		}
		else {
			//same logic.
			echo '<script>alert("info invalid")</script>';
		}
	}
?>

<!-- same lang 'to halos sa signup.php line 47 to 67 -->
<!DOCTYPE html>
<html>
	<head>
		<title>Login page</title>
	</head>
	<body>
		<h1>This is the login page.</h1>

		<form method="post">
			<input type="text" name="username"/>
			<input type="password" name="password"/>

			<input type="submit" value="Login"/>
		</form>
		<a href="signup.php">Sign Up</a>
	</body>
</html>
