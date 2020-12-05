<?php

require 'database/config.php';
require 'data-access-object/UsuarioDaoMysql.php';

$daoUser = new UsuarioDaoMysql($pdo);

$user    = false;
$id      = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($id)
{
    $user = $daoUser->findById($id);
}
if (!$user)
{
    header('Location: index.php');
    exit;
}

?>
<h1 style="color: indigo;">Editar usuário</h1>
<form action="editar-action.php" method="POST">
    <input type="hidden" name="id" value="<?= $user->getId(); ?>">

    <label for="nome">Nome</label>
    <input type="text" name="username" id="nome" value="<?= $user->getNome(); ?>" autofocus required>

    <br><br>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" value="<?= $user->getEmail(); ?>" required>

    <br><br>

    <button type="submit" style="border-radius: 3px;  border-color: darkblue; background-color: darkslateblue; color: deepskyblue;">Atualizar informações</button>
</form>