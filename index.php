<?php // loads the Paper CMS
require_once("papercms_header.php");
$user = new user(0);
print_x($user);
$postId = 1; // default to null, we'll know that no var was passed later by checking this
if (isset($_GET['post']))
	$postId = $_GET['post'];
if (isset($_GET['p'])) //take precedence over "post" var 
	$postId = $_GET['p'];

$paper = new paperCMS($postId);
print_x($paper);
$controller = $paper->blogPostController;
$controller->displayPost();
