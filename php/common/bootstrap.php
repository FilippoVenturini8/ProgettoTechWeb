<?php
session_start();
//define("UPLOAD_DIR", "./upload/");
//require_once("utils/functions.php");
require_once("../../db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "lpshop", 3307);
//$dbh = new DatabaseHelper("localhost", "root", "", "blogtw");
?>