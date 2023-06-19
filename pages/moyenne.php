<?php
// Connexion à la base de données en utilisant PDO
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'trinome';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le paramètre 'email' existe dans l'URL
    if (isset($_GET['email'])) {
        // Récupérer l'e-mail de l'utilisateur
        $emailParent = $_GET['email'];

        // Requête pour récupérer les utilisateurs correspondants dans la table eleve
        $stmt = $conn->prepare("SELECT nom, prenom, classe, moyenne_1, moyenne_2, moyenne_3 FROM eleve WHERE email_parent = :emailParent");
        $stmt->bindParam(":emailParent", $emailParent);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            // Affichage des résultats sous forme de tableau
            echo '<h1><table classe="table table-striped-columns">';
            echo "<tr><th>Nom</th><th>Prenom</th><th>Classe</th><th>Moyenne 1</th><th>Moyenne 2</th><th>Moyenne 3</th></tr>";
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>".$row["nom"]."</td>";
                echo "<td>".$row["prenom"]."</td>";
                echo "<td>".$row["classe"]."</td>";
                echo "<td>".$row["moyenne_1"]."</td>";
                echo "<td>".$row["moyenne_2"]."</td>";
                echo "<td>".$row["moyenne_3"]."</td>";
                echo "</tr>";
            }
            echo "</table></h1>";
        } else {
            echo "Aucun résultat trouvé.";
        }
    } else {
        echo "Paramètre 'email' manquant dans l'URL.";
    }
} catch(PDOException $e) {
    echo "Échec de la connexion à la base de données : " . $e->getMessage();
}

// Fermeture de la connexion à la base de données
$conn = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>moyenne</title>
    <link rel="stylesheet" href="../Styles/bootstrap.min.css">
</head>
<body>
    
</body>
</html>
