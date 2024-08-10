<?php
// Incluir o arquivo de configuração
include 'config.php';

// Obter a consulta de busca
$query = isset($_GET['query']) ? mysqli_real_escape_string($conecta, $_GET['query']) : '';

// Consultar o banco de dados
$sql = "SELECT * FROM materials WHERE title LIKE '%$query%' OR description LIKE '%$query%'";
$search_results = mysqli_query($conecta, $sql);

if (!$search_results) {
    die('Erro na consulta: ' . mysqli_error($conecta));
}

// Fechar a conexão com o banco de dados
mysqli_close($conecta);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultados da Busca - Technoobs</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f8f9fa;
    }
    .navbar-custom {
      background-color: #008c9e;
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
      color: #008c9e;
    }
    .card {
      border: none;
      border-radius: 12px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      height: 100%;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }
    .card-img-top {
      height: 225px;
      object-fit: cover;
    }
    .card-body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 1.5rem;
      flex: 1;
    }
    .card-title {
      font-size: 1.5rem;
      margin-bottom: 0.5rem;
      font-weight: 700;
    }
    .card-text {
      font-size: 1rem;
      color: #333;
      margin-bottom: 1rem;
      flex-grow: 1;
    }
    .btn-group .btn {
      font-size: 0.875rem;
      padding: 0.5rem 1.25rem;
      border-radius: 25px;
      background: linear-gradient(135deg, #008c9e, #006d6d);
      color: #fff;
      border: none;
      transition: background 0.3s, box-shadow 0.3s;
    }
    .btn-group .btn:hover {
      background: linear-gradient(135deg, #006d6d, #008c9e);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .btn-outline-secondary {
      border-color: #ccc;
      color: #333;
    }
    .btn-outline-secondary:hover {
      background-color: #f8f9fa;
      color: #000;
    }
    footer {
      background-color: #008c9e;
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
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom navbar-dark">
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
        </ul>
        <form class="d-flex" role="search" action="search.php" method="GET">
          <input class="form-control me-2" type="search" name="query" placeholder="Buscar..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container my-4">
    <h1 class="my-4">Resultados da Busca</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
      <?php if (mysqli_num_rows($search_results) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($search_results)): ?>
          <div class="col">
            <div class="card shadow-sm">
              <img src="<?php echo htmlspecialchars(!empty($row['image_url']) ? $row['image_url'] : 'default-image.jpg'); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h5>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="material.php?id=<?php echo $row['id']; ?>" class="btn btn-sm">Saiba Mais</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>Nenhum resultado encontrado para sua busca.</p>
      <?php endif; ?>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 Technoobs. Todos os direitos reservados.</p>
    <div class="social-icons">
      <a href="https://www.instagram.com/technoobs_/" target="_blank" title="Instagram">
        <i class="fab fa-instagram"></i>
      </a>
      <!-- Adicione mais ícones sociais aqui, se necessário -->
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
