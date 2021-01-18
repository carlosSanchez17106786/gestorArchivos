<?php
require_once 'Conexion.php';
class Gestor extends Conexion{
    public function agregaRegistroArchivo($datos){
        $conexion=Conexion::conectar();
         $sql="insert into t_archivos (id_categoria,
                                       id_usuario,
                                       nombre,
                                       tipo,
                                       ruta) values (?,?,?,?,?)";

        $query=$conexion->prepare($sql);
        $query->bind_param("iisss",$datos['idCategoria'],
                                   $datos['idUsuario'],
                                   $datos['nombreArchivo'],
                                   $datos['tipo'],
                                   $datos['ruta']
                                   );      
        $respuesta=$query->execute();
        $query->close();
        return $respuesta;                                                       

    }

    public function obtenNombreArchivo($idArchivo){
        $conexion=Conexion::conectar();
        $sql="select nombre from t_archivos where id_archivo='$idArchivo'";
        $result=mysqli_query($conexion,$sql);
        return mysqli_fetch_array($result)['nombre'];
    }

 

    public function eliminarRegistroArchivo($idArchivo){
        $conexion=Conexion::conectar();
        $sql="delete from t_archivos where id_archivo='$idArchivo'";
        $query=$conexion->prepare($sql);
        $query->bind_param("i",$idArchivo);
        $respuesta=$query->execute();
        $query->close();
        return $respuesta;

    }

    public function obtenerRutaArchivo($idArchivo){
        $conexion=Conexion::conectar();
        $sql="select nombre, tipo from t_archivos where id_archivo='$idArchivo'";
        $result=mysqli_query($conexion,$sql);
        $datos=mysqli_fetch_array($result);
        $nombreArchivo=$datos['nombre'];
        $extension=$datos['tipo'];
        return self::tipoArchivo($nombreArchivo,$extension);

    }

    public function tipoArchivo($nombre,$extension){
            $idUsuario=$_SESSION['idUsuario'];
            $ruta="../archivos/".$idUsuario."/".$nombre;
        switch ($extension) {
            case 'png':
                return '<img src="'.$ruta.'" width="70%">';
            break;
            case 'jpg':
                return '<img src="'.$ruta.'" width="70%">';
            break;
            case 'pdf':
                return '<embed src="'.$ruta.'#toolbar=0&navpanes=0&scrolbar=0" type"application/pdf" width="100%" height="10%"/>';
            break;
            case 'mp3':
                return '<audio controls src="'.$ruta.'"></audio> ';
            break;
            case 'mp4':
                return '<video src="'.$ruta.'" controls width="100%" height="600px"></video>';
            break;
            default:
                # code...
                break;
        }


    }
}

?>