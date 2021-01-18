<?php
  require_once 'Conexion.php';
  class Usuario extends Conexion{

    public function agregarUsuario($datos){
        $conexion=Conexion::conectar();

        if(self::buscarUsuarioRepetido($datos['usuario'])){

            return 2;

        }else{

               $sql="insert into t_usuarios (nombre,fechaNacimiento,email,usuario,password)
                          values(?, ?, ?, ?, ?)";
        $query=$conexion->prepare($sql);
        $query->bind_param('sssss', $datos['nombre'], 
                                    $datos['fechaNacimiento'],
                                    $datos['email'],
                                    $datos['usuario'],
                                    $datos['password']);
        $exito=$query->execute();    
        $query->close();
        return $exito;   
        }
    }


    public function buscarUsuarioRepetido($usuario){
        $conexion=Conexion::conectar();

        $sql="select usuario from t_usuarios where usuario= '$usuario'";
        $result= mysqli_query($conexion,$sql);
        $datos=mysqli_fetch_array($result);

        if($datos['usuario'] != "" || $datos['usuario']==$usuario){
            return 1;

        }else{
            return 0;
        }
    }

    public function login($usuario,$password){
        $conexion=Conexion::conectar();

        $sql="select count(*) as existeUsuario from t_usuarios where usuario = '$usuario' and password = '$password';";
        $result=mysqli_query($conexion,$sql);
        $respuesta=mysqli_fetch_array($result)['existeUsuario'];
        if($respuesta > 0){
            $_SESSION['usuario']=$usuario;
            $sql2="select id_usuario from t_usuarios where usuario = '$usuario' and password='$password';";
            $result=mysqli_query($conexion,$sql2);
            $idUsuario=mysqli_fetch_row($result)[0];
            $_SESSION['idUsuario']=$idUsuario;

            return 1;

        }else{
            return 0;
        }



    }
  }


?>