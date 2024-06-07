<?php
include_once 'conexao.php';

function cadastrarUsuario($nome, $email, $senha, $tipo, $endereco) { // Adicionando $endereco
    global $conn;
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo, endereco) VALUES ('$nome', '$email', '$senhaHash', '$tipo', '$endereco')"; 
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
            $_SESSION['usuario_enderco'] = $row['endereco'];
            
            return true;
        }
    }
    return false;
}

function editarResiduo($id, $dados) {
    global $conn;

    $sql = "UPDATE residuos SET ";
    $campos = [];

    foreach ($dados as $coluna => $valor) {
        // Verifique se a coluna 'data_cadastro' está sendo atualizada
        if ($coluna == 'data_cadastro') {
            // Formate a data para o formato MySQL (YYYY-MM-DD HH:MM:SS)
            $valor = date('Y-m-d H:i:s', strtotime($valor));
        }

        $campos[] = "$coluna = '$valor'";
    }

    $sql .= implode(', ', $campos);
    $sql .= " WHERE id = $id";

    return $conn->query($sql);
}

// Função para obter os dados de um resíduo pelo ID
function obterResiduoPorId($id) {
    global $conn;
    $sql = "SELECT * FROM residuos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false; 
    }
}

?>