<?php
// Vérifier si le formulaire d'inscription a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_de_naissance = $_POST['date_de_naissance'];
    $genre = $_POST['genre'];
    $classe = $_POST['classe'];
    $numero_serie = $_POST['numero_serie'];
    $email_parent = $_POST['email_parent'];
    $moyenne_1 = $_POST['moyenne_1'];
    $moyenne_2 = $_POST['moyenne_2'];
    $moyenne_3 = $_POST['moyenne_3'];

    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=trinome', 'root', '');

    // Vérifier si l'utilisateur existe déjà dans la table des parents
    $requete_verif = $connexion->prepare('SELECT * FROM eleve WHERE numero_serie = :numero_serie');
    $requete_verif->execute(array(
        'numero_serie' => $numero_serie,
    ));
    $resultat_verif = $requete_verif->fetch();

    if ($resultat_verif) {
        // L'utilisateur existe déjà, afficher un message d'erreur modal
        echo "<script>alert('L\'utilisateur existe déjà.');
        window.location.href = '../Pages/in_et.html';
        </script>";
        exit();
    } else {
        // Insérer l'utilisateur dans la table des parents
        $requete_insertion = $connexion->prepare('INSERT INTO eleve (nom, prenom, date_de_naissance, genre, classe, numero_serie, email_parent, moyenne_1, moyenne_2, moyenne_3) VALUES (:nom, :prenom, :date_de_naissance, :genre, :classe, :numero_serie, :email_parent, :moyenne_1, :moyenne_2, :moyenne_3)');
        $requete_insertion->execute(array(
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':date_de_naissance' => $date_de_naissance,
            ':genre' => $genre,
            ':classe' => $classe,
            ':numero_serie' => $numero_serie,
            ':email_parent' => $email_parent,
            ':moyenne_1' => $moyenne_1,
            ':moyenne_2' => $moyenne_2,
            ':moyenne_3' => $moyenne_3
        ));

        // Afficher un message de succès modal
        echo "<script>alert('Inscription réussie.');
        window.location.href = '../Pages/in_et.html';
        </script>";
        exit();
    }
}
?>
