<!DOCTYPE html>
<html>
<head>
    <title>EcoTrack - Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>EcoTrack</h1>
    </header>

    <main>
        <section class="cadastro">
            <h2>Cadastro</h2>
            <?php
            include_once 'includes/funcoes.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $tipo = $_POST['tipo'];
                $endereco = $_POST['endereco'];

                if (cadastrarUsuario($nome, $email, $senha, $tipo, $endereco)) {
                    echo "<p class='sucesso'>Usuário cadastrado com sucesso!</p>";
                    session_start();
                    $_SESSION['emailCadastro'] = $email;
                    header("Location: login.php");
                    exit;
                } else {
                    echo "<p class='erro'>Erro ao cadastrar usuário.</p>";
                }
            }
            ?>
            <form method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required class="campo-formulario" style="width: 90%;">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required class="campo-formulario" style="width: 90%;">

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required class="campo-formulario" style="width: 90%;">

                <label for="endereço">Endereço:</label>
                <input type="text" name="endereco" id="endereco" required class="campo-formulario" style="width: 90%;">

                <label for="tipo">Tipo de Usuário:</label>
                <select name="tipo" id="tipo" style="width: 96%;">
                    <option value="individual">Individual</option>
                    <option value="empresa">Empresa</option>
                </select>

                <button type="submit">Cadastrar</button>
            </form>
        </section>
    </main>
</body>
</html>