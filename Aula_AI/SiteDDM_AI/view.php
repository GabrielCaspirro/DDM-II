<?php
$servername = "localhost";
$username = "root"; // Substitua pelo seu usuário do MySQL
$password = ""; // Substitua pela sua senha do MySQL
$dbname = "meu_site";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Deletar registro
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM formulario WHERE id=$id");
}

// Buscar dados
$result = $conn->query("SELECT * FROM formulario");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Visualizar Dados</title>
</head>
<body>
    <div class="container">
        <h1>Dados do Formulário</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Mensagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['mensagem']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>">Editar</a>
                            <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="index.html">Voltar ao Formulário</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>