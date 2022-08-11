<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Listar</title>
</head>
<body>
    <a href="cad_usuario.php">Cadastrar</a>
    <a href="index.php">Listar</a>
    <a href="pesquisar.php">Pesquisar</a>
    <h1>Listar Usuários</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

    //receber o numero da página    
    $pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
   



    //setar a quantidade de itens por pagina
    $qtd_result_pg = 2;

    //calcular o inicio da visualização
    $inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;

    $result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qtd_result_pg";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);

    while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
        echo "ID: " . $row_usuario['id'] . "<br>";
        echo "Nome: " . $row_usuario['nome'] . "<br>";
        echo "Email: " . $row_usuario['email'] . "<br>";
        echo "<a href='edita.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
        echo "<a href='proc_apaga_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
    }


    //paginação - somar a quantidade de usuarios
    $result_pg  = "SELECT COUNT(id) AS num_result FROM usuarios";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    //quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);

    //limitar os links antes e depois
    $max_links = 2;
    echo "<a href ='index.php?pagina=1'>primeira</a>";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
        if($pag_ant >= 1){
            echo "<a href ='index.php?pagina=$pag_ant'>$pag_ant</a>";
        }
    }

    echo "$pagina ";

    for($pag_dep = $pagina + 1;$pag_dep <= $pagina + $max_links; $pag_dep++){
        if($pag_dep <= $quantidade_pg){
            echo "<a href ='index.php?pagina=$pag_dep'>$pag_dep</a>";

        }
    }

    echo "<a href ='index.php?pagina=$quantidade_pg'>ultima</a>";




    ?>
</body>
</html>