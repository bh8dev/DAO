<?php

require 'database/config.php';
require 'data-access-object/UsuarioDaoMysql.php';

$daoUser  = new UsuarioDaoMysql($pdo);

$id       = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $username && $email)
{
    //$user = $daoUser->findById($id);
    //ou
    $user = new Usuario();
    $user->setId($id);
    $user->setNome($username);
    $user->setEmail($email);

    $daoUser->update($user);

    header('Location: index.php');
    exit;
}
else
{
    header("Location: editar.php?id={$id}");
    exit;
}