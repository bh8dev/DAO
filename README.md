# Conceito geral de DAO

> Você tem que ter uma classe específica para o item que você esteja manipulando, ex: Usuario e uma outra classe específica para manipular e fazer a intermediação entre o banco de dados e a classe específica (Usuario), ex: UsuarioDAO.

abaixo um simples exemplo com um usuário:

## Classe para cuidar apenas do usuario com propriedades e métodos

### Propriedades

- id
- nome
- email

### Métodos

- getId
- setId
- getNome
- setNome
- getEmail
- setEmail

> Na prática, teriamos uma classe para cuidar do próprio Usuário e uma outra sendo UsuarioDAO, onde conterá o CRUD

## Classe UsuarioDAO

> Contendo todas as operações (CRUD) nessa classe com o auxílio da classe Usuario

### Os passos corretos seriam

- Criar o objeto da classe Usuario
- Setar os parâmetros e construir o usuário (objeto)

exemplo:

```php
$usuario = new Usuario()
$usuario->setNome('Fulano');
$usuario->setEmail('fulano@github.com');
```

e então passar este objeto, construído, para nossa classe UsuarioDAO, e a mesma realizar a inserção no banco de dados

```php
$usuarioDAO->add($usuario);
```
