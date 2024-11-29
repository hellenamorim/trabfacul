<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: login.php');
    exit;
}

// Caso o usuário esteja logado, exibe a mensagem de boas-vindas
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada</title>
    <style>
        /* Reset de margem e padding para todos os elementos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f); /* Degradê suave no fundo */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .container {
            background: #1e8a3c; /* Cor verde */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            background: linear-gradient(135deg, #2ecc71, #16a085); /* Degradê no título */
            -webkit-background-clip: text;
            color: transparent;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #f1f1f1;
            margin-bottom: 30px;
        }

        .user-info {
            font-size: 18px;
            color: #f1f1f1;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #f39c12;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #d35400;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <h1>Seja bem-vindo ao sistema!</h1>
    <!--<p>Você está logado como usuário número <?php echo $_SESSION['user_id']; ?>.</p>-->
    <p><a href="logout.php">Sair</a></p>
</body>
</html>
