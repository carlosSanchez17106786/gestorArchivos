<?php 
require_once 'Conexion.php';
class Categorias extends Conexion{
    public function agregarCategoria($datos){
        $conexion= Conexion::conectar();
        $sql="insert into t_categorias (id_usuario,nombre) values(?,?)";
        $query=$conexion->prepare($sql);
        $query->bind_param("is", $datos['idUsuario'],$datos['categoria']);
        $respuesta=$query->execute();
        $query->close();
        return $respuesta;

    }

    public function eliminarCategoria($idCategoria){
        $conexion= Conexion::conectar();
        $sql= "delete from t_categorias where id_categoria = ?";
        $query=$conexion->prepare($sql);
        $query->bind_param('i', $idCategoria);
        $respuesta=$query->execute();
        $query->close();
        return $respuesta;


    }

    public function obtenerCategoria($idCategoria){
        $conexion= Conexion::conectar();

        $sql="select id_categoria, nombre from t_categorias where id_categoria='$idCategoria'";
        $result=mysqli_query($conexion,$sql);
        $categoria=mysqli_fetch_array($result);

        $datos=array(
            "idCategoria"=>$categoria['id_categoria'],
            "nombreCategoria"=>$categoria['nombre']
        );

        return $datos;


    }

    public function actualizarCategoria($datos){
        $conexion= Conexion::conectar();
        $sql="update t_categorias set nombre = ? where id_categoria = ?";
        $query=$conexion->prepare($sql);
        $query->bind_param("si",$datos['categoria'], $datos['idCategoria']);

        $respuesta=$query->execute();
        $query->close();
        return $respuesta;


    }



}
?>