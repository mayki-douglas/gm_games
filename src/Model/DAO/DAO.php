<?php

namespace APP\Model\DAO;

interface DAO 
{
    public function insert($object);
    public function findOne($id);
    public function findAll();
    public function update($object);
    public function delete($id);
}