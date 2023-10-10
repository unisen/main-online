<?php

@session_start();
/*enable this for development purpose */
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
date_default_timezone_set(@date_default_timezone_get());
define('PDOCrudABSPATH', dirname(__FILE__) . '/');
require_once PDOCrudABSPATH . "config/config.php";
spl_autoload_register('pdocrudAutoLoad');

function pdocrudAutoLoad($class) {
    if (file_exists(PDOCrudABSPATH . "classes/" . $class . ".php"))
        require_once PDOCrudABSPATH . "classes/" . $class . ".php";
}

if (isset($_REQUEST["pdocrud_instance"])) {
    $fomplusajax = new PDOCrudAjaxCtrl();
    $fomplusajax->handleRequest();
}

//example of how to add action function
function beforeloginCallback($data, $obj) {  
    $data["users"]["password"] = md5($data["users"]["password"]);
    return $data;
}
 
 
 
function afterLoginCallBack($data, $obj) {
    @session_start();
    if (count($data)) {
        $_SESSION["data"] = $data;
    }
    else{
        //no record found so don't redirect
        $obj->formRedirection("");
    }
}

function getAmount($data, $obj){
    //you can use the print_r($data) to understand how to get the various fields and their values
    $pdomodel = $obj->getPDOModelObj();
    $category_id = $data["post_data"]["value"];
    $pdomodel->where("expense_category_id",$category_id,"=");
    $output =  $pdomodel->select("expense_category");
    echo $output[0]["amount"];
}

