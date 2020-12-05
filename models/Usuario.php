<?php

class Usuario
{
    private int $id;
    private string $nome;
    private string $email;

    public function __construct()
    {
        
    }

    //gtters & setters

    public function getId ():int
    {
        return $this->id;
    }
    public function setId ($id)
    {
        $this->id = trim($id);
    }
    
    public function getNome ():string
    {
        return $this->nome;
    }
    public function setNome (string $nome)
    {
        $this->nome = ucwords(trim($nome));
    }

    public function getEmail ():string
    {
        return $this->email;
    }
    public function setEmail (string $email)
    {
        $this->email = strtolower(trim($email));
    }
}