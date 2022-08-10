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
    $productPrice = str_replace(".", ",", $_POST["price"]);
    $quantity = $_POST["quantity"];
    $platform = $_POST["platform"];

    $error = array();

    if($error) {
        Redirect::redirect(message: $error, type: 'error');
    } else {
        $products = new Product(
            name: $productName,
            price: $productPrice,
            quantity: $quantity,
            platform: $platform
        );

        try {
            $dao = new ProductDAO();
            $result = $dao->insert($products);
            if ($result) {
                Redirect::redirect(message: "O Jogo $productName foi cadastrado com sucesso!");
            } else {
                Redirect::redirect(message: "Não foi possível cadastrar o jogo $productName", type: 'error');
            }
        } catch (PDOException $e){
            Redirect::redirect(message: "Houve um erro inesperado :(", type: 'error');
        }
    }
}

function listProduct()
{
    try {
        session_start();
        $dao = new ProductDAO();
        $products = $dao->findAll();
        if ($products) {
            $_SESSION['list_products'] = $products;
            header('location:../View/list_products.php');
        } else {
            Redirect::redirect(message: ['Não exite produtos cadastrados'], type: 'warning');
        }
    } catch (PDOException $e) {
        Redirect::redirect("Erro Inesperado", type: 'error');
    }
}

function removeProduct()
{
    $code = (float) $_GET['code'];
    $error = array();

    if ($error) {
        Redirect::redirect($error, type: 'warning');
    }else{
        try {
            $dao = new ProductDAO();
            $result = $dao->delete($code);
                if ($result) {
                    Redirect::redirect(message: "O jogo $product_name foi removido", type: 'success');
                } else {
            Redirect::redirect(message: ["Não foi possível remover o produto"], type: 'warning');
        }
            } catch (PDOException $e) {
                Redirect::redirect("Erro Inesperado", type: 'error');
            }
        }
}

function findProduct()
{

    $code = $_GET['code'];
    $dao = new ProductDAO();
    try {
        $result = $dao->findOne($code);
    } catch (PDOException $e) {
        Redirect::redirect(message: "Erro inesperado", type:'error');
    }
    if($result) {
        session_start();
        $_SESSION['product_info'] = $result;
        header("location:../View/form_edit_product.php");
    } else {
        Redirect::redirect(message: "Produto não localizado no Banco", type: 'error');
    }
}

function editProduct()
{
    if(empty($_POST)){
        session_start();
        Redirect::redirect(type: 'error', message: 'Operação inválida');
    }

    $code = $_POST["code"];
    $productName = $_POST["name"];
    $productPrice = str_replace(",", ".", $_POST["price"]);
    $quantity = $_POST["quantity"];
    $platform = $_POST["platform"];

    $error = array();

    if($error) {
        Redirect::redirect(message: $error, type: 'error');
    } else {
        $products = new Product(
            name: $productName,
            price: $productPrice,
            quantity: $quantity,
            platform: $platform,
            id: $code
        );
        
        $dao = new ProductDAO();
        try {
            $result = $dao->update($products);
        } catch (PDOException $e) {
            Redirect::redirect("Erro inesperado", type: 'error');
        }

        if ($result) {
            Redirect::redirect(message: "Produto atualizado com sucesso", type: 'success');
        } else {
            Redirect::redirect(message: ['Não foi possível atualizar o produto']);
        }
    }
}