<?php
session_start();
if(isset($_SESSION['usuario'])){
 require_once 'header.php';
 ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">


        </div>
    </div>

</div>



<?php 
require_once 'footer.php';
 }else{

    header("location:../index.php");

 }
?>