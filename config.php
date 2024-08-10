<?php
$localHost = 'localhost';
$user = 'root';
$pass = '';
$banco = 'loja2';

// Conectar ao banco de dados
$conecta = mysqli_connect($localHost, $user, $pass, $banco);

// Verificar e criar a tabela se não existir
$query_verifica_tabela = "SHOW TABLES LIKE 'materials'";
$resultado = mysqli_query($conecta, $query_verifica_tabela);

if (mysqli_num_rows($resultado) == 0) {
    // A tabela não existe, vamos criá-la
    $query_cria_tabela = "
        CREATE TABLE materials (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            image_url VARCHAR(255),
            link VARCHAR(255)
        )
    ";
    mysqli_query($conecta, $query_cria_tabela);
}
?>
