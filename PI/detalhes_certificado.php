<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_SESSION['usuario'])) {
            include 'bd_connect.php';

            $id = $_POST['id'];

            $ps = $conectar->prepare("SELECT * FROM certificado INNER JOIN usuario WHERE id = ?");
            $ps->bind_param("s", $id);
            $ps->execute();
            $resultado = $ps->get_result();
            $dados = mysqli_fetch_array($resultado);

            echo '
                <p>' . $dados['tipo'] . '</p>
                <p>' . $dados['instituicao'] . '</p>
                <p>' . $dados['ano'] . '</p>
                <p>' . $dados['numero_horas'] . '</p>
                <img src="' . $dados['img_certificado'] . '" style="height: 250px; width: 250px;">
                <br>
                <a href="certificados.php">certificados</a>
            ';
            mysqli_close($conectar);
        } else {
            echo 'Você precisa estar logado para acessar essa página, <a href="login.php">faça seu login aqui!</a>';
        }
    ?>
</body>
</html>