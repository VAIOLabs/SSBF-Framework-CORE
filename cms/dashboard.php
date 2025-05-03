<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<?php
$pagesRoot = __DIR__ . '/../pages'; // Przechodzimy do folderu 'pages' z folderu 'cms'
$pages = [];

// Przeszukujemy każdy folder w /pages
foreach (scandir($pagesRoot) as $dir) {
    if ($dir === '.' || $dir === '..') continue;
    $fullPath = $pagesRoot . '/' . $dir;

    if (is_dir($fullPath)) {
        $indexHtml = $fullPath . '/index.html';
        if (file_exists($indexHtml)) {
            // Dodajemy stronę do listy, ale nie całą zawartość, tylko nazwę
            $pages[] = [
                'name' => $dir,
                'path' => $dir . '/index.html'
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Dashboard CMS</title>
  <style>
    body { font-family: sans-serif; padding: 2rem; background: #f0f0f0; }
    .page { background: #fff; padding: 1rem; margin-bottom: 1rem; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.1); }
    html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f7f9fc;
  color: #333;
}

.layout {
  display: flex;
  height: 100vh; /* Pełna wysokość widoku */
  overflow: hidden;
}

.sidebar {
  width: 250px;
  background-color: #1e2a38;
  color: white;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  padding: 1.5rem 1rem;
  box-sizing: border-box;
  height: 100vh; /* Najważniejsze: pełna wysokość przeglądarki */
  position: relative;
  flex-shrink: 0;
}

.sidebar h2 {
  font-size: 1.5rem;
  margin: 0;
  text-align: center;
  color: #ffffff;
}

.sidebar nav ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar nav ul li {
  margin-bottom: 1rem;
}

.sidebar nav ul li a {
  color: #cfd8e3;
  text-decoration: none;
  font-weight: 500;
  font-size: 1.1rem;
  padding: 0.5rem 1rem;
  display: block;
  border-radius: 6px;
  transition: background-color 0.2s, color 0.2s;
}

.sidebar nav ul li a:hover {
  background-color: #2e3d4e;
  color: #fff;
}

.main {
  flex: 1;
  padding: 2rem;
  overflow-y: auto; /* Jeśli treści dużo, scrolluj tylko main */
}

  </style>
</head>
<body>
      <div class="layout">
    <aside class="sidebar">
      <h2>Panel CMS</h2>
      <nav>
        <ul>
          <li><a href="index.php">🏠 Dashboard</a></li>
          <li><a href="logout.php">Logout</a></li>

        </ul>
      </nav>
    </aside>
        <main class="main">
       <h1>Witaj, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
   <h1>📄 Wybierz stronę do edycji</h1>
  <?php foreach ($pages as $page): ?>
    <div class="page">
      <?= htmlspecialchars($page['name']) ?> -
      <a href="editor.php?page=<?= urlencode($page['path']) ?>">Edytuj</a>
    </div>
  <?php endforeach; ?>
        </main>

</body>
</html>
