<?php
	/*anything inside forward slash tapos asterisk then asterisk forward slash is a comment in php*/

	/*this is used to access session. which is what the user id is for. check mo yung login.php and functions.php
	doon nag-seset ng session.*/
	session_start();

	/*includes connection and functions 
	file para magamit lahat ng nasa loob nila papunta dito*/ 
	include("connection.php"); 
	include("functions.php");

	/*check_login is from the functions page.
	functions.php was imported to this papge via include, that's why
	the function check_login can be used.*/ 

	/*ang ginagawa ng check_login ay i-checheck niya kung may naka-login lang. then makikita na yung page na 'to. else redirect to login page.*/
	$user_data = check_login($connection); 
?>


<!-- anything inside less than sign exclamation point dash dash ganun ganun is a comment in html -->

<!-- DOCTYPE html, meaning lang neto html ang mga next few lines. kinda like <?php  ?> pero html -->
<!DOCTYPE html>
<html>

	<!-- the head of the html, mostly laman neto ay title and some scripts -->
	<head>
		<title>Login success</title>
	</head>

	<!-- the body of the html, mostly laman neto ay yung content na sa mga web pages -->
	<body>

		<!-- line 38 ay a tag. creates a clickable link lang. href ay kung saan i-reredirect ang user na nag-click, in the case directly below,
			sa logout.php na file-->
		<a href="logout.php">logout</a>
		<!--header tag. na-explain ko na sa'yo 'to pero eto lang yung mga title ng mga articles sa web pages-->
		<h1>This is the landing page if ever you succeeded in logging in.</h1>

		<!--the "article". in this case lang, it greets the user. 
			para gumana siya, nag-insert ng php tags tapos sa loob n'on, dapat php syntax na. notice yung echo and yung $. 
			wala siya sa html, pero gumana kasi na-wrap muna sa php tags. -->
		Hello <?php echo $user_data['user_name']; ?>!

		PS: This can not be accessed unless logged in.
	<!-- end ng body tag. -->
	</body>

<!-- end ng html tag. -->
</html>
