<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../Styles/ac_ad.css">
</head>
<body >
  <header class="back">
    <div class="container">
      <nav class="nav-bar">
        <div class="toggle-menu">
          <div class="line line1"></div>
          <div class="line line2"></div>
          <div class="line line3"></div>
        </div>
        <ul class="nav-list">
          <li class="nav-list-item centre">
            <a href="" class="nav-link">
              <img src="../Images/logo.jpeg" width="60" height="auto" class="centre">
            </a>
          </li>
          <li class="nav-list-item">
            <p class="nav-link centre"> Accueil</p>
          </li>
          <li class="nav-list-item">
            <img src="../Images/plus.png" width="40" height="auto"><a href="in_et.html" class="nav-link logo">Ajouter un Etudiant</a>
          </li>
          <li class="nav-list-item">
            <img src="../Images/student.png" width="30" height="auto"><a href="list_et.php" class="nav-link A3">Gestion des Etudiants</a>
          </li>
          <li class="nav-list-item">
            <img src="../Images/settin2.png" width="30" height="auto" class="im"><p class="nav-link A1 log">Parametre et Securite</p>
          </li>
          <li class="nav-list-item">
            <img src="../Images/user.png" width="40" height="auto"><a href="in_pa.html" class="nav-link logo">Ajouter un Parent</a>
          </li>
          <li class="nav-list-item">
            <img src="../Images/user.png" width="40" height="auto"><a href="" class="nav-link logo">Gestion des Parents</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="deconnexion">
    <img src="../Images/logout.png" alt="logout image"><span><a href="../index.html"> Deconnexion</a></span>
  </div>
  
  <?php
    // Informations de connexion à la base de données
    $serveur = 'localhost';
    $utilisateur = 'root';
    $motdepasse = '';
    $basededonnees = 'trinome';

    try {
        // Connexion à la base de données avec PDO
        $connexion = new PDO("mysql:host=$serveur;dbname=$basededonnees", $utilisateur, $motdepasse);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour extraire les données de la table
        $requete = "SELECT * FROM parent";
        $resultat = $connexion->query($requete);

        // Vérifier si la requête a renvoyé des résultats
        if ($resultat->rowCount() > 0) {
            // Création du tableau HTML pour afficher les données
            echo '<h1 ><table style="border:1px solid black; border-collapse:collapse;position:relative;bottom:500px;left:350px;">';
            echo '<tr>';
            echo '<th style="border:1px solid black;color:red;">ID</th>';
            echo '<th style="border:1px solid black;color:red;">Nom</th>';
            echo '<th style="border:1px solid black;color:red;">Prénom</th>';
            echo '<th style="border:1px solid black;color:red;">Email</th>';
            echo '<th style="border:1px solid black;color:red;">Mot_de_passe</th>';
            echo '<th style="border:1px solid black;color:red;">telephone</th>';
            echo '<th style="border:1px solid black;color:red;" colspan="3">Action</th>'; 

            // Parcourir les lignes de résultats et afficher les données dans le tableau
            while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td style="border:1px solid black">'.$ligne['id'].'</td>';
                echo '<td style="border:1px solid black">'.$ligne['nom'].'</td>';
                echo '<td style="border:1px solid black">'.$ligne['prenom'].'</td>';
                echo '<td style="border:1px solid black">'.$ligne['email'].'</td>';
                echo '<td style="border:1px solid black">'.$ligne['mot_de_passe'].'</td>';
                echo '<td style="border:1px solid black">'.$ligne['telephone'].'</td>';
                echo '<td style="border:1px solid black"><a href="" style="color:black;text-decoration:none;">details</a></td>';
                echo '<td style="border:1px solid black"><a href="" style="color:black;text-decoration:none;">modifier</a></td>';
                echo '<td style="border:1px solid black;"><a href="" style="color:black;text-decoration:none;">supprimer</a></td>';
                echo '</tr>';
            }

            echo '</table></h1>';
        } else {
            echo "La table est vide.";
        }

    } catch(PDOException $e) {
        echo "Erreur lors de la connexion a la base de donnees : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données
    $connexion = null;
  ?>
  
  <footer class="foot">
    <p>Copyright © 2023 Code4berry. All rights reserved.</p>
  </footer>
  <script>
    const toggleButton = document.querySelector('.toggle-menu');
    const navBar = document.querySelector('.nav-bar');
    toggleButton.addEventListener('click', () => {
      navBar.classList.toggle('toggle');
    });
  </script>
</body>
</html>
