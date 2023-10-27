<?

function headers()
{
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: PUT, GET, POST, OPTIONS");
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  header('Content-Type: application/json;');

  if (strtolower($_SERVER['REQUEST_METHOD']) == "options") {
    // preflight
    exit;
  }
}

function RequestURI()
{
  $RequestURI = $_SERVER['REQUEST_URI'];
  $RequestURI = preg_replace('/^\//', "", $RequestURI);
  $RequestURI = preg_replace('/\/$/', "", $RequestURI);
  $split = explode("?", $RequestURI);
  $RequestURI = $split[0];

  return $RequestURI;
}


function getRequest()
{
  $request = RequestURI();

  preg_match(
    '/(?:\/?api)?\/?(\w+)\/(\w+)\/(\w+)\/?(\w+)?\/?(\w+)?\/?(\d+)?/',
    $request,
    $matches
  );

  if (empty($matches) || count($matches) < 3) {
    die("service unknown");
  }

  return (object)[
    "c" => $matches[2], // classe
    "m" => $matches[3] // método
  ];
}

function contentType($ct)
{
  if (strpos($ct, "multipart/form-data") !== false) {
    $ct = "multipart/form-data";
  }
  return $ct;
}

function debugg($var)
{
  print_r($var);
}


function data()
{
  $http = (object)[];
  $request = (object)[];
  foreach (getallheaders() as $k => $v) {
    $key = str_replace('-', '', strtolower($k));
    $http->$key = $v;
  }

  if (isset($http->contenttype)) {
    $request->contenttype = contentType($http->contenttype);
  }


  if (isset($request->contenttype)) {
    if ($request->contenttype == "application/json") {

      $request = json_decode(file_get_contents("php://input"));
      if (empty($request)) {
        $request = (object)[
          "data" => (object)[]
        ];
      }

      return $request->data;
    } else {
      if (isset($_POST['data'])) {
        $request = json_decode($_POST['data']);
        return $request;
      } else {
        return false;
      }
    }
  }
}


function solrDate($prop)
{
  $d = substr($prop, 0, 2);
  $m = substr($prop, 3, 2);
  $y = substr($prop, 6, 4);

  return "$y-$m-$d" . "T00:00:00Z";
}
