<?php

    session_start();
    include 'bd_connect.php';

    if (isset($_FILES['img_certificado'])) {
        $ps = $conectar->prepare("SELECT * FROM certificado");
        $ps->execute();
        $resultado = $ps->get_result();

        if ($_FILES['img_certificado']['type'] == 'image/jpeg') {
            $caminho = mysqli_num_rows($resultado) . '.jpg';
        } elseif ($_FILES['img_certificado']['type'] == 'image/png') {
            $caminho = mysqli_num_rows($resultado) . '.png';
        } else {
            $_SESSION['falha'] = 'Tipo do arquivo deve ser PNG ou JPEG/JPG.';
            header('Location: cadastro_horas.php');
            exit();
        }
        $ps->close();

        $camtmp = $_FILES['img_certificado']['tmp_name']; 
        $tam = $_FILES['img_certificado']['size']; 
        $tipos = ['image/jpeg', 'image/png']; 
        $destino = 'certificados/' . $caminho;

        move_uploaded_file($camtmp, $destino);
    } else {
            $_SESSION['falha'] = 'Imagem do certificado não envida.';
            header('Location: cadastro_horas.php');
            exit();
    }

    $tipo = $_POST['tipo'];
    $instituicao = $_POST['instituicao'];
    $ano = $_POST['ano'];
    $horas = $_POST['horas'];
    $validacao = 0;

    $ps = $conectar->prepare("INSERT INTO certificado (tipo, instituicao, ano, numero_horas, img_certificado, validacao, aluno) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $ps->bind_param("sssssss", $tipo, $instituicao, $ano, $horas, $destino, $validacao, $_SESSION['matricula']);
    $ps->execute();
    mysqli_close($conectar);
    $_SESSION['falha'] = '';
    header('Location: certificados.php');
?>