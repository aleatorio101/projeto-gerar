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

// Consulta SQL para buscar os dados do usuário pelo ID
$sql = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
$result = $conn->query($sql);

// Verifica se a consulta retornou algum resultado
if ($result && $result->num_rows > 0) {
  $usuario = $result->fetch_assoc();
} else {
  // Lidar com o caso em que o usuário não é encontrado
  echo "Erro ao carregar os dados do usuário.";
  // Redirecionar para a página de login ou mostrar uma mensagem de erro
  exit;
}

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
            <p>Endereço: <?php echo $usuario['endereco']; ?></p> <div id="editarPerfil">
                <a href="editar_perfil.php" class="button">Editar Perfil</a> </div>

            <!-- Formulário para atualizar perfil -->
            </section>
    </main>
</body>
</html>