<?php
// Start the session
session_start();


$text1 = $_POST['text1'];
//$text2 = $_POST['text2'];
//$som = $text1 + $text2;
$_SESSION["favcolor"] = $text1;
//echo '<h2>' . $text1  . '</h2>';
