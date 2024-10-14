<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include 'classes/db.php';

function renderProductCard($product) {
    $details = $product->getDetails();
    $icon = '';
    if ($details['category'] === 'Cani') {
        $icon = '<i class="fa-solid fa-dog"></i>';
    } elseif ($details['category'] === 'Gatti') {
        $icon = '<i class="fa-solid fa-cat"></i>';
    }

    $description = $product->getDescription();

    return "
    <div class='cartoon-card cartoon-shadow m-4 max-w-sm'>
        <img class='w-full h-40 object-cover' src='{$details['image']}' alt='{$details['title']}'>
        <div class='p-4'>
            <h2 class='text-lg font-semibold text-gray-800'>{$details['title']}</h2>
            <p class='text-gray-600 mt-2'>€{$details['price']}</p>
            <p class='text-gray-500 mt-1'>Categoria: $icon</p>
            <p class='text-gray-500'>Tipo: {$details['type']}</p>
            <p class='text-gray-500 mt-2'>Descrizione: $description</p>
            <form method='POST' action='payment.php'>
                <input type='hidden' name='title' value='{$details['title']}'>
                <input type='hidden' name='price' value='{$details['price']}'>
                <button type='submit' class='cartoon-button mt-4 py-2 px-4 rounded flex items-center'>
                    <i class='fa-solid fa-cart-plus mr-2'></i> Acquista
                </button>
            </form>
        </div>
    </div>
    ";
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Negozio Online</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/63e420e540.js" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-yellow-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center my-4 text-gray-800">Prodotti per Cani</h2>
        <div class="flex flex-wrap justify-center">
            <?php
            foreach ($products as $product) {
                if ($product->getDetails()['category'] === 'Cani') {
                    echo renderProductCard($product);
                }
            }
            ?>
        </div>

        <h2 class="text-3xl font-bold text-center my-4 text-gray-800">Prodotti per Gatti</h2>
        <div class="flex flex-wrap justify-center">
            <?php
            foreach ($products as $product) {
                if ($product->getDetails()['category'] === 'Gatti') {
                    echo renderProductCard($product);
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
