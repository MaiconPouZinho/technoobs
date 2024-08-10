<?php
// Incluir o arquivo de configuração
include 'config.php';

// Obter o ID do material a ser exibido e validar
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Usar uma declaração preparada para evitar SQL Injection
$stmt = $conecta->prepare("SELECT * FROM materials WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Verificar se o material foi encontrado
if ($row = $result->fetch_assoc()) {
    $title = htmlspecialchars($row['title']);
    $description = htmlspecialchars($row['description']);
    $image_url = htmlspecialchars($row['image_url']);
    $link = htmlspecialchars($row['link']);
    $category = htmlspecialchars($row['category']);
    $content = nl2br(htmlspecialchars($row['content'])); // Exibir conteúdo com quebras de linha preservadas
} else {
    echo "Material não encontrado.";
    exit();
}

// Fechar a conexão com o banco de dados
$stmt->close();
$conecta->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Technoobs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .navbar-custom {
            background-color: #008c9e; /* Atualizado */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff;
        }
        .navbar-custom .btn-outline-success {
            color: #fff;
            border-color: #fff;
        }
        .navbar-custom .btn-outline-success:hover {
            background-color: #fff;
            color: #008c9e; /* Atualizado */
        }
        .container {
            max-width: 800px;
            margin: 100px auto 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 60px;
        }
        .container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .container h1 {
            margin: 20px 0;
            font-size: 2.5em;
            color: #333;
            text-align: center;
        }
        .container p {
            margin: 20px 0;
            line-height: 1.6;
            color: #555;
            text-align: justify;
        }
        .container .content {
            margin: 20px 0;
            white-space: pre-line;
        }
        .container a.saiba-mais {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease;
            text-align: center;
            margin-top: 20px;
        }
        .container a.saiba-mais:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: #008c9e; /* Atualizado */
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }
        footer a {
            color: #ffd700;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        footer .social-icons {
            margin-top: 10px;
        }
        footer .social-icons a {
            color: #ffd700;
            font-size: 24px;
            margin: 0 10px;
            transition: color 0.3s ease;
        }
        footer .social-icons a:hover {
            color: #fff;
        }
        @media (max-width: 768px) {
            .navbar-custom {
                background-color: #008c9e; /* Atualizado */
            }
            .navbar-custom .navbar-brand,
            .navbar-custom .nav-link {
                color: #fff;
            }
            .navbar-custom .btn-outline-success {
                color: #fff;
                border-color: #fff;
            }
            .navbar-custom .btn-outline-success:hover {
                background-color: #fff;
                color: #008c9e; /* Atualizado */
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="quemsomos.php">Quem Somos</a>
                        </li>
                        <!-- Adicione mais itens de navegação conforme necessário -->
                    </ul>
                    <form class="d-flex" role="search" action="search.php" method="GET">
                        <input class="form-control me-2" type="search" name="query" placeholder="Buscar..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <img src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>">
        <h1><?php echo $title; ?></h1>
        <p><?php echo $description; ?></p>
        <div class="content">
            <?php echo $content; ?>
        </div>
        <?php if ($link): ?>
            <a href="<?php echo $link; ?>" class="saiba-mais" target="_blank">Saiba Mais</a>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Technoobs. Todos os direitos reservados.</p>
        <div class="social-icons">
            <a href="https://www.instagram.com/technoobs_/" target="_blank" title="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
