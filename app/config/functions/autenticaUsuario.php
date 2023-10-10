<?php
// Initialize the session
/* session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === TRUE) {
  header("location: ../login/");
  exit;
} */
/* else {
  header("location: ../inicio/");
} */

// Include config file
//require_once "../config/config.php";

// Initialize the session



//session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../../login/");
    exit;
} 
/* 
else {
  echo $_SESSION["loggedin"];
} */