<?

namespace Formsus;

use Solr;

class Citizen extends Db
{

  var $module = "citizen";
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
    $errors = $Validate->createCitizen($data);

    if (count($errors) > 0) {
      $this->response->errors($errors)->echo();
      exit;
    }

    $data->nascimento = solrDate($data->nascimento);

    $result = $this->commit([
      $data
    ]);

    if ($result->status == "200") {
      $this->response->add('next', 'step1');
      $this->response->log("Cidadão criado");
      $this->response->add("id", $result->id)->echo();
    } else {
      $this->response->log($result);
      $this->response->error("Não foi possível cadastrar o cidadão")->echo();
    }
  }
}
