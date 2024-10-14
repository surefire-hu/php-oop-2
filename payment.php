<?php
session_start();
include 'classes/cart.php';
include 'classes/creditCard.php';

$user = $_SESSION['user'] ?? null;
$cart = new Cart($user);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $cart->addProduct(['title' => $title, 'price' => $price]);
}

$total = $cart->getTotal();
$discounted = $user && !$user['isGuest'] ? $total * 0.8 : $total;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pay'])) {
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    $creditCard = new CreditCard($cardNumber, $expiryDate, $cvv);

    if ($creditCard->isValid()) {
        $_SESSION['payment_result'] = "Pagamento riuscito!";
    } else {
        $_SESSION['payment_result'] = "Pagamento fallito. Carta scaduta.";
    }
    header('Location: result.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-yellow-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-blue-800">Dettagli del Pagamento</h1>
        <div class="cartoon-card cartoon-shadow max-w-md mx-auto">
            <p class="text-gray-700">Prodotto: <?php echo $title; ?></p>
            <p class="text-gray-700">Prezzo: €<?php echo $price; ?></p>
            <?php if ($user && !$user['isGuest']): ?>
                <p class="text-gray-700">Prezzo Scontato: €<?php echo $discounted; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <div class="mb-4">
                    <label class="block text-gray-700">Numero Carta</label>
                    <input type="text" name="cardNumber" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Data di Scadenza (MM-YYYY)</label>
                    <input type="month" name="expiryDate" class="w-full px-3 py-2 border rounded" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">CVV</label>
                    <input type="text" name="cvv" class="w-full px-3 py-2 border rounded" required>
                </div>
                <button type="submit" name="pay" class="cartoon-button w-full py-2 rounded">Paga</button>
            </form>
        </div>
    </div>
</body>
</html>
