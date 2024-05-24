<?php
session_start();
include_once 'includes/conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $residuo_id = $_GET['id'];

    // Função para excluir resíduo
    function excluirResiduo($residuo_id) {
        global $conn;
        $sql = "DELETE FROM residuos WHERE id = $residuo_id";
        return $conn->query($sql);
    }

    if (excluirResiduo($residuo_id)) {
        echo "<p class='sucesso'>Resíduo excluído com sucesso!</p>";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<p class='erro'>Erro ao excluir resíduo.</p>";
    }
} else {
    echo "<p class='erro'>ID do resíduo não encontrado.</p>";
}
?>