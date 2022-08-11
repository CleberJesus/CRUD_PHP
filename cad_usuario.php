<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=", initial-scale=1.0">
    <title>CRUD - Cadastrar</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>
    <form action="processa.php" method="POST">
        <label>NOME: </label>
        <input type="text" name="nome" placeholder="Digite seu nome completo">
        <br>
        <br>
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Digite seu email">
        <br>
        <br>
        <input type="submit" value="CADASTRAR">
        <br>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
    </form>
    <a href="index.php">Listar</a>
</body>
</html>