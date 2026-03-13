<?php
//message d'erreur
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//connexion à la base de données
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

//requête SQL pour récupérer toutes les informations des inscriptions
$sql = "SELECT id, nom, prenom, date_naissance, lieu_naissance, adresse, code_postal, ville, pays, telephone FROM utilisateurs";
$result = $conn->query($sql);

//vérification si la requête retourne des lignes
if ($result -> num_rows > 0) {
    //début du tableau pour afficher les inscriptions
    echo "<table border='1'><tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Lieu de naissance</th>
        <th>Adresse</th>
        <th>Code postal</th>
        <th>Ville</th>
        <th>Pays</th>
        <th>Téléphone</th>
    </tr>";

    //boucle sur les résultats pour afficher chaque ligne dans le tableau 
    while($row = $result ->fetch_assoc()) {
        //pour chaque inscription affiché
        echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["nom"] . "</td>
            <td>" . $row["prenom"] . "</td>
            <td>" . $row["date_naissance"] . "</td>
            <td>" . $row["lieu_naissance"] . "</td>
            <td>" . $row["adresse"] . "</td>
            <td>" . $row["code_postal"] . "</td>
            <td>" . $row["ville"] . "</td>
            <td>" . $row["pays"] . "</td>
            <td>" . $row["telephone"] . "</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "0 résultats";
}

//fermeture de la connexion
$conn->close();
?>