<?php

require 'database/config.php';
require 'data-access-object/UsuarioDaoMysql.php';

$daoUser = new UsuarioDaoMysql($pdo);
$users   = [];
$users   = $daoUser->findAll();

//var_dump($users);
//exit;

?>

<a href="adicionar.php">Adicionar usuário</a>

<table style="width: 100%; text-align: center;" border="1">
	<tr>
		<th>ID</th>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Ações</th>
  	</tr>
  	<tr>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?= $user->getId(); ?></td>
			<td><?= $user->getNome(); ?></td>
			<td><?= $user->getEmail(); ?></td>
			<td>
				<a href="editar.php?id=<?= $user->getId(); ?>">[ Editar ]</a>
				<a href="excluir.php?id=<?= $user->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir?');">[ Excluir ]</a>
			</td>
		</tr>
	<?php endforeach; ?>
  	</tr>
</table>