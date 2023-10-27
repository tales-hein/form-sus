<?

namespace Formsus;

use Solr;

class Db
{

  var $module;
  var $response;
  var $url = "http://formsus.solr:8983/solr/formsus";

  function __construct($module)
  {
    $this->module = $module;
    $this->response = new Response();
  }

  function query($q, $props = [])
  {
    $q = "(module:" . $this->module . ") AND (" . $q . ")";
    $Solr = new Solr\Query($this->url);
    $Solr->q = $q;

    foreach ($props as $k => $v) {
      $Solr->$k = $v;
    }

    return $Solr->query()->response;
  }

  // values => array of objects
  // unset => array of strings
  function commit($values = [], $unset = [])
  {
    $doc = new Solr\Document($this->url);
    $doc->solrId = "formsus/" . $this->module . "/" . time();
    $doc->module = $this->module;

    foreach ($values as $o) {
      foreach ($o as $k => $v) {
        $k = str_replace("profissional_", "", $k);
        $doc->$k = $v;
      }
    }

    foreach ($unset as $item) {
      unset($doc->$item);
    }

    return $doc->commit();
  }
}
