<?php
require('../config.php');
//toda api vai retornar um JSON, vazio, com erro, qlqr coisa, mas JSON.
//por isso, sempre criamos um array pra retornar ele

$array['result'] = [
    'pong' => true
];

require('../return.php');