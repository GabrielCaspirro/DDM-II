<?php
    // process.php
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

    // Preparar e vincular
    $stmt = $conn->prepare("INSERT INTO formulario (nome, email, mensagem) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $mensagem);

    // Definir parâmetros e executar
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    if ($stmt->execute()) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
?>