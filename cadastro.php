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

                if (cadastrarUsuario($nome, $email, $senha, $tipo)) {
                    echo "<p class='sucesso'>Usuário cadastrado com sucesso!</p>";
                } else {
                    echo "<p class='erro'>Erro ao cadastrar usuário.</p>";
                }
            }
            ?>
            <form method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>

                <label for="tipo">Tipo de Usuário:</label>
                <select name="tipo" id="tipo">
                    <option value="individual">Individual</option>
                    <option value="empresa">Empresa</option>
                </select>

                <button type="submit">Cadastrar</button>
            </form>
        </section>
    </main>
</body>
</html>