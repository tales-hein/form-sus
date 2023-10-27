<?

namespace Formsus;

class Validate
{

  var $response;

  function __construct()
  {
  }

  function empty($data, $props)
  {
    $errors = [];
    foreach ($props as $v) {
      if (!isset($data->$v) || empty($data->$v)) {
        if (isset($data->$v) && ($data->$v === false)) {
          continue;
        }
        $errors[] = $v . " não pode ser vazio";
      }
    }

    return $errors;
  }

  function value($data, $prop, $values)
  {
    if (!in_array($data->$prop, $values)) {
      return $prop . " inválido. Valores aceitos: "
        . implode(", ", $values);
    }
  }

  function bool($prop)
  {
    return !is_bool($prop) ? $prop . " deve ser booleano" : null;
  }

  function float($prop)
  {
    return !is_float($prop) ? $prop . " deve ser float" : null;
  }

  function date($prop)
  {
    $d = substr($prop, 0, 2);
    $m = substr($prop, 3, 2);
    $y = substr($prop, 6, 4);

    return !checkdate($m, $d, $y) ? $prop . " deve ser data válida" : null;
  }

  function createVisit($data)
  {
    $errors = [];

    $errors = array_merge(
      $errors,
      $this->empty(
        $data,
        [
          "cns",
          "turno",
          "microarea",
          "imovel",
          "prontuario",
          "compartilhada"
        ]
      )
    );

    if (count($errors) > 0) {
      return $errors;
    }

    $errors[] = $this->value($data, "turno", [
      "M",
      "T",
      "N"
    ]);

    $values = ["FA"];
    for ($i = 0; $i < 100; $i++) {
      $values[] = (strlen($i) == 1) ? "0" . $i : $i;
    }
    $errors[] = $this->value($data, "microarea", $values);

    $values = ["99"];
    for ($i = 0; $i < 13; $i++) {
      $values[] = (strlen($i) == 1) ? "0" . $i : $i;
    }
    $errors[] = $this->value($data, "imovel", $values);

    return array_filter($errors);
  }

  function createCitizen($data)
  {
    $errors = [];

    $errors = array_merge(
      $errors,
      $this->empty(
        $data,
        [
          "cns",
          "cnsCidadao",
          "nomeCompleto",
          "nascimento",
          "sexo",
          "peso",
          "altura"
        ]
      )
    );

    if (count($errors) > 0) {
      return $errors;
    }

    $errors[] = $this->value($data, "sexo", [
      "M",
      "F"
    ]);

    $errors[] = $this->date($data->nascimento);
    $errors[] = $this->float($data->peso);
    $errors[] = $this->float($data->altura);

    return array_filter($errors);
  }
}
