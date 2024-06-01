
<?php
 
//ficher controler
 
session_start();
$temps=date("Y-m-d H:i:s");
$commentaire=$_POST['commentaire'];
 
 
$mabase = new PDO ('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
 
$marequete = $mabase->prepare("INSERT INTO commentaire (date,ref_Utilisateur,commentaire) VALUES (:keydate,:keyidutilisateur,:keycommentaire)");
 
$key=array('keydate'=>$temps,'keycommentaire'=>$commentaire,'keyidutilisateur'=>$_SESSION['id_Utilisateur']);
 
$marequete->execute($key);
 
header('location: commentairevue.php');
 
 
?>

<?php
session_start();
 
 
 
$mabase = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
 
$marequete = $mabase -> prepare("SELECT commentaire, date, ref_Utilisateur FROM commentaire ");
 
$res = $marequete->execute();
 
$resultat =$marequete->fetchAll(PDO::FETCH_ASSOC);
 
?>
<link href="commentairevue.css" rel="stylesheet"/>
 
<?php
 
foreach($resultat as $commentaire)
{
    $ref_utilisateur = $commentaire['ref_Utilisateur'];
    $marequete2 = "SELECT photo, prenom FROM utilisateur where id_utilisateur='".$ref_utilisateur."'";
    $result = $mabase-> prepare($marequete2);
    $result->execute();
    $test = $result->fetch(PDO::FETCH_ASSOC);
 
?>
 
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card card-white post">
                <div class="post-heading">
                    <div class="float-left image">
                        <img src=<?php echo $test['photo'];?> class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="float-left meta">
                        <div class="title h5">
                            <a href="#"><b>
                                <?php
                            echo $test['prenom'];
                            ?>
                            </b></a>
                            a posté un message .
                        </div>
                        <h6 class="text-muted time">
                            <?php
                            echo $commentaire['date'];
                            ?>
                        </h6>
                    </div>
                </div>
                <div class="post-description">
                   
                <p>
                    <?php
                echo $commentaire['commentaire'];
                ?>
                </p>
 
                </div>
            </div>
        </div>
 
    </div>
</div>
 
 
<?php
}
?>
 
 