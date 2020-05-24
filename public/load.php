<?php

require(__DIR__.'/../function.php');

$exemplePath = __DIR__.'/../data';

$exemple = $_GET['exemple'];
$exemple = preg_replace('`[^a-zA-Z0-9\-_]`', '', $exemple);


header('Content-type: application/json');
