<?php
// Vérifier si le formulaire d'inscription a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $telephone = $_POST['telephone'];

    // Connexion à la base de données
    $connexion = new PDO('mysql:host=localhost;dbname=trinome', 'root', '');

    // Vérifier si l'utilisateur existe déjà dans la table des parents
    $requete_verif = $connexion->prepare('SELECT * FROM parent WHERE email = :email AND mot_de_passe = :mot_de_passe');
    $requete_verif->execute(array(
        'email' => $email,
        'mot_de_passe' => $mot_de_passe
    ));
    $resultat_verif = $requete_verif->fetch();

    if ($resultat_verif) {
        // L'utilisateur existe déjà, afficher un message d'erreur modal
        echo '<script>alert("L\'utilisateur existe deja.");</script>';
        echo '<script>window.location.href = "../Pages/in_pa.html";</script>';
        exit();
    } else {
        // Insérer l'utilisateur dans la table des parents
        $requete_insertion = $connexion->prepare('INSERT INTO parent (nom, prenom, email, mot_de_passe, telephone) VALUES (:nom, :prenom, :email, :mot_de_passe, :telephone)');
        $requete_insertion->execute(array(
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'mot_de_passe' => $mot_de_passe,
            'telephone' => $telephone
        ));

        // Afficher un message de succès modal
        echo '<script>alert("Inscription reussie.");</script>';
        echo '<script>window.location.href = "../Pages/in_pa.html";</script>';
        exit();
    }
}
?>
