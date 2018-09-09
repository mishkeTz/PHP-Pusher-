<?php  

require_once '../vendor/autoload.php';

$db = new PDO("mysql:host=localhost;dbname=chat", "root", "");

$pusher = new Pusher(
	'2ee52b8cac2c85819859',
    '0a258f72e653362b2907',
    '325596'
);