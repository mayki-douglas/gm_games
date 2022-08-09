<?php

namespace APP\Controler;

use APP\Model\DAO\ProductDAO;
use APP\Model\Product;
use APP\Utils\Redirect;
use PDOException;

require '../../vendor/autoload.php';

switch ($_GET['operation'])
{
    case 'insert':
        insertProduct();
        break;
    case 'list':
        listProduct();
        break;
    case 'remove':
        removeProduct();
        break;
    case 'find':
        findProduct();
        break;
    case 'edit':
        editProduct();
        break;
    default:
        Redirect::redirect(message: "Operação inválida :(", type: 'error');
}

function insertProduct()
{
    if(empty($_POST)){
        session_start();
        Redirect::redirect(type: 'error', message: 'Operação inválida');
    }

    $productName = $_POST["name"];
    $productPrice = str_replace(",", ".", $_POST["price"]);
    $productQuantity = $_POST["quantity"];
    $productPlatform = $_POST["platform"];

    try {
        $dao = new ProductDAO();
        $result = $dao->insert($product);
        if ($result) {
            Redirect::redirect(message: "O Jogo $productName foi cadastrado com sucesso!");
        } else {
            Redirect::redirect(message: "Não foi possível cadastrar o jogo $productName", type: 'error');
        }
    } catch (PDOException $e){
        Redirect::redirect(message: "Houve um erro inesperado :(", type: 'error');
    }
}

function listProduct()
{
    // try {
    //     session_start();
    //     $dao = new ProductDAO();
    //     $products = $dao->find
    // }
}

function removeProduct()
{

}

function findProduct()
{

}

function editProduct()
{

}