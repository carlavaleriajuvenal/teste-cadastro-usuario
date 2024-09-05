<?php 
// Meu banco de dados XAMPP
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro_usuarios";

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Mostrando uma mensagem para identificar se a conexão deu certo
if ($conn->connect_error) {
    die("<p>Erro na conexão com o banco de dados: " . $conn->connect_error . "</p>");
} else {
    echo "<p>Conexão com o banco de dados estabelecida com sucesso.</p>";
}

// Receber os dados do formulário HTML
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

// Validando os dados 
$errors = [];

if (empty($nome)) {
    $errors[] = "O nome é obrigatório.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "O email é inválido ou está vazio.";
}

if (empty($senha)) {
    $errors[] = "A senha é obrigatória.";
}

// Se houver erros, retornar mensagem de erro
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    $conn->close();
    exit;
}

// Inserir os dados na tabela
$sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $senha);

if ($stmt->execute()) {
    echo "<p>Cadastro realizado com sucesso!</p>";
    $tempo_espera = 5;
    $url_redirecionamento = 'index.html';

    // Redirecionar após alguns segundos
    header("refresh:$tempo_espera;url=$url_redirecionamento");
} else {
    echo "<p>Erro ao realizar o cadastro: " . $stmt->error . "</p>";

}

// Fechar a conexão com o banco de dados
$stmt->close();
$conn->close();
?>
