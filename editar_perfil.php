<?php
session_start();
include_once 'includes/funcoes.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Consulta para obter os dados do usuário
$sql = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $novoNome = $_POST['nome'];
    $novoEmail = $_POST['email'];
    $novoEndereco = $_POST['endereco'];

    $sql = "UPDATE usuarios SET nome='$novoNome', email='$novoEmail', endereco='$novoEndereco' WHERE id='$usuario_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='sucesso'>Perfil atualizado com sucesso!</p>";

        // Atualiza as variáveis de sessão
        $_SESSION['usuario_nome'] = $novoNome;
        $_SESSION['usuario_email'] = $novoEmail; 

        // Redireciona para a página de perfil após 3 segundos
        echo "<script>setTimeout(function(){ window.location.href = 'perfil.php'; }, 3000);</script>";
    } else {
        echo "<p class='erro'>Erro ao atualizar perfil: " . $conn->error . "</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>EcoTrack - Editar Perfil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>EcoTrack</h1>
    </header>
    <main>
        <section class="editar-perfil">
            <h2>Editar Perfil</h2>
            <form method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?php echo $usuario['nome']; ?>" required class="campo-formulario" style="width: 90%;">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo $usuario['email']; ?>" required class="campo-formulario" style="width: 90%;">

                <label for="endereco">Endereço:</label>
                <input type="text" name="endereco" id="endereco" value="<?php echo $usuario['endereco']; ?>" required class="campo-formulario" style="width: 90%;">

                <button type="submit">Salvar Alterações</button>
            </form>
        </section>
    </main>
</body>
</html>