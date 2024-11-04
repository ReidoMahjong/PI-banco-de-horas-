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
        if(isset($_SESSION['falha']) != '') {
            echo '<p>' . $_SESSION['falha'] . '</p>';
        }
    ?>
    <form action="login_process.php" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <br>
        <label for="senha">Senha: </label>
        <input type="text" name="senha" id="senha">
        <br>
        <input type="submit" value="enviar">
    </form>
    <a href=""></a>
</body>
</html>