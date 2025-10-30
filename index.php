<?php

require './vendor/autoload.php';

use App\Config\ErrorLog;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

ErrorLog::activateErrorLog();

session_start();

function base_url()
{
    $BASE_URL =  $_ENV['HOST'];
    return $BASE_URL;
}

$url = isset($_GET['url']) ? $_GET['url'] : "home";
$arrUrl = explode("/", $url);
$controller = $arrUrl[0];
$methop = $arrUrl[0];
$params = "";
if (isset($arrUrl[1])) {
    if ($arrUrl[1] != "") {
        $methop = $arrUrl[1];
    }
}

if (isset($arrUrl[2])) {
    if ($arrUrl[2] != "") {
        for ($i=2; $i < count($arrUrl); $i++) {
            $params .= $arrUrl[$i]. ',';
        }
        $params = trim($params, ',');
    }
}
// controller = "Controller/home.php"
$file_name = 'home';
$vista = "home.php";

$folder_name = '';

switch (sizeof($arrUrl)) {
    case 0:
        $vista = "home.php";
        $file_name = 'home';
        break;
    case 1:
        $vista = "./src/views/" . $controller . ".php";
        $file_name = $controller;
        break;
    case 2:
        $vista = "./src/views/" . $controller."/".$methop.".php";
        $file_name = $methop;
        $folder_name = $controller;
        break;
    /*case 3:
        $vista = "vistas/" . $controller."/".$methop.".php";
        break;*/
   default:
        $vista = "./src/views/Error.php";        
        break;
}

function getView($vista, $file_name='', $folder_name = '')
{   
    if (file_exists($vista)) {
        require_once($vista);
    } else{
        require_once("./src/views/Error.php");
        
    }
}


getView($vista, $file_name, $folder_name);