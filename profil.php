<?php
session_start();
?>
 
<img src=<?php echo $_SESSION['photo']?> height="150px" width="150px"/>
<?php
echo "Mes informations :";
echo "Nom:".$_SESSION['nom'];
echo "Prenom:".$_SESSION['prenom'];
echo "Email:".$_SESSION['mail'];
echo "adresse:".$_SESSION['rue']." ".$_SESSION['cp'].$_SESSION['ville'];
 
if($_SESSION['admin']==0)
{
    echo"Un utilisateur de cinespace";
}
else
{
    echo"Un admin de cinespace";
}
?>