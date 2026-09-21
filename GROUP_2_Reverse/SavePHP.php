<?php

header("Access-Control-Allow-Origin:*");
	header("Access-Control-Allow-Credentials:true");
	header("Access-Control-Max-Age: 100000");
	header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
	header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
// php for saving the data 
// set $debug to true in order to display error messages, you normally don't want this enabled on the server
$debug = true;
if ($debug) {
  error_reporting(E_ALL & ~E_NOTICE);
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
}
// retreive content
/*$post_data = json_decode(file_get_contents('php://input'), true);
// write the file to disk
$name = "data/" . $post_data['filename'] . ".csv";
$data = $post_data['filedata'];
file_put_contents($name, $data);*/

$post_data = json_decode(file_get_contents('php://input'), true);
$data = $post_data['filedata'];
// generate a unique ID for the file, e.g., session-6feu833950202 
$file = uniqid("session-");
// the directory "data" must be writable by the server
$name = "data/{$file}.csv"; 
// write the file to disk
file_put_contents($name, $data);