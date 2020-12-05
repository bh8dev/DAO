<?php

require_once 'models/IUsuarioDao.php';
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements IUsuarioDao
{
    private $pdo;
    private string $table = 'usuarios';

    public function __construct (PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function add (Usuario $user):\Usuario
    {
        $query = "INSERT INTO {$this->table} (nome, email) VALUES (:nome, :email)";

        $sql   = $this->pdo->prepare($query);
        $sql->bindValue(':nome', $user->getNome(), PDO::PARAM_STR);
        $sql->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $sql->execute();

        $user->setId($this->pdo->lastInsertId());

        return $user;
    }
    public function findAll():array
    {
        $array = [];

        $query = "SELECT * FROM {$this->table}";

        $sql   = $this->pdo->query($query);
        if ($sql->rowCount() > 0)
        {
            $returnedData = $sql->fetchAll();

            foreach ($returnedData as $item)
            {
                //create the object and populate the data
                $user = new Usuario();
                $user->setId($item->id);
                $user->setNome($item->nome);
                $user->setEmail($item->email);

                //return the created object
                $array[] = $user;
            }
        }
        return $array;
    }
    public function findById(int $id)
    {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";

        $sql   = $this->pdo->prepare($query);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        if ($sql->rowCount() > 0)
        {
            $returnedData = $sql->fetch();

            $user = new Usuario();
            $user->setId($returnedData->id);
            $user->setNome($returnedData->nome);
            $user->setEmail($returnedData->email);

            return $user;
        }
        else
        {
            return false;
        }
    }
    public function findByEmail(string $email)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email";

        $sql   = $this->pdo->prepare($query);
        $sql->bindValue(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if ($sql-> rowCount() > 0)
        {
            $returnedData = $sql->fetch();

            $user = new Usuario();
            $user->setId($returnedData->id);
            $user->setNome($returnedData->nome);
            $user->setEmail($returnedData->email);

            return $user;
        }
        else
        {
            return false;
        }
    }
    public function update(Usuario $user)
    {
        $query = "UPDATE {$this->table} SET nome = :nome, email = :email WHERE id = :id";

        $sql   = $this->pdo->prepare($query);
        $sql->bindValue(':nome', $user->getNome(), PDO::PARAM_STR);
        $sql->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $sql->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $sql->execute();

        return true;
    }
    public function delete (int $id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";

        $sql   = $this->pdo->prepare($query);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();
    }
}