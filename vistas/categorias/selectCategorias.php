<?php
session_start();
require_once '../../clases/Conexion.php';
$c=new Conexion();
$conexion=$c->conectar();
$idUsuario=$_SESSION['idUsuario'];
$sql="select id_categoria, nombre from t_categorias where id_usuario='$idUsuario'";
$result=mysqli_query($conexion,$sql);
?>

<select name="categoriasArchivos"  id="categoriasArchivos" class="form-control">
<?php while($mostrar=mysqli_fetch_array($result)){
    $idCategoria=$mostrar['id_categoria'];
?>


<option value="<?php echo $idCategoria?>"><?php echo $mostrar['nombre']?></option>
 
<?php }?>
</select>