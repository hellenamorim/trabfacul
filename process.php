<?php
// Configuração do banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'trabfacul';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die('Erro ao conectar ao banco de dados: ' . $conn->connect_error);
}

// Receber dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Criptografar senha

// Inserir dados na tabela
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $nome, $email, $senha);

if ($stmt->execute()) {
    echo 'Cadastro realizado com sucesso!';
} else {
    echo 'Erro ao cadastrar: ' . $stmt->error;
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>