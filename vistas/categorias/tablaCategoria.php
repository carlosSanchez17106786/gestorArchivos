<?php
session_start();
require_once "../../clases/Conexion.php";
$idUsuario=$_SESSION['idUsuario'];
$conexion=new Conexion();
$conexion=$conexion->conectar();


?>
<div class="table-responsive">
    <table class="table-hover table table-dark" id="tablaCategoriasDataTable">
        <thead style="text-align:center;">
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
            <?php
            $sql="select id_categoria,nombre,fechaInsert from t_categorias where id_usuario='$idUsuario'";
            $result=mysqli_query($conexion,$sql);

            while($mostrar=mysqli_fetch_array($result)){
                $idCategoria=$mostrar['id_categoria'];
            ?>
            <tr style="text-align:center;">
                <td><?php echo $mostrar['nombre']; ?></td>
                <td><?php echo $mostrar['fechaInsert']; ?></td>
                <td>
                    <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarCategoria" onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')">
                        <span class="fas fa-edit"></span>
                    </span>
                </td>
                <td >
                <span class="btn btn-danger btn-sm" onclick="eliminarCategoria('<?php echo $idCategoria ?>');">
                    <span class="fas fa-trash-alt"></span>
                </span>
                </td>
            </tr>
            <?php
            }
            
            ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">

   $(document).ready(function(){
      $('#tablaCategoriasDataTable').DataTable();


   });
</script>