<?php
// Connexion à la base de données avec PDO
$serveur = 'localhost'; // Remplacez localhost par l'adresse du serveur MySQL
$utilisateur = 'root'; // Remplacez nom_utilisateur par votre nom d'utilisateur MySQL
$mot_de_passe = ''; // Remplacez mot_de_passe par votre mot de passe MySQL
$base_de_donnees = 'trinome'; // Remplacez nom_de_la_base_de_donnees par le nom de votre base de données

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $mot_de_passe);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion a la base de donnees : " . $e->getMessage();
    exit();
}

// Vérifier si le formulaire d'inscription doit être affiché ou non
$requete = $connexion->prepare("SELECT COUNT(*) FROM admi");
$requete->execute();
$nombre_inscriptions = $requete->fetchColumn();

$afficher_formulaire = ($nombre_inscriptions < 2);

// Traitement du formulaire d'inscription
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Vérifier si l'utilisateur est déjà inscrit
    $requete = $connexion->prepare("SELECT COUNT(*) FROM admi WHERE email = :email");
    $requete->bindParam(':email', $email);
    $requete->execute();
    $nombre_utilisateurs = $requete->fetchColumn();

    if ($nombre_utilisateurs === "0") {
        // Insérer les données de l'utilisateur dans la base de données
        $requete = $connexion->prepare("INSERT INTO admi (nom, prenom, email, mot_de_passe) VALUES (:nom, :prenom, :email, :mot_de_passe)");
        $requete->bindParam(':nom', $nom);
        $requete->bindParam(':prenom', $prenom);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':mot_de_passe', $mot_de_passe);
        $requete->execute();

        $nombre_inscriptions++; // Augmenter le compteur d'inscriptions

        // Vérifier si le formulaire doit être masqué
        if ($nombre_inscriptions >= 2) {
            $afficher_formulaire = false;
        }

        // Afficher un message de succès
        echo "<script>
        alert('Inscription effectuee avec succes !');
        window.location.href = 'in_ad.php';
        </script>";
    } else {
        // Afficher un message d'erreur si l'utilisateur est déjà inscrit
        echo "<script>alert('L\'utilisateur est deja inscrit. Veuillez reessayer avec un autre e-mail.');
        window.location.href = 'in_ad.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/style.css">
    <title>Inscription admi</title>
</head>
<body>
<header>
<div class="container text-center">
  <div class="row align-items-start">
    
    <div class="col">
      <div>
      <a href="index.php"> <img src="../Images/logo.png" alt="" width="60"></a>
        </div>
    </div>
    <div class="col">
     <div>
     <a href="form.php"><img src="../Images/faso.png" alt="" width="75" height="auto"></a>
    </div>
    </div>
    <div class="col">
      <div>
        <img src="../Images/signe.png" alt=""width="60">
        </div> 
    <p style="margin-top: 20px;">Déconnexion</p>
    </div>
    </div> 
    </div>
  </div>
</header>

<section class="pixel"> <br>

<?php if ($afficher_formulaire) : ?>
    <div class="col clas">
        <button type="button" class="btn btn-successbtn btn-success">
            Inscription
        </button>
    </div>
    <div id="form-main">
        <div id="form-div">
            <form class="form" id="form1" method="post" action="">
                <div class="connecter">Inscription</div>
                <input type="nom" id="nom" name="nom" required id="email" placeholder="Nom">
                <input type="prenom" id="prenom" name="prenom" required id="email" placeholder="Prénom">
                <p class="email">
                    <input name="email" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Email" id="email" />
                </p>
                <p class="mot_de_passe">
                    <input name="mot_de_passe" type="text" class="validate[required,custom[email]] feedback-input" id="mot_de_passe" placeholder="Mot de passe" />
                </p>
                <div class="submit">
                    <input type="submit" value="Inscription" id="button-blue"/>
                    <div class="ease"></div>
                </div>
            </form>
        </div>
    </div>
<?php else : ?>
    <h1 class="messe" style="color:red; text-align:center;">Le nombre maximal d'inscriptions est atteint.</h1>
<?php endif; ?>
<h2 style="border;1px solid black;background-color:blue;width:100px;border-radius:10px;margin-left:600px;margin-top:100px;text-align:center;padding-bottom:5px;"><a href="../index.html" style="color:white; text-decoration:none;">retour</a></h2>
<footer style="position:relative;top:365px;">
    &copy; code4berry. Tous droits réservés.
</footer>

</body>
</html>
