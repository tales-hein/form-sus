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
      $this->response->error("Não foi possível cadastrar o usuário")->echo();
    }
  }
}
