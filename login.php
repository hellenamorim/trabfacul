<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'trabfacul';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die('Erro ao conectar ao banco de dados: ' . $conn->connect_error);
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $stmt = $conn->prepare('SELECT id, senha FROM usuarios WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($senha, $user['senha'])) {
            // Login bem-sucedido, cria a sessão e redireciona para a página de entrada
            $_SESSION['user_id'] = $user['id'];
            header('Location: entrada.php'); // Redireciona para a tela de entrada
            exit;
        } else {
            $message = 'Senha incorreta.';
        }
    } else {
        $message = 'Usuário não encontrado.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
        <p><?php echo $message; ?></p>
        <p><a href="index.html">Cadastre-se</a></p>
    </div>
</body>
</html>
