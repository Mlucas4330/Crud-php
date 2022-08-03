<?php
$servername = 'localhost';
$username = 'lucas';
$password = '123456';
$databse = 'crud';

$conn = new mysqli($servername, $username, $password, $databse);

if ($conn->connect_error) {
    die('Connection Failed' . $conn->connect_error);
}
