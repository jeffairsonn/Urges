
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

    <div style=" display: flex; flex-wrap: wrap; justify-content: space-between; width: 100%; margin-top: 24px;">
      
      <div style="width: 48%;  margin-bottom: 32px;">
        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 16px">EVENEMENTS</h2>
        <div style="width: 100%; border-radius: 8px; box-shadow: 5px 5px 18px rgba(0, 0, 0, 0.218);">
          <div class="list-group" style="padding: 16px;">
          <?php
          // Affichage des evenements à venir (3 seulement)

          $req="SELECT * FROM `evenements` WHERE `archive` = '0' LIMIT 3";
          $ex=$link->prepare($req);
          $ex->execute();

          while($row=$ex->fetch())
          {
                  echo  "<a href='consult_evenement.php?id=".$row['id_event']."' class='list-group-item list-group-item-action' aria-current='true'>";
                    echo  "<div class='d-flex w-100 justify-content-between'>";
                      echo  "<h5 class='mb-1'>".$row['resume_event']."</h5>";
                    echo  "</div>";
                    echo  "<p class='mb-1'>".$row['date_event']."</p>";
                  echo  "</a>";
          }
          // fin affichage des evenements à venir
          ?>
          </div>
          <div class="d-grid gap-2" style="padding: 16px;">
            <button class="btn btn-primary" type="button"><a href="evenement.php" class="text-light text-decoration-none">Voir tous les évenements</a></button>
          </div>
        </div>
      </div>





    

<?php include('../../function/footer.php'); ?>

    </div>

</body>
</html>