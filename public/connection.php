<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "simple_visa_tracker";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect");
}