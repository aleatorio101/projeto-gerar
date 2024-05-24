<?php
session_start();
include_once 'includes/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$usuario_nome = $_SESSION['usuario_nome'];
$usuario_email = $_SESSION['usuario_email'];
$usuario_tipo = $_SESSION['usuario_tipo'];

// Implemente funções para atualizar perfil
?>
<!DOCTYPE html>
<html>
<head>
    <title>EcoTrack - Perfil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>EcoTrack</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="perfil">
            <h2>Meu Perfil</h2>

            <p>Nome: <?php echo $usuario_nome; ?></p>
            <p>Email: <?php echo $usuario_email; ?></p>
            <p>Tipo: <?php echo $usuario_tipo; ?></p>

            <!-- Formulário para atualizar perfil -->
            </section>
    </main>
</body>
</html>