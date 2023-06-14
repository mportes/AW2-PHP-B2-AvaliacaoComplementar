<!DOCTYPE html>
<html>
<head>
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
     <?php
    // Conexão com o banco de dados
    try{
        $conexao = mysqli_connect("localhost", "estudante1", "estudante1", "estudante1");
    } catch (Exception $e) {
        // Verifica se a conexão foi estabelecida corretamente
        if (mysqli_connect_errno()) {
            echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
            exit();
        }
    }
    
    // Consulta SQL para buscar os produtos
    $consulta = "SELECT * FROM produtos";
    $resultado = mysqli_query($conexao, $consulta);

    // Verifica se a consulta retornou resultados
    if (mysqli_num_rows($resultado) > 0) {
        // Exibe os produtos em uma tabela
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>";
// Loop através dos resultados da consulta
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>
                    <td>".$linha['id']."</td>
                    <td>".$linha['nome']."</td>
                    <td>".$linha['preco']."</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum produto encontrado.";
    }
// Fecha a conexão com o banco de dados
    mysqli_close($conexao);
    ?>

</body>
</html>