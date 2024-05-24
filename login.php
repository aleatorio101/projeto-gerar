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
            <?php
            session_start(); 
            include_once 'includes/funcoes.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                if (logarUsuario($email, $senha)) {
                    header("Location: dashboard.php");
                } else {
                    echo "<p class='erro'>Email ou senha inválidos.</p>";
                }
            }
            ?>
            <form method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>

                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>
</body>
</html>