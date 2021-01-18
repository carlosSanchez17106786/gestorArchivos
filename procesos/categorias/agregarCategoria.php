<?php
session_start();
require_once '../../clases/Categorias.php';
$datos=array(
    "idUsuario"=>$_SESSION['idUsuario'],
    "categoria"=>$_POST['categoria']

);

$Categorias=new Categorias();
echo $Categorias->agregarCategoria($datos);

?>