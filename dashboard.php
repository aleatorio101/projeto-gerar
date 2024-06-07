<?php
session_start();
include_once 'includes/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$usuario_nome = $_SESSION['usuario_nome'];
$usuario_tipo = $_SESSION['usuario_tipo'];

// Funções para CRUD de Resíduos
function cadastrarResiduo($usuario_id, $tipo, $origem, $quantidade, $composicao, $armazenamento, $descarte) {
    global $conn;
    $sql = "INSERT INTO residuos (usuario_id, tipo, origem, quantidade, composicao, armazenamento, descarte) VALUES ('$usuario_id', '$tipo', '$origem', '$quantidade', '$composicao', '$armazenamento', '$descarte')";
    return $conn->query($sql);
}

function listarResiduos($usuario_id) {
    global $conn;
    $sql = "SELECT * FROM residuos WHERE usuario_id = '$usuario_id'";
    $result = $conn->query($sql);
    return $result;
}

// Implemente funções para atualizar e excluir resíduos
?>
<!DOCTYPE html>
<html>
<head>
    <title>EcoTrack - Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>EcoTrack</h1>
        <nav>
            <ul>
                <li><a href="perfil.php">Perfil</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="dashboard">
            <h2>Bem-vindo, <?php echo $usuario_nome; ?>!</h2>

            <h3>Cadastrar Resíduo</h3>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cadastrar_residuo'])) {
                // Recupere os dados do formulário
                $tipo = $_POST['tipo'];
                $origem = $_POST['origem'];
                $quantidade = $_POST['quantidade'];
                $composicao = $_POST['composicao'];
                $armazenamento = $_POST['armazenamento'];
                $descarte = $_POST['descarte'];

                if (cadastrarResiduo($usuario_id, $tipo, $origem, $quantidade, $composicao, $armazenamento, $descarte)) {
                    echo "<p class='sucesso'>Resíduo cadastrado com sucesso!</p>";
                } else {
                    echo "<p class='erro'>Erro ao cadastrar resíduo.</p>";
                }
            }
            ?>
            <form method="post">
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" required>

                <label for="origem">Origem:</label>
                <input type="text" name="origem" id="origem" required>

                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" required>

                <label for="composicao">Composição:</label>
                <textarea name="composicao" id="composicao"></textarea>

                <label for="armazenamento">Armazenamento:</label>
                <input type="text" name="armazenamento" id="armazenamento">

                <label for="descarte">Descarte:</label>
                <input type="text" name="descarte" id="descarte">
                <br>

                <button type="submit" name="cadastrar_residuo">Cadastrar</button>
            </form>

            <h3>Meus Resíduos</h3>
            <?php
    $residuos = listarResiduos($usuario_id);
    if ($residuos->num_rows > 0) {
        echo "<table class='tabela-residuos'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Tipo</th>";
        echo "<th>Origem</th>";
        echo "<th>Quantidade</th>";
        echo "<th>Composição</th>";
        echo "<th>Armazenamento</th>";
        echo "<th>Descarte</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while($row = $residuos->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['tipo'] . "</td>";
            echo "<td>" . $row['origem'] . "</td>";
            echo "<td>" . $row['quantidade'] . "</td>";
            echo "<td>" . $row['composicao'] . "</td>";
            echo "<td>" . $row['armazenamento'] . "</td>";
            echo "<td>" . $row['descarte'] . "</td>";
            echo "<td>";
            echo "<a href='editar_residuo.php?id=" . $row['id'] . "' class='acao-residuo botao-verde'>Editar</a> | ";
            echo "<a href='excluir_residuo.php?id=" . $row['id'] . "' class='acao-residuo botao-verde'>Excluir</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Nenhum resíduo cadastrado.</p>";
    }
    ?>
        </section>
    </main>
</body>
</html>