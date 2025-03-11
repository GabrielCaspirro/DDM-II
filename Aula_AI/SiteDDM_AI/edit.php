<?php
$servername = "localhost";
$username = "root";; // Substitua pelo seu usuário do MySQL
$password = ""; // Substitua pela sua senha do MySQL
$dbname = "meu_site";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Buscar dados para edição
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM formulario WHERE id=$id");
    $row = $result->fetch_assoc();
}

// Atualizar dados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $conn->query("UPDATE formulario SET nome='$nome', email='$email', mensagem='$mensagem' WHERE id=$id");
    header("Location: view.php"); // Redireciona para a página de visualização
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Editar Dados</title>
</head>
<body>
    <div class="container">
        <h1>Editar Dados</h1>
        <form action="" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required>

            <label for="mensagem">Mensagem:</label>
            <textarea id="mensagem" name="mensagem" required><?php echo $row['mensagem']; ?></textarea>

            <button type="submit">Atualizar</button>
        </form>
        <a href="view.php">Voltar</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>