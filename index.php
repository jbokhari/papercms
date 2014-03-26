<?php // loads the Paper CMS
define("CMS_HOME", dirname(__FILE__));
require_once(CMS_HOME . "/papercms/inc/class/paperCMS.class.php");
require_once(CMS_HOME . "/papercms/inc/class/blogPostController.class.php");
require_once(CMS_HOME . "/papercms/inc/class/blogPost.class.php");
require_once(CMS_HOME . "/papercms/inc/functions.php");
$postId = 1; // default to null, we'll know that no var was passed later by checking this
if (isset($_GET['post']))
	$postId = $_GET['post'];
if (isset($_GET['p'])) //take precedence over "post" var 
	$postId = $_GET['p'];

$paper = new paperCMS($postId);
// print_x($paper);
$controller = $paper->blogPostController;
$controller->displayPost();
