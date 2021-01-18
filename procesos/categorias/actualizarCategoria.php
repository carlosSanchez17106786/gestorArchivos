<?php 
require_once '../../clases/Categorias.php';
$categorias=new Categorias();
$datos=array(
   "idCategoria" => $_POST['idCategoria'],
   "categoria" => $_POST['categoriaU']
);

echo $categorias->actualizarCategoria($datos);

?>