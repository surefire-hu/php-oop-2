<?php
session_start();

$paymentResult = $_SESSION['payment_result'] ?? 'Nessun risultato disponibile.';
unset($_SESSION['payment_result']);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato del Pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-yellow-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-800">Risultato del Pagamento</h1>
        <div class="cartoon-card cartoon-shadow max-w-md mx-auto">
            <p class="text-gray-700 text-center"><?php echo $paymentResult; ?></p>
            <div class="text-center mt-4">
                <a href="index.php" class="cartoon-button py-2 px-4 rounded">Torna al Negozio</a>
            </div>
        </div>
    </div>
</body>
</html>
