<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<?php
// Odczytujemy stronę do edycji
$pagePath = $_GET['page'] ?? '';
$pageContent = '';

if ($pagePath && file_exists(__DIR__ . '/../pages/' . $pagePath)) {
    $htmlContent = file_get_contents(__DIR__ . '/../pages/' . $pagePath);

    preg_match_all('/<template id="(.*?)">(.*?)<\/template>/s', $htmlContent, $matches);

    $templates = [];
    foreach ($matches[1] as $index => $templateId) {
        $templates[$templateId] = json_decode($matches[2][$index], true);
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Edycja strony</title>
  <style>
<style>
  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f7f9fc;
    color: #333;
    margin: 0;
    padding: 2rem;
  }

  h1 {
    text-align: center;
    font-size: 1.8rem;
    margin-bottom: 2rem;
    color: #1e2a38;
  }

  h3 {
    margin-top: 0;
    color: #1e2a38;
    font-size: 1.2rem;
  }

  form {
    max-width: 800px;
    margin: auto;
  }

  .content {
    background: #fff;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: box-shadow 0.2s;
  }

  .content:hover {
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
  }

  .field {
    margin-bottom: 1.2rem;
  }

  .field label {
    display: block;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #333;
  }

  .field input,
  .field textarea {
    width: 100%;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fefefe;
    transition: border-color 0.2s, box-shadow 0.2s;
  }

  .field input:focus,
  .field textarea:focus {
    outline: none;
    border-color: #0077ff;
    box-shadow: 0 0 0 3px rgba(0, 119, 255, 0.1);
  }

  button[type="submit"] {
    display: block;
    margin: 2rem auto 0 auto;
    background-color: #0077ff;
    color: white;
    padding: 0.75rem 2rem;
    font-size: 1rem;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.2s;
  }

  button[type="submit"]:hover {
    background-color: #005fce;
  }

  @media (max-width: 600px) {
    body {
      padding: 1rem;
    }

    form {
      width: 100%;
    }
  }
html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f7f9fc;
  color: #333;
}

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
      <h1>Edytuj stronę: <?= htmlspecialchars($pagePath) ?></h1>
      <form method="POST" action="save.php?page=<?= urlencode($pagePath) ?>">
        <?php foreach ($templates as $templateId => $jsonData): ?>
          <div class="content">
            <h3>Edytuj <?= htmlspecialchars($templateId) ?></h3>
            <?php foreach ($jsonData as $key => $value): ?>
              <div class="field">
                <label for="<?= htmlspecialchars($templateId . '_' . $key) ?>"><?= htmlspecialchars($key) ?></label>
                <input type="text" name="templates[<?= htmlspecialchars($templateId) ?>][<?= htmlspecialchars($key) ?>]" id="<?= htmlspecialchars($templateId . '_' . $key) ?>" value="<?= htmlspecialchars($value) ?>">
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
        <button type="submit">Zapisz zmiany</button>
      </form>
    </main>
  </div>
</body>

</html>
