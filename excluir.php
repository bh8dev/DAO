<?php

require 'database/config.php';
require 'data-access-object/UsuarioDaoMysql.php';

$daoUser = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id)
{
    $daoUser->delete($id);
}

header('Location: index.php');
exit;