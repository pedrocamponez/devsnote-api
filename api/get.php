<?php //get method => GET
require('../config.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if($method === 'get')  {

    $id = filter_input(INPUT_GET, 'id');

    if($id) {
        
        $sql = $pdo->prepare("SELECT * FROM notes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if($sql->rowCount() > 0) {

            $data = $sql->fetch(PDO::FETCH_ASSOC);

            $array['result'] = [
                'id' => $data['id'],
                'title' => $data['title'],
                'body' => $data['body']
            ];
            
        } else {
            $array['error'] = 'ID does not exist';
        }

    } else {
        $array['error'] = 'ID was not sent';
    }

} else {
    $array['error'] = 'This method is not allowed (GET only)';
}

require('../return.php');