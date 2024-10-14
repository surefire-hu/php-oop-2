<?php
session_start();

if (!isset($_SESSION['registeredUsers'])) {
    $_SESSION['registeredUsers'] = [];
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        
        if (!isset($_SESSION['registeredUsers'][$name])) {
            $_SESSION['registeredUsers'][$name] = $password;
            header('Location: login.php');
            exit();
        } else {
            $error = 'Nome utente già registrato.';
        }
    } elseif (isset($_POST['guest'])) {
        $_SESSION['user'] = [
            'name' => 'Ospite',
            'isGuest' => true
        ];
        header('Location: index.php');
        exit();
    } elseif (isset($_POST['login'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        if (isset($_SESSION['registeredUsers'][$name]) && $_SESSION['registeredUsers'][$name] === $password) {
            $_SESSION['user'] = [
                'name' => $name,
                'isGuest' => false
            ];
            header('Location: index.php');
            exit();
        } else {
            $error = 'Nome o password non corretti.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-yellow-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-800">Accedi o Registrati</h1>
        <div class="cartoon-card cartoon-shadow max-w-md mx-auto">
            <?php if ($error): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-4">
                    <label class="block text-gray-700">Nome</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border rounded" required>
                </div>
                <button type="submit" name="login" class="cartoon-button w-full py-2 rounded">Accedi</button>
                <button type="submit" name="register" class="cartoon-button w-full py-2 rounded mt-4">Registrati</button>
            </form>
            <form method="POST" action="" class="mt-4">
                <button type="submit" name="guest" class="cartoon-button w-full py-2 rounded">Accedi come Ospite</button>
            </form>
        </div>
    </div>
</body>
</html>
