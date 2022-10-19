<?php //delete method => DELETE
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'delete')  {

    parse_str(file_get_contents('php://input'), $input); //função do php para ler o input raiz, transformamos em array e jogando em $input
    //isso tem q ser feito porque não tem INPUT_PUT, apenas INPUT_GET e INPUT_POST

    $id = $input['id'] ?? null;

    $id = filter_var($id);

    if($id) {

        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $sql = $pdo->prepare("DELETE FROM notes WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            $array['result'] = [
                'id' => $id 
            ];

        } else {
            $array['error'] = 'Non-existing ID';
        }

    } else {
        $array['error'] = 'ID was not sent';
    }

} else {
    $array['error'] = 'This method is not allowed (DELETE only)';
}

require('../return.php');