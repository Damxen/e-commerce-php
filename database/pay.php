<?php
// Inclure les fichiers nécessaires et initialiser les objets
require_once('DBController.php');
require_once('Product.php');
require_once('Cart.php');

// Initialiser un objet DBController
$db = new DBController();

$product = new Product($db);
$Cart = new Cart($db);

// Traitement des actions sur le panier
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
    }

    if (isset($_POST['wishlist-submit'])) {
        $Cart->saveForLater($_POST['item_id']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pay.css">
    <title>Shopeefy</title>
</head>
<body>
    <!-- Le panier -->
    <section id="cart" class="py-3 mb-5">
        <!-- Contenu de votre panier ici -->
    </section>
    <!-- Fin du panier -->

    <!-- Page de paiement -->
    <section id="payment" class="py-3 mb-5">
        <!-- Page de paiement -->
<section id="payment" class="py-3 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Paiement</h2>
                <form action="process_payment.php" method="post">
                    <div class="form-group">
                        <label for="card_number">Numéro de carte:</label>
                        <input type="text" class="form-control" id="card_number" name="card_number" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry_date">Date d'expiration (MM/YY):</label>
                        <input type="text" class="form-control" id="expiry_date" name="expiry_date" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" id="cvv" name="cvv" required>
                    </div>
                    <div class="form-group">
                        <label for="card_holder_name">Nom du titulaire de la carte:</label>
                        <input type="text" class="form-control" id="card_holder_name" name="card_holder_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Payer</button>
                </form>
            </div>
        </div>
    </div>
</section>

    </section>

</body>
</html>
