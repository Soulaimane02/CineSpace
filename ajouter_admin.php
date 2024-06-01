<?php
session_start();

if (isset($_POST['prenom'], $_POST['nom'], $_POST['mail'], $_POST['mdp'], $_POST['code_postal'], $_POST['rue'], $_POST['ville'], $_POST['num_tel'], $_POST['photo'])) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $admin = 1;
    $code_postal = $_POST['code_postal'];
    $rue = $_POST['rue'];
    $ville = $_POST['ville'];
    $num_tel = $_POST['num_tel'];
    $photo = $_POST['photo']; 

    $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

    $req_select = $bdd->prepare("SELECT mail, mdp FROM Utilisateur WHERE mail = ?");
    $req_select->execute([$mail]);
    $recup = $req_select->fetch(PDO::FETCH_ASSOC);

    if ($recup) {
        //Condition si il existe !
        echo "Cet administrateur existe déjà !";
    } else {
        // Si il n'existe pas ajout dans la BDD puis le revoyer vers le tableau de bord 
        $req_insert = $bdd->prepare("INSERT INTO Utilisateur (admin, prenom, nom, mail, mdp, code_postal, rue, ville, num_tel, photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $execution = $req_insert->execute([$admin, $prenom, $nom, $mail, $mdp, $code_postal, $rue, $ville, $num_tel, $photo]);

        if ($execution) {
            header('Location: tableau_de_bord_admin.php');
            
        } else {
            echo "Une erreur est survenue lors de l'ajout de l'administrateur.";
        }
    }
} else {
    echo "Veuillez remplir tous les champs obligatoires.";
}
?>
