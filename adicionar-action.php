<?php

require 'database/config.php';
require 'data-access-object/UsuarioDaoMysql.php';

$daoUser = new UsuarioDaoMysql($pdo);

$username  = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$email     = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($username && $email)
{

    if (!$daoUser->findByEmail($email))
    {
        // constructs the user object and sets the parameters
        $newUser = new Usuario();
        $newUser->setNome($username);
        $newUser->setEmail($email);
        //then sends it to the DaoUser to add a new User
        $daoUser->add($newUser);

        header('Location: index.php');
        exit;
    }
    else
    {
        header('Location: adicionar.php');
        exit;
    }
}
else
{
    header('Location: adicionar.php');
    exit;
}