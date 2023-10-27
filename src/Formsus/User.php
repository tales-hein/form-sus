<?

namespace Formsus;

use Solr;

class User extends Db
{

  var $module = "user";
  var $response;

  function __construct()
  {
    parent::__construct($this->module);
    $this->response = new Response();
  }

  function cns()
  {
    // se tem usuário, vai pra tela de pedir senha
    // se não tem, checa se o CNS corresponde a um ACS ou ACE
    // se sim, vai pra tela de signup
    // se não, retorna erro.

    if (!isset($_GET['cns'])) { // se não mandou CNS, retorna erro
      $this->response->error('Favor enviar código CNS')->echo();
      exit;
    }

    $cns = $_GET['cns'];

    $response = $this->query("cns:$cns");

    // não tem usuário com esse cns
    if ($response->numFound == 0) {
      // consulta na API do CNES
      $cnes = $this->cnes($cns);

      $this->response->add('next', 'signup');
      $this->response->add('response', $cnes);

      $this->response->echo();
      exit;
    }

    $this->response->add('response', $response->docs[0])->echo();
    exit;
  }

  // verifica na API do CNES se o usuário é ACS ou ACE
  function cnes($cns)
  {

    $response = json_decode(file_get_contents("https://evisitas.api.previa.app/?q=profissional_cns:" . $cns));

    if ($response->numFound == 0) { // não é um ACS ou ACE
      $this->response->error('CNS não corresponde a um agente comunitário de saúde válido')->echo();
      exit;
    }

    return $response->docs[0];
  }

  // verifica na nossa base se usuário já fez signup
  function getUser($cns)
  {
    return $this->query("cns:$cns", ["rows" => 1]);
  }

  function signup()
  {
    $data = data();

    // valida se todos os campos vieram
    if (
      !isset($data->cns)
      || empty($data->cns)
      || empty($data->password)
      || empty($data->repeatPassword)
    ) {
      $this->response->error('Enviar todos os campos')->echo();
      exit;
    }

    // valida se senhas digitadas são iguais
    if ($data->password != $data->repeatPassword) {
      $this->response->error('Senhas devem ser iguais')->echo();
      exit;
    }

    // checa se o usuário já existe.
    $response = $this->query("cns:" . $data->cns);
    if ($response->numFound > 0) {
      $this->response->error('Usuário já cadastrado')->echo();
      exit;
    }

    // obtém os dados do usuário no cnes
    $cnes = $this->cnes($data->cns);

    // salva os dados.
    $result = $this->commit([
      $cnes,
      $data
    ], ["repeatPassword"]);

    if ($result->status == "200") {
      $this->response->add('next', 'signin');
      $this->response->log("Usuário cadastrado com sucesso")->echo();
    } else {
      $this->response->error("Não foi possível cadastrar o usuário")->echo();
    }
  }


  function signin()
  {

    $data = data();

    $response = $this->query(
      "cns:" . $data->cns . " AND password:" . $data->password,
      ["rows" => 1]
    );

    if ($response->numFound > 0) {
      $this->response->add('next', 'list');
      $this->response->log("Sucesso")->echo();
    } else {
      $this->response->error("Combinação usuário/senha inválida")->echo();
    }
  }
}
