<?php
session_start();
require 'helper.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer et valider les entrées du formulaire
    $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        
    $query = "UPDATE user SET first_name = ?, last_name = ?, email_address = ? WHERE user_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param('sssi', $firstName, $lastName, $email, $_SESSION['userID']);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "Les informations du profil ont été mises à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du profil ou aucune modification apportée.";
    }
    
    $stmt->close();
    $con->close();
    
    // header('Location: profile.php');
    // exit;
} else {
    header('Location: profil_page.php');
    exit;
}
?>