<?php

header('Content-Type: application/json; charset=UTF-8');


$json = file_get_contents('tipo_cargas.json');
$data = json_decode($json);

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $result = ['cod' => $id, "descricao" =>  $data->$id];
} else {
  $new_data = [];
  foreach ($data as $key => $value) {
    $new_data[] = ['cod' => $key, "descricao" =>  $value];
  }

  $result = $new_data;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);