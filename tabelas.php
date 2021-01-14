<?php

header('Content-Type: application/json; charset=UTF-8');


$json = file_get_contents('tabelas.json');
$id = strtoupper($_GET["id"]);
$data = json_decode($json);

if (isset($_GET["id"])) {
  $result = ['tabela' => $id, "descricao" =>  $data->$id];
} else {
  $new_data = [];
  foreach ($data as $key => $value) {
    $new_data[] = ['tabela' => $key, "descricao" =>  $value];
  }

  $result = $new_data;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);