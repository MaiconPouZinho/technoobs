<?php
// Incluir o arquivo de configuração
include 'config.php';

// Handle delete request
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  mysqli_query($conecta, "DELETE FROM materials WHERE id = $id");
  header("Location: admin.php");
  exit();
}

// Handle add/edit request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = mysqli_real_escape_string($conecta, $_POST['title']);
  $description = mysqli_real_escape_string($conecta, $_POST['description']);
  $image_url = mysqli_real_escape_string($conecta, $_POST['image_url']);
  $content = mysqli_real_escape_string($conecta, $_POST['content']); // Novo campo
  $category = mysqli_real_escape_string($conecta, $_POST['category']); // Novo campo

  if (isset($_POST['id']) && $_POST['id'] != '') {
    $id = intval($_POST['id']);
    mysqli_query($conecta, "UPDATE materials SET title='$title', description='$description', image_url='$image_url', content='$content', category='$category' WHERE id = $id");
  } else {
    mysqli_query($conecta, "INSERT INTO materials (title, description, image_url, content, category) VALUES ('$title', '$description', '$image_url', '$content', '$category')");
  }
  header("Location: admin.php");
  exit();
}

$materials = mysqli_query($conecta, "SELECT * FROM materials");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Technoobs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9/We6hsjc5p4KK/VzPU8AUm2bK5ZT/R8QPU9F/t5zfwKf2p5hJw2eK3N7/kF00t" crossorigin="anonymous">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      padding: 20px;
      background-color: #f8f9fa;
    }
    h1, h2 {
      color: #008c9e; /* Atualizado */
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 12px;
      text-align: left;
    }
    th {
      background-color: #008c9e; /* Atualizado */
      color: #fff;
    }
    form {
      margin-bottom: 20px;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    form input, form textarea {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    form button {
      padding: 10px 20px;
      background-color: #008c9e; /* Atualizado */
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    form button:hover {
      background-color: #007b8d; /* Atualizado */
    }
    img {
      max-width: 150px;
      border-radius: 4px;
    }
    .actions a {
      color: #dc3545;
      text-decoration: none;
      margin-left: 10px;
    }
    .actions a:hover {
      text-decoration: underline;
    }
    .actions button {
      background-color: #28a745;
      color: #fff;
      border: none;
      padding: 5px 10px;
      cursor: pointer;
      border-radius: 4px;
      font-size: 14px;
    }
    .actions button:hover {
      background-color: #218838;
    }
    .content {
      max-height: 100px;
      overflow: hidden;
      position: relative;
    }
    .content.expanded {
      max-height: none;
    }
    .show-more {
      display: block;
      text-align: center;
      margin-top: 10px;
      cursor: pointer;
      color: #008c9e; /* Atualizado */
    }
    .show-more:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <h1>Administração de Materiais</h1>
  <form action="admin.php" method="POST">
    <input type="hidden" name="id" id="material-id">
    <div class="mb-3">
      <label for="material-title" class="form-label">Título</label>
      <input type="text" name="title" id="material-title" class="form-control" placeholder="Título" required>
    </div>
    <div class="mb-3">
      <label for="material-description" class="form-label">Descrição</label>
      <textarea name="description" id="material-description" class="form-control" placeholder="Descrição" required></textarea>
    </div>
    <div class="mb-3">
      <label for="material-image-url" class="form-label">URL da Imagem</label>
      <input type="text" name="image_url" id="material-image-url" class="form-control" placeholder="URL da Imagem">
    </div>
    <div class="mb-3">
      <label for="material-content" class="form-label">Conteúdo da Página</label>
      <textarea name="content" id="material-content" class="form-control" placeholder="Conteúdo da Página" required></textarea>
    </div>
    <div class="mb-3">
      <label for="material-category" class="form-label">Categoria</label>
      <input type="text" name="category" id="material-category" class="form-control" placeholder="Categoria">
    </div>
    <button type="submit">Salvar</button>
  </form>

  <h2>Materiais Existentes</h2>
  <table>
    <tr>
      <th>Título</th>
      <th>Descrição</th>
      <th>Imagem</th>
      <th>Conteúdo</th>
      <th>Categoria</th>
      <th>Ações</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($materials)): ?>
      <tr>
        <td><?php echo htmlspecialchars($row['title']); ?></td>
        <td><?php echo htmlspecialchars($row['description']); ?></td>
        <td><img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>"></td>
        <td>
          <div class="content" id="content-<?php echo $row['id']; ?>">
            <?php echo nl2br(htmlspecialchars($row['content'])); ?>
          </div>
          <span class="show-more" onclick="toggleContent(<?php echo $row['id']; ?>)">Ver mais</span>
        </td>
        <td><?php echo htmlspecialchars($row['category']); ?></td>
        <td class="actions">
          <button onclick="editMaterial(<?php echo htmlspecialchars(json_encode($row)); ?>)">Editar</button>
          <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
        </td>
      </tr>
    <?php endwhile; ?>
  </table>

  <script>
    function editMaterial(material) {
      document.getElementById('material-id').value = material.id;
      document.getElementById('material-title').value = material.title;
      document.getElementById('material-description').value = material.description;
      document.getElementById('material-image-url').value = material.image_url;
      document.getElementById('material-content').value = material.content;
      document.getElementById('material-category').value = material.category;
    }

    function toggleContent(id) {
      var content = document.getElementById('content-' + id);
      var showMore = content.nextElementSibling;

      if (content.classList.contains('expanded')) {
        content.classList.remove('expanded');
        showMore.textContent = 'Ver mais';
      } else {
        content.classList.add('expanded');
        showMore.textContent = 'Ver menos';
      }
    }
  </script>
</body>
</html>
