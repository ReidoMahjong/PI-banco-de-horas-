<?php
    session_start();
    include 'bd_connect.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $ps = $conectar->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
    $ps->bind_param("ss", $email, $senha);
    $ps->execute();
    $retorno = $ps->get_result();

    if (isset($retorno) && mysqli_num_rows($retorno) == 1) {
        while($user = mysqli_fetch_array($retorno)) {
            $_SESSION['usuario'] = $user['nome'];
            $_SESSION['matricula'] = $user['matricula'];
        }
        $_SESSION['falha'] = '';
        $ps->close();
        mysqli_close($conectar);
        header("Location: index.php");
    } else {
        $_SESSION['falha'] = 'credenciais invalidas.';
        $ps->close();
        mysqli_close($conectar);
        header("Location: login.php");
    }
?>