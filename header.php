<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopeefy</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Le fichier CSS personalisable -->
    <link rel="stylesheet" href="style.css">

    <?php
    // require functions
    require ('functions.php');
    
    //Vérifier si l'utilisateur est connecté
    if(isset($_SESSION['Id_User_Connected'])){
        include "./database/helper.php";
        //Obtenir les données de l'utilisateur connecté
        $user = get_user_info($db->con, $_SESSION['Id_User_Connected']);
    }
   
    ?>

</head>
<body>

    <!-- La navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="index.php">Shopeefy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto font-rubik">
                <li class="nav-item active">
                    <a class="nav-link" href="#">On Sale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products <i class="fas fa-chevron-down"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category <i class="fas fa-chevron-down"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Coming Soon</a>
                </li>
            </ul>
            <form action="#" class="font-size-14 font-rale">
                <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                    <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
                </a>
                </a>
                <a href="<?php echo isset($_SESSION['Id_User_Connected']) ? "logout.php" : "login.php" ?>"  class="px-3 border-right border-left text-dark"><?php echo isset($user['first_name']) ? " Déconnexion" : 'Connexion' ?></a>
                <?php if(isset($user['first_name'])): ?>
                    <!-- Lien vers la page de profil -->
                    <a href="profil_page.php" class="px-3 border-right text-dark"><?php echo $user['first_name']." ".$user['last_name']; ?></a>
                <?php else: ?>
                    <a href="inscription.php" class="px-3 border-right text-dark">Inscription</a>
                <?php endif; ?>
            </form>
        </div>
    </nav>
    <!-- !La navigation -->

</header>
<main id="main-site">