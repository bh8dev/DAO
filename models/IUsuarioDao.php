<?php

interface IUsuarioDao
{
    public function add (Usuario $user);
    public function findAll ();
    public function findById (int $id);
    public function findByEmail (string $email);
    public function update (Usuario $user);
    public function delete (int $id);
}