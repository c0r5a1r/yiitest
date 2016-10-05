<?php
include 'User.php';

$arr  = array('q' => 1, 'w' => 2 );
$user = User::can($arr); 

var_dump($user);