<?php

if($_SERVER['SERVER_NAME'] == "localhost"){
    define('DNS', 'mysql:host=localhost:3307;dbname=loja_de_games');
    define('USER', 'root');
    define('PASSWORD', '');
}