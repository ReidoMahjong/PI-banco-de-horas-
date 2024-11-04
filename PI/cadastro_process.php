<?php
    session_start();

    $nome = $_POST['nome'];
    $matricula = $_POST['matricula'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];
    $turno = $_POST['turno'];
    $situacao = $_POST['situacao'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];

    if (empty($nome || $matricula || $email || $curso || $turno || $situacao || $telefone || $senha)) {
        $_SESSION['falha'] = 'Todos os campos devem ser preenchidos.';
        header("Location: cadastro.php");
        exit();
    } elseif (strlen($matricula) != 4) {
        $_SESSION['falha'] = 'Matricula inválida.';
        header("Location: cadastro.php");
        exit();
    }

    $email = $email . '@aluno.fmpsc.edu.br';

    include 'bd_connect.php';

    $ps = $conectar->prepare("SELECT * FROM usuario WHERE email = ? OR matricula = ?");
    $ps->bind_param("ss", $email, $matricula);
    $ps->execute();
    $retorno = $ps->get_result();

    if (isset($retorno) && mysqli_num_rows($retorno) > 0) {
        $_SESSION['falha'] = 'As informações digitadas já estão cadastradas.';
        mysqli_close($conectar);
        header("Location: cadastro.php");
        exit();
    }

    $cadastro = "INSERT INTO usuario (nome, matricula, email, curso, turno, situacao, telefone, senha) VALUES ('$nome', '$matricula', '$email', '$curso', 'turno', 'situacao', 'telefone', '$senha')";

    $ps->close();

    if(mysqli_query($conectar, $cadastro)) {
        $_SESSION['usuario'] = $nome;
        $_SESSION['matricula'] = $matricula;
        $_SESSION['falha'] = '';
        mysqli_close($conectar);
        header("Location: index.php");
    } else {
        $_SESSION['falha'] = 'Ocorreu um erro, tente novamente.';
        mysqli_close($conectar);
        header("Location: cadastro.php");
    }

?>