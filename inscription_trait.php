<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=aai_cinema', 'root', '');
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$code_postal = $_POST['code_postal'];
$rue = $_POST['rue'];
$ville = $_POST['ville'];
$num_tel = $_POST['telephone'];
$mdp = $_POST['mot_de_passe'];

$req = $bdd->prepare("INSERT INTO utilisateur (nom, prenom, mail, code_postal, rue, ville, num_tel, mdp) VALUES (:nom, :prenom, :email, :code_postal, :rue, :ville, :num_tel, :mot_de_passe)");

$rep = $req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'code_postal' => $code_postal,
    'rue' => $rue,
    'ville' => $ville,
    'num_tel' => $num_tel,
    'mdp' => $mdp
));

if ($rep) {
    echo "L'inscription a été faite avec succès";
} else {
    echo "Erreur pendant votre inscription";
}
?>