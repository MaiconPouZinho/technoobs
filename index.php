<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Technoobs - Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <style>
  body {
    font-family: 'Montserrat', sans-serif;
    background-color: #f8f9fa;
  }
  .navbar-custom {
    background-color: #008c9e; /* Atualizado */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  .navbar-custom .navbar-brand,
  .navbar-custom .nav-link {
    color: #fffcf7;
  }
  .navbar-custom .btn-outline-success {
    color: #fffcf7;
    border-color: #fff;
  }
  .navbar-custom .btn-outline-success:hover {
    background-color: #fffcf7;
    color: #008c9e; /* Atualizado */
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
    background: linear-gradient(135deg, #008c9e, #006c76); /* Atualizado */
    color: #fff;
    border: none;
    transition: background 0.3s, box-shadow 0.3s;
  }
  .btn-group .btn:hover {
    background: linear-gradient(135deg, #006c76, #008c9e); /* Atualizado */
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

  /* Estilos personalizados para o botão hamburguer */
  .navbar-toggler {
    border-color: #fffcf7; /* Remove a borda padrão */
    color: #fffcf7;
  }
  .navbar-toggler-icon {
    border-radius: 0.25rem; /* Adiciona bordas arredondadas, se desejar */
    width: 30px; /* Define a largura do botão */
    height: 30px; /* Define a altura do botão */
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ccc;
  }
  .navbar-toggler-icon::before {
    font-family: 'Font Awesome 5 Free'; /* Fonte do ícone */
    font-weight: 900; /* Peso da fonte para ícones sólidos */
    color: #fffcf7; /* Cor do ícone */
    font-size: 1.25rem; /* Tamanho do ícone */
    background-color: #ccc;
  }
</style>

</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
      <?php
      // Incluir o arquivo de configuração
      include 'config.php';

      // Número de resultados por página
      $results_per_page = 6;

      // Número da página atual
      $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

      // Calcular o início da página
      $start_from = ($page - 1) * $results_per_page;

      // Consultar o banco de dados
      $sql = "SELECT * FROM materials LIMIT $start_from, $results_per_page";
      $materials = mysqli_query($conecta, $sql);

      // Fechar a conexão com o banco de dados
      mysqli_close($conecta);

      while($row = mysqli_fetch_assoc($materials)):
      ?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?php echo htmlspecialchars($row['image_url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>">
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
    </div>

    <!-- Paginação -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center mt-4">
        <?php
        // Reabrir a conexão com o banco de dados para contar o total de resultados
        include 'config.php';

        $sql = "SELECT COUNT(*) AS total FROM materials";
        $result = mysqli_query($conecta, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_results = $row['total'];

        // Fechar a conexão com o banco de dados
        mysqli_close($conecta);

        // Calcular o número total de páginas
        $total_pages = ceil($total_results / $results_per_page);

        // Gerar links de paginação
        for ($i = 1; $i <= $total_pages; $i++) {
          echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '">';
          echo '<a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a>';
          echo '</li>';
        }
        ?>
      </ul>
    </nav>
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
