<?php
    include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=", initial-scale=1.0">
    <title>CRUD - Pesquisar</title>
</head>
<body>
    <h1>Pesquisar Usuário</h1>
    <form action="" method="POST">
        <label>NOME: </label>
        <input type="text" name="nome" placeholder="Digite seu nome completo">
        
        <br>
        <input type="submit" name="sendPesqUser" value="Pesquisar">
        <br>
        
    </form>
    

    <?php
       $sendPesqUser =  filter_input(INPUT_POST, 'sendPesqUser',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if($sendPesqUser){
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $result_usuario = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
                echo "ID: " . $row_usuario['id'] . "<br>";
                echo "Nome: " . $row_usuario['nome'] . "<br>";
                echo "Email: " . $row_usuario['email'] . "<br>";
                echo "<a href='edita.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
                echo "<a href='proc_apaga_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
            
            }
        }
    ?>
</body>
</html>