<?php

namespace APP\Controler;

use APP\Model\DAO\ProductDAO;
use APP\Model\Client;
use APP\Utils\Redirect;
use PDOException;

require '../../vendor/autoload.php';

switch ($_GET['operation'])
{
    case 'insert':
        insertClient();
        break;
    case 'list':
        listClient();
        break;
    case 'remove':
        removeClient();
        break;
    case 'find':
        findClient();
        break;
    case 'edit':
        editClient();
        break;
    default:
        Redirect::redirect(message: "Operação inválida :(", type: 'error');
}

function insertClient()
{
    if(empty($_POST)){
        session_start();
        Redirect::redirect(type: 'error', message: 'Operação inválida');
    }

    $clientCpf = $_POST["cpf"];
    $clientName = $_POST["name"];
    $clientPhone = $_POST["phone"];

    try {
        $dao = new ClientDAO();
        $result = $dao->insert($client);
        if ($result) {
            Redirect::redirect(message: "Cliente $clientName cadastrado com Suceso!", type: 'success');
        } else {
            Redirect::redirect(message: "Não foi possível cadastrar o cliente", type: 'error');
        }
    } catch (PDOException $e){
        Redirect::redirect(message: "Houve um erro inesperado :(", type: 'error');
    }
}

function listClient()
{

}

function removeClient()
{
    try {
        $dao = new ClientDAO();
        $result = $dao->delete($code);
        if ($result) {
            Redirect::redirect(message: "Cadastro removido com sucesso", type: 'success');
        } else {
            Redirect::redirect(message: ["Não foi possível remover o Cadastro"], type: 'warning');
        }
    } catch (PDOException $e) {
        Redirect::redirect("Erro Inesperado", type: 'error');
    }
}

function findClient()
{
    try {
        $dao = new ClientDAO();
        $result = $dao->findOne($code);
        if ($result) {
            session_start();
            $_SESSION['client_info'] = $result;
            header("location:../View/form_client.php");
        } else {
            Redirect::redirect(message: "Não localizamos o Cliente :(", type: 'error');
        }
    } catch (PDOException $e) {
        Redirect::redirect(message: "Erro inesperado", type: 'error');
    }
}

function editClient()
{
    if(empty($_POST)){
        session_start();
        Redirect::redirect(type: 'error', message: 'Operação inválida');
    }

    $clientCpf = $_POST["cpf"];
    $clientName = $_POST["name"];
    $clientPhone = $_POST["phone"];

    try {
        $dao = new ClientDAO();
        $result = $dao->update($client);
        if ($result) {
            Redirect::redirect(message: "Cadastro do cliente $clientName atualizado com sucesso!");
        } else {
            Redirect::redirect(message: "Não foi possível atualizar o Cadastro", type: 'error');
        }
    } catch (PDOException $e){
        Redirect::redirect(message: "Houve um erro inesperado :(", type: 'error');
    }
}