<?php
// Récupérer les données du formulaire
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Connexion à la base de données
$connexion = new PDO('mysql:host=localhost;dbname=trinome', 'root', '');

// Requête pour vérifier si l'utilisateur est un parent
$requete_parent = $connexion->prepare('SELECT * FROM parent WHERE email = :email AND mot_de_passe = :mot_de_passe');
$requete_parent->execute(array('email' => $email, 'mot_de_passe' => $mot_de_passe));
$resultat_parent = $requete_parent->fetch();

// Requête pour vérifier si l'utilisateur est un administrateur
$requete_admin = $connexion->prepare('SELECT * FROM admi WHERE email = :email AND mot_de_passe = :mot_de_passe');
$requete_admin->execute(array('email' => $email, 'mot_de_passe' => $mot_de_passe));
$resultat_admin = $requete_admin->fetch();

// Vérifier les résultats et rediriger en conséquence
if ($resultat_parent) {
    // L'utilisateur est un parent
    header('Location: ../Pages/ac_pa.html');
    exit();
} elseif ($resultat_admin) {
    // L'utilisateur est un administrateur
    header('Location: ../Pages/ac_ad.html');
    exit();
} else{ 
    echo "<script>
        alert('Cet utilisateur n'existe pas');
        window.location.href = '../Pages/in_ad.php';
     </script>";}
?>
