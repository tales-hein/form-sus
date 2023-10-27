<?
include_once("../vendor/autoload.php");

// load configs de algum lugar
header("Access-Control-Allow-Origin: *"); // checar origins no config, e if in_array, permitir e segue o jogo
header("Access-Control-Allow-Methods: PUT, GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Content-Type: application/json;');

if (strtolower($_SERVER['REQUEST_METHOD']) == "options") {
  // preflight
  exit;
}

echo "index";
