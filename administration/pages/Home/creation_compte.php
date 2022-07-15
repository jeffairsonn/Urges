
<?php 
//Reprise de session
session_start();
// Connexion à la base de données
include('../../function/bdd.php');
// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1" || $_SESSION['d3'] !== "1"){ header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>

<!DOCTYPE html>
<html lang="en">

    <center><h2>Création de compte</h2></center>
    <hr>
    <p><strong><u>Identifiants et type de compte:</u></strong>
    <form method="post" action="?">
        Login: <input type="text" name="login"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mot de passe: <input type="text" name="pass"><br>
        Adresse mail: <input type="text" name="mail"><br>
        Type de compte: <select name="type">
            <option value="eleve" selected>Eleve</option>
            <option value="intervenant">Intervenant</option>
            <option value="administratif">Administratif</option>
        </select>
    </p><hr>
    <p><strong><u>Profil:</u></strong><br>
        Nom: <input type="text" name="nom"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Prenom: <input type="text" name="prenom"><br>
        Adresse: <input type="text" name="adresse"><br>
        Ville: <input type="text" name="ville"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Code Postal: <input type="text" name="cp"><br>
        Telephone <input type="text" name="telephone"><br>
        Classe: <select name="classe">
        <?php
        // Recuperation des classes existantes
        $req_classe = "SELECT * FROM `classe`";
        $ex_classe = $link->prepare($req_classe);
        $ex_classe->execute();

        while($row=$ex_classe->fetch())
        {
            echo "<option value='".$row['id_classe']."'>".$row['annee']." - ".$row['nom_classe']."</option>";
        }
        ?>
        </select>
    </p><hr>
    <center><input type="submit" name="Valider" value="Valider"></center>
    </form>

<?php include('../../function/footer.php'); ?>
<?php 
if(isset($_POST['Valider']))
{
    // Récuperation et traitement des données entrées
    // RAZ DROITS
    $d1 = "0";
    $d2 = "0";
    $d3 = "0";
    $d4 = "0";
    // FIN RAZ DROITS

    // Mise en place des droits
    if($_POST['type'] == "eleve") {$d1 = "1";}
    if($_POST['type'] == "intervenant") {$d2 = "1";}
    if($_POST['type'] == "administratif") {$d3 = "1";}
    // Fin de mise en place des droits

    // Donnees identifiants
    $login = $_POST['login'];
    $pass = md5($_POST['pass']);
    $mail = $_POST['mail'];
    $type = $_POST['type'];
    // Données profil
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $telephone = $_POST['telephone'];
    $classe = $_POST['classe'];

    // Entrée en base des données de la table user
    $ins1 = "INSERT INTO `user` (`id_user`, `login`, `pass`, `mail`, `d1`, `d2`, `d3`, `d4`) VALUES (NULL, '$login', '$pass', '$mail', '$d1', '$d2', '$d3', '$d4')";
    $ex1=$link->prepare($ins1);
    $ex1->execute();
    // Fin de l'entrée de la table user

    
    // Récupération de l'ID user
    $rec="SELECT `id_user` FROM `user` WHERE `login` = '$login'";
    $ex_rec=$link->prepare($rec);
    $ex_rec->execute();

    while($row=$ex_rec->fetch())
    {
        $iduser = $row['id_user'];
    }
    // fin de récuperation de l'ID user

    // Entrée dans la table profil
    $ins2 = "INSERT INTO `profil` (`id_profil`, `id_user`, `nom_profil`, `prenom_profil`, `adresse_profil`, `ville_profil`, `CP`, `telephone`, `id_classe`) VALUES (NULL, '$iduser', '$nom', '$prenom', '$adresse', '$ville', '$cp', '$telephone', '$classe')";
    $req2=$link->prepare($ins2);
    $req2->execute();
    // Fin entrée dans la table profil


    /** TEST AFFICHAGE VARIABLES
    echo "Données renvoyées:<br>";
    echo "Login: ".$_POST['login'];
    echo "<br>Pass: ".$_POST['pass'];
    echo "<br>mail: ".$_POST['mail'];
    echo "<br>Type: ".$_POST['type'];
    echo "<hr>";
    echo "Nom: ".$_POST['nom'];
    echo "<br>Prenom: ".$_POST['prenom'];
    echo "<br>Adresse: ".$_POST['adresse'];
    echo "<br>Ville: ".$_POST['ville'];
    echo "<br>CP: ".$_POST['cp'];
    echo "<br>Telephone: ".$_POST['telephone'];
    echo "<br>Classe: ".$_POST['classe'];
    **/
}



?>
    </div>

</body>
</html>