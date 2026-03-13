<?php
//message d'erreur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//connexion à la base de donées
$servername = "db";
$username = "root";
$password = "root";
$dbname = "inscription";

//création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);
$conn ->set_charset("utf8mb4");

//vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //récupération et sécurisation des données
    $nom = $conn->real_escape_string($_POST['nom']);
    $prenom = $conn->real_escape_string($_POST['prenom']);
    $date_naissance = $conn->real_escape_string($_POST['date_naissance']);
    $lieu_naissance = $conn->real_escape_string($_POST['lieu_naissance']);
    $adresse = $conn->real_escape_string($_POST['adresse']);
    $code_postal = $conn->real_escape_string($_POST['code_postal']);
    $ville = $conn->real_escape_string($_POST['ville']);
    $pays = $conn->real_escape_string($_POST['pays']);
    $telephone = $conn->real_escape_string($_POST['telephone']);
    
    //vérification et préparation de la requête SQL d'insertion
    if ($nom && $prenom && $date_naissance && $lieu_naissance && $adresse && $code_postal && $ville && $pays && $telephone) {
        $sql = "INSERT INTO utilisateurs (nom, prenom, date_naissance, lieu_naissance, adresse, code_postal, ville, pays, telephone) VALUES ('$nom', '$prenom', '$date_naissance', '$lieu_naissance', '$adresse', '$code_postal', '$ville', '$pays', '$telephone')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Vous venez de vous inscrire, merci !";
        } else {
            echo "Erreur : ". $sql . "<br>" . $conn->error ;
        } 
    } else {
        echo "Veuillez remplir tous les champs, merci.";
    }
}

//fermeture de la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>TP Projet PHP / MySQL</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            background: white;
            padding: 20px;
            width: 400px;
            margin: 30px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px #ccc;
        }

        input {
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
        }

        h2 {
            text-align: center;
        }
    </style>

</head>

<body>
    <h2>TP Projet PHP / MySQL - Formulaire d'inscription</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Nom : <input type="text" name="nom" required><br>
        Prénom : <input type="text" name="prenom" required><br>
        Date de naissance : <input type="date" name="date_naissance" required><br>
        Lieu de naissance : <input type="text" name="lieu_naissance" required><br>
        Adresse : <input type="text" name="adresse" required><br>
        Code postal : <input type="text" name="code_postal" required><br>
        Ville : <input type="text" name="ville" required><br>
        Pays : <input type="text" name="pays" required><br>
        Téléphone : <input type="text" name="telephone" required><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>
