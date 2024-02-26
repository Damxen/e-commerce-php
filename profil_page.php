<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header('Location: login.php');
    exit;
}

require 'database/update_profil.php';

$firstName = '';
$lastName = '';
$email = '';

$userID = $_SESSION['userID'];
$query = "SELECT first_name, last_name, email_address FROM user WHERE user_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param('i', $userID);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $email = $row['email_address'];
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
    <h1>Modifier le Profil</h1>
    <form action="update_profile.php" method="post">
        <label for="firstName">Prénom:</label><br>
        <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>"><br>
        
        <label for="lastName">Nom:</label><br>
        <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        
        
        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
