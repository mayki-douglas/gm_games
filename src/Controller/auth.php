<?php

use APP\Utils\Redirect;

session_start();
if(empty($_SESSION['auth'])){
    header('location:../../index.html');
}