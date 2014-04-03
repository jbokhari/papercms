<?php
if (!defined("CMS_HOME"))
	die("Do not access this file directly");
function print_x($var, $decode = false){

    $return = print_r($var, true);

    if ($decode === true)

        $return = htmlspecialchars($return);

    $return = "<pre>{$return}</pre>";

    echo $return;

}
function generate_salt_key(){
	static $values = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9","0","!","@","#","$","%","^","&","*","(",")","-","=","_","+","[","]","{","}",";",":",",",".","<",">","/","?","|","`","~"	
	];
	$count = count($values);
	$count--;
	$rand = mt_rand(0, $count);
	return $values[$rand];
}
function generate_salt_string($length = 50){
	$return = '';
	for ($i=0; $i < $length; $i++) { 
		$return .= generate_salt_key();
	}
	return $return;
}

function is_logged_in(){
	if (isset($_SESSION["logged_in"]) && isset($_SESSION["logged_in"]) == true )
		return true;
	else
		return false;
}
function generate_nonce(){
	if (is_logged_in()){

	}
}
function log_out(){
	session_destroy();
}