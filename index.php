<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="librerias/Bootstrap4/bootstrap.min.css">
    <title>Login</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="https://www.b-cube.in/wp-content/uploads/2014/05/aditya-300x177.jpg" id="icon"
                    alt="User Icon" />
                <h1>Gestor de archivos</h1>
            </div>

            <!-- Login Form -->
            <form method="POST" id="frmLogin" onsubmit="return logear()">
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="username" required="">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password"
                    required="">
                <input type="submit" class="fadeIn fourth" value="Entrar">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="registro.html">Registrarse</a>
            </div>

        </div>
    </div>
    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">
    function logear() {
        $.ajax({
            type: "POST",
            data: $('#frmLogin').serialize(),
            url: "procesos/usuarios/login/login.php",
            success: function(respuesta) {
              respuesta=respuesta.trim();
              if(respuesta==1){
                window.location="vistas/inicio.php";
              }else{
                swal("fallo al entrar","Error");
              }
            }
        });
        return false;

    }
    </script>



</body>

</html>