<?php
session_start();
include_once 'includes/funcoes.php';

$emailPreenchido = ""; 

if (isset($_SESSION['emailCadastro'])) {
    $emailPreenchido = $_SESSION['emailCadastro'];
    unset($_SESSION['emailCadastro']); 
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email']; 
    $senha = $_POST['senha'];

    if (logarUsuario($email, $senha)) {
        header("Location: dashboard.php"); 
        exit;
    } else {
        echo "<p class='erro'>Email ou senha inválidos.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>EcoTrack - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>EcoTrack</h1>
    </header>

    <main>
        <section class="login">
            <h2>Login</h2>
            <form method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required class="campo-formulario" value="<?php echo htmlspecialchars($emailPreenchido); ?>" style="width: 90%;">

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required class="campo-formulario" style="width: 90%;">
                <br>
                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>
</body>
</html>