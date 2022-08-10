<?php

namespace APP\Model\DAO;

use APP\Model\Connection;
use PDO;

class ProductDAO implements DAO
{
    public function insert($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("INSERT INTO product VALUES(null,?,?,?,?);");
        $stmt->bindParam(1, $object->name);
        $stmt->bindParam(2, $object->price);
        $stmt->bindParam(3, $object->quantity);
        $stmt->bindparam(4, $object->platform);
        return $stmt->execute();
    }
    public function findOne($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM product WHERE id_product = $id");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findOneProductPlaystation()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM product WHERE product_platform = 'Playstation';");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOneProductXbox()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM product WHERE product_platform = 'Xbox';");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOneProductNintendo()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM product WHERE product_platform = 'Nintendo';");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOneProductSteam()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM product WHERE product_platform = 'Steam';");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
        $connection = Connection::getConnection();
        $stmt = $connection->query("SELECT * FROM product");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($object)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("UPDATE product SET product_name=?, product_price=?, product_quantity=?, product_platform=? WHERE id_product=?;");
        $stmt->bindParam(1, $object->name);
        $stmt->bindParam(2, $object->price);
        $stmt->bindParam(3, $object->quantity);
        $stmt->bindParam(4, $object->platform);
        $stmt->bindParam(5, $object->id);
        return $stmt->execute();
    }
    public function delete($id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare("DELETE FROM product WHERE id_product=?");
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}