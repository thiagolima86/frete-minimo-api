<?php

header('Content-Type: application/json; charset=UTF-8');


$json = file_get_contents('tabelas.json');
$tabelas = json_decode($json);
$json = file_get_contents('tipo_cargas.json');
$tipo_cargas = json_decode($json);
$json = file_get_contents('frete_minimo.min.json');
$data = json_decode($json);

$result = [];

if (isset($_GET["tabela"])) {
  $tabela = strtoupper($_GET["tabela"]);
  $data = [$tabela => $data->$tabela];
}
foreach ($data as $tabela => $tabela_valor) {
  if (isset($_GET["tipo_carga"])) {
    $tipo = $_GET["tipo_carga"];
    $tabela_valor = [$tipo => $tabela_valor->$tipo];
  }
  foreach ($tabela_valor as $tipo => $tipo_valor) {
    if (isset($_GET["eixo"])) {
      $tipo = $_GET["eixo"];
      $tipo_valor = [$tipo => $tipo_valor->$tipo];
    }
    foreach ($tipo_valor as $eixo => $eixo_valor) {
      $result[] = ["CCD" => $eixo_valor->CCD, "CC" => $eixo_valor->CC, "eixos" => $eixo, "tipo_carga"=> ["cod" => $tipo, "descricao" => $tipo_cargas->$tipo], "tabela" => ["nome"=> $tabela, "descricao"=> $tabelas->$tabela]];
    }
  }
}

// echo $tabelas->$tabela;
// exit;
if (count($result) < 2) {
  $result = $result[0];
}
if (isset($_GET["dist"])) {
  $dist = $_GET["dist"];
  $frete = $result["CCD"] * $dist + $result["CC"];
  $result = ["frete_minimo" => $frete];
}
echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_NUMERIC_CHECK);