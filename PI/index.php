<?php
    session_start();
    if(isset($_SESSION['usuario']) && !isset($_COOKIE['usuario'])) {
        $cookie_valor = $_SESSION['usuario'];
        setcookie('usuario', $cookie_valor, time() + 1800, '/');
        $_COOKIE['usuario'] = $_SESSION['usuario'];
        $_COOKIE['matricula'] = $_SESSION['matricula'];
    } elseif (isset($_COOKIE['usuario']) && !isset($_SESSION['usuario'])) {
        $_SESSION['usuario'] = $_COOKIE['usuario'];
        $_SESSION['matricula'] = $_COOKIE['matricula'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <div id="logado">
        <p>usuario logado: <?php if (isset($_SESSION['usuario'])) {echo $_SESSION['usuario'];} ?></p>
        <a href="logout.php">logout</a>
        <br>
        <a href="cadastro_horas.php">cadastro de horas</a>
        <br>
        <a href="certificados.php">certificados</a>
    </div>
    <div id="deslogado">
        <a href="login.php">login</a>
        <a href="cadastro.php">cadastre-se</a>
        <br>
        <a href="cadastro_horas.php">cadastro de horas</a>
        <br>
        <a href="certificados.php">certificados</a>
    </div>
    <div id="adm">
        <p>usuario logado: <?php if (isset($_SESSION['usuario'])) {echo $_SESSION['usuario'];} ?></p>
        <a href="logout.php">logout</a>
        <br>
        <a href="certificados.php">certificados</a>
    </div>


    <script> 
        function logado() {
            document.getElementById("logado").style.display="";
            document.getElementById("deslogado").style.display="none";
            document.getElementById("adm").style.display="none";
        } 
        function deslogado() {
            document.getElementById("logado").style.display="none";
            document.getElementById("deslogado").style.display="";
            document.getElementById("adm").style.display="none";
        }    
        function adm() {
            document.getElementById("logado").style.display="none";
            document.getElementById("deslogado").style.display="none";
            document.getElementById("adm").style.display="";
        }
    </script>

    <?php    
        if (!isset($_SESSION['usuario']) && !isset($_COOKIE['usuario'])) {
            echo '<script> deslogado() </script>';
        } elseif (isset($_SESSION['usuario']) && $_SESSION['usuario'] == 'admin') {
            echo '<script> adm() </script>';
        } elseif (isset($_SESSION['usuario'])) {
            echo '<script> logado() </script>';
        }
    ?>  


</body>
</html>