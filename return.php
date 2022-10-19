<?php
header("Access-Control-Allow-Origin: *"); //permitir todo mundo a consultar minha API
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); //permitir essas requisições à API
header("Content-Type: application/json"); //dizendo que o retorno sempre vai ser application/json
echo json_encode($array); //função do PHP que transforma array em JSON
exit;


