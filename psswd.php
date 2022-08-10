<?php

$senha = 'mayki1234';

$hash = password_hash($senha, PASSWORD_DEFAULT);

echo "o hash gerado é $hash";