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

            $ps = $conectar->prepare("SELECT numero_horas FROM certificado INNER JOIN usuario WHERE usuario.matricula = ?");
            $ps->bind_param("s", $_SESSION['matricula']);
            $ps->execute();
            $resultado = $ps->get_result();
            $horas_total = 0;
            while ($dados = mysqli_fetch_array($resultado)) {
                $horas_total += $dados['numero_horas'];
            }
            $ps->close();
            echo '
                <p>total de horas: ' . $horas_total . '</p>
            ';

            $ps = $conectar->prepare("SELECT id, tipo, data_envio FROM certificado INNER JOIN usuario WHERE usuario.matricula = ?");
            $ps->bind_param("s", $_SESSION['matricula']);
            $ps->execute();
            $resultado = $ps->get_result();
            while ($dados = mysqli_fetch_array($resultado)) {
                echo '
                <form action="detalhes_certificado.php" method="post">
                <li>' . $dados['tipo'] . $dados['data_envio'] . ' <button type="submit" value="' . $dados['id'] . '" name="id" id="id">Abrir</button></li> 
                ';

            }  
            echo '
                <br>
                <a href="index.php">pagina inicial</a>
                <br>
                <a href="cadastro_horas.php">cadastro de horas</a>
            ';
            $ps->close();
            mysqli_close($conectar);
        } else {
            echo 'Você precisa estar logado para acessar essa página, <a href="login.php">faça seu login aqui!</a>';
        }
    ?>
</body>
</html>