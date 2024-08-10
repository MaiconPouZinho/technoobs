<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Technoobs - Quem Somos</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> <!-- Fonte Montserrat -->
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .navbar-custom {
      background-color: #008c9e; /* Atualizado para a nova cor */
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      padding: 10px 20px; /* Ajuste o padding para diminuir o espaço dentro da navbar */
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
      color: #008c9e; /* Atualizado para a nova cor */
    }

    .container {
      max-width: 1200px;
      margin: 90px auto 79px; /* Ajuste a margem superior para diminuir o espaço abaixo do cabeçalho */
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .content {
      text-align: center;
    }

    .content h1 {
      margin-bottom: 20px;
      color: #008c9e; /* Atualizado para a nova cor */
    }

    .content p {
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    footer {
      background-color: #008c9e; /* Atualizado para a nova cor */
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
      .navbar-toggler {
        display: block;
      }

      .navbar-nav {
        display: none;
      }

      .navbar-collapse.show .navbar-nav {
        display: flex;
        flex-direction: column;
        width: 100%;
        background-color: #008c9e; /* Atualizado para a nova cor */
      }

      .navbar-nav .nav-item {
        margin: 10px 0;
      }
    }
  </style>
</head>
<body>
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
         
          <!-- Adicione mais itens de navegação conforme necessário -->
        </ul>
        <form class="d-flex" role="search" action="search.php" method="GET">
          <input class="form-control me-2" type="search" name="query" placeholder="Buscar..." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="content">
      <h1>Quem Somos</h1>
      <p>Bem-vindo à Technoobs! Somos uma equipe dedicada a fornecer as melhores soluções tecnológicas e informações atualizadas sobre o mundo da tecnologia. Nosso objetivo é ajudar você a entender e utilizar as ferramentas tecnológicas de maneira eficaz.</p>
      <p>Na Technoobs, acreditamos que a tecnologia pode transformar vidas e negócios. Estamos comprometidos em fornecer conteúdo de alta qualidade, tutoriais práticos e as últimas novidades em tecnologia. Nossa equipe é composta por especialistas apaixonados por inovação e por compartilhar conhecimento.</p>
      <p>Obrigado por visitar nosso site. Esperamos que você encontre as informações que procura e que nossos recursos sejam úteis para você. Sinta-se à vontade para entrar em contato conosco para qualquer dúvida ou sugestão.</p>
      <p>Junte-se a nós nessa jornada tecnológica e torne-se um expert com a Technoobs!</p>
    </div>
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
