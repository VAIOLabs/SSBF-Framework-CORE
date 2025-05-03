 <?php
session_start();

$correctUsername = "admin";
$correctPassword = "1234"; // w prawdziwych systemach używaj hashy (np. password_hash)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $correctUsername && $password === $correctPassword) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Nieprawidłowe dane logowania'); window.location.href='index.php';</script>";
        exit();
    }
}
?>
