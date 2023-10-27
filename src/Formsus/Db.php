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

  function findOne($q)
  {
    return $this->query($q)->docs[0];
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

  function id($values)
  {
    foreach ($values as $o) {
      if (property_exists($o, "id")) {
        return $o->id;
      }
    }
    return time();
  }

  // values => array of objects
  // unset => array of strings
  function commit($values = [], $unset = [])
  {

    $id = $this->id($values);
    $solrId = "formsus/" . $this->module . "/" . $id;
    $doc = new Solr\Document($this->url);
    $doc->id = $id;
    $doc->solrId = $solrId;
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

    $commit = $doc->commit();
    $commit->id = $id;

    return $commit;
  }
}
