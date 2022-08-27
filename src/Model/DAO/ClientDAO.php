<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class ClientDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("INSERT INTO client VALUES(null, ?, ?, ?, ?, ?);");
        $stmt->bindParam(1, $object->user);
        $stmt->bindParam(2, $object->password);
        $stmt->bindParam(3, $object->cpf);
        $stmt->bindParam(4, $object->name);
        $stmt->bindParam(5, $object->phone);
        return $stmt->execute();
    }
    public function findUser($user)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM client WHERE user = '$user';");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function findOne($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM client WHERE id_client = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function findAll()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM client");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("UPDATE client SET cpf_client=?, name_client=?, phone_client=? WHERE id_client=?");
        $stmt->bindParam(1, $object->cpf);
        $stmt->bindParam(2, $object->name);
        $stmt->bindParam(3, $object->phone);
        $stmt->bindParam(4, $object->id);
        return $stmt->execute();
    }
    public function delete ($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("DELETE FROM client WHERE id_client=?");
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
