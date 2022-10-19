<?php //update method => PUT
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'put')  {

    parse_str(file_get_contents('php://input'), $input); //função do php para ler o input raiz, transformamos em array e jogando em $input
    //isso tem q ser feito porque não tem INPUT_PUT, apenas INPUT_GET e INPUT_POST

    $id = $input['id'] ?? null;
    $title = $input['title'] ?? null;
    $body = $input['body'] ?? null;

    $id = filter_var($id);
    $title = filter_var($title);
    $body = filter_var($body);

    if($id && $title && $body) {

        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $sql = $pdo->prepare("UPDATE notes SET title = :title, body = :body WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->bindValue(':title', $title);
            $sql->bindValue(':body', $body);
            $sql->execute();

            $array['result'] = [
                'id' => $id,
                'title' => $title,
                'body' => $body
            ];

        } else {
            $array['error'] = 'Non-existing ID';
        }

    } else {
        $array['error'] = 'Data was not sent';
    }

} else {
    $array['error'] = 'This method is not allowed (PUT only)';
}

require('../return.php');