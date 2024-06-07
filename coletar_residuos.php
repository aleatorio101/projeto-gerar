<?php
session_start();
include_once 'includes/funcoes.php'; 

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redireciona para login se não estiver logado
    exit;
}

$usuario_id = $_SESSION['usuario_id']; 

?>
<!DOCTYPE html>
<html>
<header>
        <h1>EcoTrack</h1>
        <link rel="stylesheet" href="style.css">
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
<body>
    <div class="container-centralizado"> 
        <div class="mensagem-coleta">
            <p>A empresa responsável irá buscar seus resíduos em <span id="dias">X</span> dias.</p>
            
            <p>Resíduos a Serem Coletados:</p> 
            <ul>
                <?php
                $residuos = obterResiduosUsuario($usuario_id); 

                if ($residuos->num_rows > 0) {
                    while ($row = $residuos->fetch_assoc()) {
                        echo "<li>" . $row['tipo'] . " - Quantidade: " . $row['quantidade'] . "</li>";
                    }
                } else {
                    echo "<li>Nenhum resíduo encontrado.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>