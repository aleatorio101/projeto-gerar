<?php
session_start();
include_once 'includes/funcoes.php'; 

// Obter o ID do resíduo a ser editado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obter os dados do resíduo do banco de dados
    $residuo = obterResiduoPorId($id); 

    if (!$residuo) {
        echo "<p class='erro'>Resíduo não encontrado.</p>";
        exit; 
    }
} else {
    echo "<p class='erro'>ID do resíduo não especificado.</p>";
    exit; 
}

// Processar o formulário quando ele for enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dados = [
        'tipo' => $_POST['tipo'],
        'origem' => $_POST['origem'],
        'quantidade' => $_POST['quantidade'],
        'composicao' => $_POST['composicao'],
        'armazenamento' => $_POST['armazenamento'],
        'descarte' => $_POST['descarte'],
    ];

    if (editarResiduo($id, $dados)) {
        echo "<p class='sucesso'>Resíduo atualizado com sucesso!</p>";
        echo "<script>setTimeout(function(){ window.location.href = 'dashboard.php'; }, 3000);</script>";
    } else {
        echo "<p class='erro'>Erro ao atualizar resíduo.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>EcoTrack - Editar Resíduo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>EcoTrack</h1>
    </header>

    <main>
        <section class="editar-residuo">
            <h2>Editar Resíduo</h2>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>"> 

                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" value="<?php echo $residuo['tipo']; ?>" required class="campo-formulario">

                <label for="origem">Origem:</label>
                <input type="text" name="origem" id="origem" value="<?php echo $residuo['origem']; ?>" required class="campo-formulario">

                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" value="<?php echo $residuo['quantidade']; ?>" required class="campo-formulario">

                <label for="composicao">Composição:</label>
                <textarea name="composicao" id="composicao" required class="campo-formulario"><?php echo $residuo['composicao']; ?></textarea>

                <label for="armazenamento">Armazenamento:</label>
                <input type="text" name="armazenamento" id="armazenamento" value="<?php echo $residuo['armazenamento']; ?>" required class="campo-formulario">

                <label for="descarte">Descarte:</label>
                <input type="text" name="descarte" id="descarte" value="<?php echo $residuo['descarte']; ?>" required class="campo-formulario">
                <br>
                <button type="submit">Salvar Alterações</button>
            </form>
        </section>
    </main>
</body>
</html>