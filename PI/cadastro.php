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
    <p>bem vindo ao cadastro, por favor ensira as informações solicitadas:</p>
    <?php
        if(isset($_SESSION['falha']) != '') {
            echo '<p>' . $_SESSION['falha'] . '</p>';
        }
    ?>
    <form action="cadastro_process.php" method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome">
        <br>
        <label for="matricula">Matricula: </label>
        <input type="text" name="matricula" id="matricula">
        <br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <label for="email">@aluno.fmpsc.edu.br</label>
        <br>
        <label for="nome">Curso: </label>
        <input type="text" name="curso" id="curso" list="lista_curso" required pattern="PEDAGOGIA|ADMINISTRAÇÃO|PROCESSOS GERENCIAIS|ANÁLISE E DESENVOLVIMENTO DE SISTEMAS">
        <datalist id="lista_curso">
            <option value="PEDAGOGIA"></option>
            <option value="ADMINISTRAÇÃO"></option>
            <option value="PROCESSOS GERENCIAIS"></option>
            <option value="ANÁLISE E DESENVOLVIMENTO DE SISTEMAS"></option>
        </datalist>
        <br>
        <label for="nome">Turno: </label>
        <input type="text" name="turno" id="turno" list="lista_turno" required pattern="MATUTINO|NOTURNO">
        <datalist id="lista_turno">
            <option value="MATUTINO"></option>
            <option value="NOTURNO"></option>
        </datalist>
        <br>
        <label for="nome">Situação: </label>
        <input type="text" name="situacao" id="situacao" list="lista_situ" required pattern="CURSANDO|TRANCADO|FORMADO|DESISTENTE">
        <datalist id="lista_situ">
            <option value="CURSANDO"></option>
            <option value="TRANCADO"></option>
            <option value="FORMADO"></option>
            <option value="DESISTENTE"></option>
        </datalist>
        <br>
        <label for="nome">Telefone: </label>
        <input type="text" name="telefone" id="telefone">
        <br>
        <label for="senha">Senha: </label>
        <input type="text" name="senha" id="senha">
        <br>
        <input type="submit" value="enviar">
    </form>
</body>
</html>