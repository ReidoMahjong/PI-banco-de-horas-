<?php
    session_start()
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
        <h1>Formulario de Registro</h1>
        <form action="c_horas_process.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="tipo" id="tipo" placeholder="EVENTO - CURSO - ATIVIDADE + NOME">
            <br>
            <input type="text" name="instituicao" id="instituicao" placeholder="Nome da Instituição">
            <br>
            <input type="text" name="ano" id="ano" placeholder="Ano">
            <br>
            <input type="text" name="horas" id="horas" placeholder="N° de Horas">
            <br>
            <input type="file" name="img_certificado" id="img_certificado" required>
            <input type="submit" value="enviar">
        </form>
    </div>
    
    <div id="deslogado">
        <p>Você precisa estar logado para acessar essa página, <a href="login.php">faça seu login aqui!</a></p>
    </div>

    <script> 
        function logado() {
            document.getElementById("logado").style.display="";
            document.getElementById("deslogado").style.display="none";
        } 
        function deslogado() {
            document.getElementById("logado").style.display="none";
            document.getElementById("deslogado").style.display="";
        }    
    </script>

    <?php    
        if (!isset($_SESSION['usuario']) && !isset($_COOKIE['usuario'])) {
            echo '<script> deslogado() </script>';
        } elseif (isset($_SESSION['usuario'])) {
            echo '<script> logado() </script>';
        }
    ?>  

</body>
</html>