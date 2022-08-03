<?php

define('SERVIDOR', 'localhost');
define('USUARIO', 'lucas');
define('SENHA', '123456');
define('BANCO', 'login');

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
