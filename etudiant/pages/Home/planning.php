

<?php
//Reprise de session
// session_start();
// // Verification de la connexion utilisateur
// if($_SESSION['connect'] !== "1" || $_SESSION['d2'] !== "1"){ header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
// Recupération de la base de donnée
include('../../function/bdd.php');

?>
<body>
    <div id='calendar'></div>
</body>

</html>