<?php


header("Access-Control_Allow-Origin:*");
header("Content-Type: application/json");


require_once '../DB/Conector.php';
require_once '../CLASS/classes.php';

//Instancia a "class Consulta" 
$consulta = new Consulta($pdo);
