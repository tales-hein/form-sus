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

    $Citizen = new Citizen();
    $cidadao = $Citizen->query("cnsCidadao:" . $data->cnsCidadao);

    if ($cidadao->numFound == 0) {
      $this->response->error("Cidadão não encontrado")->echo();
      exit;
    }

    $cidadao = $cidadao->docs[0];



    $result = $this->commit([
      $doc,
      $cidadao,
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

  function list()
  {
    if (!isset($_GET['cns'])) { // se não mandou CNS, retorna erro
      $this->response->error('Favor enviar código CNS')->echo();
      exit;
    }

    $cns = $_GET['cns'];

    $response = $this->query("cns:$cns");

    $this->response->log($response)->echo();
  }

  function byId()
  {
    if (!isset($_GET['id'])) { // se não mandou ID, retorna erro
      $this->response->error('Favor enviar o ID')->echo();
      exit;
    }

    $id = $_GET['id'];

    $response = $this->query("id:$id");

    $this->response->log($response)->echo();
  }
}
