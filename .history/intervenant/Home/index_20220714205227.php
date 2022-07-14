
<?php 
//Reprise de session
session_start();
// Verification de la connexion utilisateur
if($_SESSION['connect'] !== "1" || $_SESSION['d1'] !== "1"){ header('Location: ../../../index.html'); }
// Mise en place du header
include('../../function/header.php');
// Mise en place du menu de navigation
include('../../function/nav_menu.php');
?>

<!DOCTYPE html>
<html lang="en">

    <div style=" display: flex; flex-wrap: wrap; justify-content: space-between; width: 100%; margin-top: 24px;">
      
      <div style="width: 48%;  margin-bottom: 32px;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 16px">MES DOCUMENTS</h2>
        <div style="width: 100%; border-radius: 8px; box-shadow: 5px 5px 18px rgba(0, 0, 0, 0.218);">
          <div class="list-group" style="padding: 16px;">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Buletin semestre 1</h5>
                <small>Il y a 1 jours</small>
              </div>
              <p class="mb-1">nom du fichier.pdf</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Rapport de stage instruction </h5>
                <small>Il y a 3 jours</small>
              </div>
              <p class="mb-1">nom du fichier.pdf</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Règlement intérieur</h5>
                <small>Il y a 90 jours</small>
              </div>
              <p class="mb-1">nom du fichier.pdf</p>
            </a>
          </div>
          <div class="d-grid gap-2" style="padding: 16px;">
            <button class="btn btn-primary" type="button">Voir tous mes documents </button>
          </div>
        </div>
      </div>

      <div style="width: 48%;  margin-bottom: 32px;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 16px">MES SUPPORTS DE COURS</h2>
        <div style="width: 100%; border-radius: 8px; box-shadow: 5px 5px 18px rgba(0, 0, 0, 0.218);">
          <div class="list-group" style="padding: 16px;">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Anglais</h5>
                <small>Il y a 2 jours</small>
              </div>
              <p class="mb-1">nom du fichier.pdf</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Design Thinking</h5>
                <small>Il y a 8 jours</small>
              </div>
              <p class="mb-1">nom du fichier.pdf</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Linux orienté Développeur </h5>
                <small>Il y a 13 jours</small>
              </div>
              <p class="mb-1">nom du fichier.pdf</p>
            </a>
          </div>
          <div class="d-grid gap-2" style="padding: 16px;">
            <button class="btn btn-primary" type="button">Voir tous mes supports de cours </button>
          </div>
        </div>
      </div>

      <div style="width: 100%;  margin-bottom: 32px;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 16px">EMPLOI DU TEMPS (AUJOURD'HUI) </h2>
        <div style="width: 100%; border-radius: 8px; box-shadow: 5px 5px 18px rgba(0, 0, 0, 0.218);">
          <div class="list-group" style="padding: 16px;">
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">CMS et framework</h5>
                <small>8h00 - 8h30</small>
              </div>
              <p class="mb-1">Salle 107</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Algorithme avancé</h5>
                <small>9h45 - 11h15</small>
              </div>
              <p class="mb-1">Salle 208</p>
            </a>
            <a href="#" class="list-group-item list-group-item-action" aria-current="true">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Linux orienté Développeur </h5>
                <small>11h30 - 13h00</small>
              </div>
              <p class="mb-1">Salle 208</p>
            </a>
          </div>
          <div class="d-grid gap-2" style=" padding: 16px; width: 30%; margin: 0 auto;;">
            <button class="btn btn-primary" type="button">Voir plus de détail</button>
          </div>
        </div>
      </div>

<?php include('../../function/footer.php'); ?>

    </div>

</body>
</html>