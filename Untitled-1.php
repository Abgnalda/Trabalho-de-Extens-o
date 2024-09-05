<?php
// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "", "estoque");

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verifica se o método de requisição é POST (formulário foi enviado)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    // Verifica se os campos não estão vazios
    if (!empty($produto) && !empty($quantidade)) {
        // Insere os dados no banco
        $sql = "INSERT INTO `estoque.1` (Protudos, Quantidade) VALUES ('$produto', '$quantidade')";
        if ($conexao->query($sql) === TRUE) {
            header('Location: index.html');  // Redireciona para a página principal
            exit();  // Encerra o script
        } else {
            echo "Erro ao inserir: " . $conexao->error;
        }
    } else {
        echo "Todos os campos são obrigatórios.";
    }
}
?>
<?php
// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "", "estoque");

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Recupera o ID do item a ser editado
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];

    // Verifica se os campos não estão vazios
    if (!empty($produto) && !empty($quantidade)) {
        // Atualiza o item no banco de dados
        $sql = "UPDATE `estoque.1` SET Protudos='$produto', Quantidade='$quantidade' WHERE id=$id";
        if ($conexao->query($sql) === TRUE) {
            header('Location: index.html');  // Redireciona para a página principal
            exit();  // Encerra o script
        } else {
            echo "Erro ao atualizar: " . $conexao->error;
        }
    } else {
        echo "Todos os campos são obrigatórios.";
    }
} else {
    // Recupera os dados do item para preencher o formulário
    $result = $conexao->query("SELECT * FROM `estoque.1` WHERE id=$id");
    $item = $result->fetch_assoc();
}
?>
<?php
// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "", "estoque");

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Recupera o ID do item a ser excluído
$id = $_GET['id'];

if (!empty($id)) {
    // Deleta o item do banco de dados
    $sql = "DELETE FROM `estoque.1` WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header('Location: index.html');  // Redireciona para a página principal
        exit();  // Encerra o script
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
} else {
    echo "ID inválido.";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Estoque</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Controle de Estoque - Itens de Costura</h1>

    <!-- Formulário para adicionar um novo item -->
    <form action="processa_form.php" method="POST">
        <label for="nome">Nome do Produto:</label><br>
        <input type="text" id="nome" name="produto" required><br><br>

        <label for="quantidade">Quantidade:</label><br>
        <input type="number" id="quantidade" name="quantidade" required><br><br>

        <input type="submit" value="Adicionar Item">
    </form>

    <!-- Tabela para listar os itens no estoque -->
    <h2>Itens em Estoque</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>

        <!-- PHP para recuperar e exibir os itens do banco de dados -->
        <?php
        // Conecta ao banco de dados
        $conexao = new mysqli("localhost", "root", "", "estoque");
        $result = $conexao->query("SELECT * FROM `estoque.1`");

        // Itera sobre os itens recuperados
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['Protudos']}</td>
                    <td>{$row['Quantidade']}</td>
                    <td>
                        <a href='editar.php?id={$row['id']}'>Editar</a> | 
                        <a href='excluir.php?id={$row['id']}'>Excluir</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Item</title>
</head>
<body>
    <h1>Editar Item</h1>

    <!-- Formulário para editar o item -->
    <form action="editar.php?id=<?php echo $id ?>" method="POST">
        <label for="produto">Nome do Produto:</label><br>
        <input type="text" id="produto" name="produto" value="<?php echo $item['Protudos'] ?>" required><br><br>

        <label for="quantidade">Quantidade:</label><br>
        <input type="number" id="quantidade" name="quantidade" value="<?php echo $item['Quantidade'] ?>" required><br><br>

        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
