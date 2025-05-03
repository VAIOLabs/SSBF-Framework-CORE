 <?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Logowanie</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <form action="login.php" method="POST" class="login-form">
      <h1>Azura CMS</h1>
      <hr>
      <h2>Zaloguj się</h2>
      <input type="text" name="username" placeholder="Nazwa użytkownika" required>
      <input type="password" name="password" placeholder="Hasło" required>
      <button type="submit">Zaloguj</button>
    </form>
  </div>
</body>
</html>
