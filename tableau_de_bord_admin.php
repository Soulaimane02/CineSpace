<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="path/to/your/custom/styles.css">
    <link rel="stylesheet" href="design/custom.css">
    <link rel="stylesheet" href="design/premier.css">
<link rel="stylesheet" href="design/2.css">
<link rel="stylesheet" href="design/3.css">
<link rel="stylesheet" href="design/4.css">
<link rel="stylesheet" href="design/5.css">
<link rel="stylesheet" href="design/6.css">
<link rel="stylesheet" href="design/7.css">
<link rel="stylesheet" href="design/8.css">
<link rel="stylesheet" href="design/9.css">
<link rel="stylesheet" href="design/10.css">
<link rel="stylesheet" href="design/11.css">
<style id="jws-style-theme-inline-css" type="text/css">
.container , .elementor-section.elementor-section-boxed > .elementor-container , .shop-single .woocommerce-notices-wrapper { max-width:100%}body { --container-padding:0 70px 0 70px}body {--e-global-color-primary:#7b61ff; --main: #7b61ff}body {--secondary: #9e61ff}body {--third: #619bff}body {--body:#cccdd2}body {--heading:#ffffff}body {--light:#ffffff}body {--body-font: Metropolitano;--font2: Metropolitano;}.jws_header > .elementor {position:absolute;width:100%;left:0;top:0;}
.blen_lighten {
mix-blend-mode: lighten;
}
</style>


    <title>Tableau de bord admin</title>
</head>
<body>
    <?php session_start(); ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="bot.php" method="post" class="mb-3">
                    <div class="mb-3">
                        <label for="film" class="form-label">Ajouter un film</label>
                        <input type="text" name="film_ajout" class="form-control" placeholder="Nom du film">
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>













                <!-- Formulaires pour le tableau de bord et affichage -->
                <form action="supp_film.php" method="post" class="mb-3">
                    <div class="mb-3">
                        <label for="supprimer_film" class="form-label">Choisissez le film à supprimer</label>
                        <select id="supprimer_film" name="supprimer_film" class="form-select">
                            <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
                            $reponse = $bdd->query('SELECT id_Film, Titre FROM `Film`');
                            $donnees = $reponse->fetchAll();

                            foreach ($donnees as $element) {
                                echo "<option value='" . $element['id_Film'] . "'>" . $element['Titre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                
                <!-- </form>
                <form action="accueil.php" method="post">
        <label for="recherche">Rechercher votre film </label>
        <input type="text" placeholder="Titanic" name="recherche" id="recherche">
        <input type="submit" value="Rechercher">
    </form> -->
    <?php
     /*
    if (!empty($titre)) {
            $t = 'SELECT id_Film, Titre, image_du_film FROM Film WHERE Titre LIKE "%' . $titre . '%"';
            $o = $bdd->prepare($t);
            $o->execute();
            $res = $o->fetchAll(PDO::FETCH_ASSOC);
    }
            */
            ?>

































                <form action="reservation_modif.php" method="post" class="mb-3 stylish-form">
                    <div class="mb-3">
                        <label for="edit_reservation" class="form-label">Choisissez une réservation à modifier</label>
                        <select name="edit_reservation" class="form-select">
                            <?php
                            $reponse = $bdd->query('SELECT id_Reservation, ref_Utilisateur FROM `Reservation`');
                            $donnees = $reponse->fetchAll();

                            foreach ($donnees as $element) {
                                echo "<option value='" . $element['id_Reservation'] . "'>" . $element['ref_Utilisateur'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </form>

                <form action="supp_reservation.php" method="post" class="mb-3">
                    <div class="mb-3">
                        <label for="supp_reservation" class="form-label">Choisissez une réservation à supprimer</label>
                        <select name="supp_reservation" class="form-select">
                            <?php
                            $reponse = $bdd->query('SELECT id_Reservation, ref_Utilisateur FROM `Reservation`');
                            $donnees = $reponse->fetchAll();

                            foreach ($donnees as $element) {
                                echo "<option value='" . $element['id_Reservation'] . "'>" . $element['ref_Utilisateur'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>

                <form action="formulaire_ajout_admin.php" method="post" class="mb-3">
                    <p class="text-center">
                        <button type="submit" class="btn btn-success">Ajouter un nouvel admin</button>
                    </p>
                </form>

                <form action="formulaire_attribution_film.php" method="post">
                    <p class="text-center">
                        <button type="submit" class="btn btn-info">Attribuer un film à une salle</button>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>


        <!-- Tableau pour afficher les données 
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    -->

</body>
</html>
