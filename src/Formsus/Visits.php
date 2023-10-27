<?

namespace Formsus;

use Solr;

class Visits extends Db
{

  var $module = "visits";
  var $response;

  function __construct()
  {
    parent::__construct($this->module);
    $this->response = new Response();
  }


  function create()
  {
    $data = data();
    $Validate = new Validate();
    $errors = $Validate->createVisit($data);

    if (count($errors) > 0) {
      $this->response->errors($errors)->echo();
      exit;
    }

    $result = $this->commit([
      $data
    ]);

    if ($result->status == "200") {
      $this->response->add('next', 'createCitizen');
      $this->response->log("Visita criada");
      $this->response->add("id", $result->id)->echo();
    } else {
      $this->response->log($result);
      $this->response->error("Não foi possível cadastrar a visita")->echo();
    }
  }

  function update()
  {
    $data = data();

    $Validate = new Validate();
    $errors = $Validate->updateVisit($data);

    if (count($errors) > 0) {
      $this->response->errors($errors)->echo();
      exit;
    }
    // 1698419977
    $doc = $this->findOne("id:" . $data->id);



    $result = $this->commit([
      $doc,
      $data
    ], ["_version_"]);

    if ($result->status == "200") {
      $this->response->add('next', 'finished');
      $this->response->log("Visita atualizada");
      $this->response->add("id", $result->id)->echo();
    } else {
      $this->response->log($result);
      $this->response->error("Não foi possível atualizar a visita")->echo();
    }
  }
}
