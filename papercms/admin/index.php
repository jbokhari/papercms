<?php
session_start();
require_once("./../../papercms_header.php");
$paper = new papercms();
// require_once(CMS_HOME . "/papercms/inc/class/user.class.php");
$user = new user();
	// print_x($user);
// print_x($_POST);
extract($_POST);
if (isset($submit) && $submit === "login"){
	if ($user->check_password($password, $name)){
		$_SESSION["logged_in"] = true;
		
	}
	else {
		$_SESSION["logged_in"] = true;
	}

}
if (isset($_GET["logout"]) && $_GET["logout"] === "true"){
	unset($_SESSION);
	// destroy_session();

}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paper CMS Login</title>
</head>
<body>
	<?php if (!is_logged_in() ) : ?>
	<h1>Login</h1>
	<form action="http://localhost/papercms/papercms/admin/" class="form" id="form" method="post">
		<label for="username">Username or Email</label>
		<input name="name" type="text">
		<label for="password">Password</label>
		<input name="password" type="password">
		<input type="submit" value="login" name="submit" class="submit">
	</form>
<?php else : ?>
	<h1>Welcome to the control panel</h1>
	<p>Now I will take your life</p>
	<a href="?logout=true">Log Out</a>
	<?php endif; ?>
	<pre>
	<?php
		//$apple = md5("apple");
		echo htmlentities( generate_salt_string() ); ?>
	</pre>
</body>
</html>
