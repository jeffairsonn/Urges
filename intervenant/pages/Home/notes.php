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

<?php 

$res = $link->prepare('SELECT * FROM classe');
$res->execute();
// var_dump($res->fetchAll());
?>

<!-- This is an example component -->
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm p-4 sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="#">
            <h3 class="text-xl font-medium text-center text-gray-900 dark:text-white">Notes</h3>
            <label for="classe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 text-center">Selectionné classe</label>
            <select id="classe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choisir classe</option>
                <?php
                foreach ($res as $classe) {
                 ?>   
                <option value="<?php echo $classe['nom_classe'];?>"><?php echo $classe['nom_classe'];?></option>
                <?php
                }
                ?>
            </select>

            <label for="classe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 text-center">Selectionné classe</label>
            <select id="classe" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choisir classe</option>
                <?php
                foreach ($res as $classe) {
                 ?>   
                <option value="<?php echo $classe['nom_classe'];?>"><?php echo $classe['nom_classe'];?></option>
                <?php
                }
                ?>
            </select>

            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Validez</button>
            </div>
        </form>
    </div>
</div>

<!-- <?php include('../../function/footer.php'); ?> -->