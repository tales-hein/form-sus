<?
error_reporting(E_ALL);
ini_set("display_errors", "On");

include_once("../../vendor/autoload.php");

headers();

$n = "Formsus"; // namespace
$r = getRequest(); // request
$nc = $n . '\\' . $r->c; // Namespace\\Class

$nc = new $nc();
$nc->{$r->m}();
