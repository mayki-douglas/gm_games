<?php

namespace APP\Controler;

use APP\Model\DAO\ClientDAO;
use APP\Model\Client;
use APP\Utils\Redirect;
use PDOException;

use function PHPSTORM_META\type;

require_once '../../vendor/autoload.php';

switch ($_GET['operation']) {
    case 'login':
        login();
        break;
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

function login()
{
    if (empty($_POST)) {
        Redirect::redirect(message: 'Requisição inválida!!!', type: 'error');
    }

    $login = $_POST['login'];
    $password = $_POST['password'];

    $dao = new ClientDAO();
    $user = $dao->findUser($login, $password);

    if($login){
        if(password_verify($password, $user['password'])){
            session_start();
            $_SESSION['auth'] = $login;
            header('location:../../index.html');
        }else{
            Redirect::redirect(message: 'Senha incorreta', type:"error");
        }
    } else {
        Redirect::redirect(message:"Falha ao logar", type:"error");
    }
}

function insertClient()
{
    if (empty($_POST)) {
        session_start();
        Redirect::redirect(type: 'error', message: 'Operação inválida');
    }

    $clientUser = $_POST["user"];
    $clientPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $clientCpf = $_POST["cpf"];
    $clientName = $_POST["name"];
    $clientPhone = $_POST["phone"];

    $error = array();

    if ($error) {
        Redirect::redirect(message: $error, type: 'error');
    } else {
        $client = new Client(
            user: $clientUser,
            password: $clientPassword,
            cpf: $clientCpf,
            name: $clientName,
            phone: $clientPhone
        );
        // $hash = password_hash($clientPassword, PASSWORD_DEFAULT);

        try {
            $dao = new ClientDAO();
            $result = $dao->insert($client);
            if ($result) {
                Redirect::redirect(message: "Cliente $clientName cadastrado com Suceso!", type: 'success');
            } else {
                Redirect::redirect(message: "Não foi possível cadastrar o cliente", type: 'error');
            }
        } catch (PDOException $e) {
            Redirect::redirect(message: "Houve um erro inesperado :(", type: 'error');
        }
    }
}

function listClient()
{
    try{
        session_start();
        $dao = new ClientDAO();
        $client = $dao->findUser($user);
        if($client){
            $_SESSION['client_info'] = $client;
            header('location:../View/perfil_user.php');
        } else {
            Redirect::redirect(message:["Nao foram encontrados usuarios"], type: "warning");
        }
    } catch (PDOException $e){
        Redirect::redirect("Erro inesperado", type: "error");
    }
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
    if (empty($_POST)) {
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
    } catch (PDOException $e) {
        Redirect::redirect(message: "Houve um erro inesperado :(", type: 'error');
    }
}
