<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn,$result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Editar</title>
</head>
<body>
    <a href="cad_usuario.php">Cadastrar</a><br>
    <a href="index.php">Listar</a><br>
    <h1>Editar Usuários</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="processa_edita_usuario.php" method="POST">
        <input type="hidden" name = "id" value = "<?php echo $row_usuario['id'];?>">
        <label>NOME: </label>
        <input type="text" name="nome" placeholder="Digite seu nome completo" value = "<?php echo $row_usuario['nome'];?>">
        <br>
        <br>
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Digite seu email" value = "<?php echo $row_usuario['email'];?>">
        <br>
        <br>
        <input type="submit" value="EDITAR">
        <br>
    </form>

</body>
</html>