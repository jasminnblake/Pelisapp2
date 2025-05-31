<?php
session_start();

// Si ya estás autenticado, redirige a principal
if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // Aquí debes validar el usuario y contraseña
    if ($usuario === 'usuario' && $password === '1234') {
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Iniciar sesión</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f5f7fa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .login-container {
    background: white;
    padding: 2rem 3rem;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    width: 320px;
  }
  h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    color: #333;
  }
  label {
    display: block;
    margin-bottom: 0.3rem;
    font-weight: 600;
    color: #555;
  }
  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 0.6rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border-color 0.3s ease;
  }
  input[type="text"]:focus, input[type="password"]:focus {
    border-color:rgb(174, 67, 87);
    outline: none;
  }
  button {
    width: 100%;
    padding: 0.7rem;
    background-color: #a83247;
    border: none;
    color: white;
    font-weight: 700;
    font-size: 1rem;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
  button:hover {
    background-color: #a83247;
  }
  .error {
    background-color: #ffe1e1;
    color: #d8000c;
    padding: 0.8rem;
    border-radius: 4px;
    margin-bottom: 1rem;
    text-align: center;
    font-weight: 600;
  }
  .footer-text {
    text-align: center;
    margin-top: 1rem;
    font-size: 0.9rem;
    color: #777;
  }
</style>
</head>
<body>

<div class="login-container">
  <h2>Iniciar Sesión</h2>
  <?php if ($error): ?>
    <div class="error"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <form method="POST" action="login.php">
    <label for="usuario">Usuario</label>
    <input type="text" id="usuario" name="usuario" required autofocus>

    <label for="password">Contraseña</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Entrar</button>
  </form>
  <div class="footer-text">
    &copy; 2025 PELISAPP
  </div>
</div>

</body>
</html>

