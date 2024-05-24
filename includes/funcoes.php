<?php
include_once 'conexao.php';

function cadastrarUsuario($nome, $email, $senha, $tipo) {
    global $conn;
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senhaHash', '$tipo')";
    return $conn->query($sql);
}

function logarUsuario($email, $senha) {
    global $conn;
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['usuario_nome'] = $row['nome'];
            $_SESSION['usuario_tipo'] = $row['tipo'];
            $_SESSION['usuario_email'] = $row['email'];
            return true;
        }
    }
    return false;
}

// Adicione outras funções para atualizar perfil, recuperar dados do usuário, etc.
?>