<?php //getall method => GET
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get')  {

    $sql = $pdo->query("SELECT * FROM notes"); //faço a requisição
    if($sql->rowCount() > 0) { //verifica se tem resultado
        $data = $sql->fetchAll(PDO::FETCH_ASSOC); //deu resultado

        foreach($data as $item) { //faço um foreach pra exibir cada item do resultado na tela
            $array['result'][] = [
                'id' => $item['id'],
                'title' => $item['title']
            ];
        }
    }

} else {
    $array['error'] = 'This method is not allowed (GET only)';
}

require('../return.php');