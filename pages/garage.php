
<h1> GARAGE </h1>
<?php

header('Content-Type: index.php');
header('Content-Type: text/html; charset=UTF-8');

include("../connexion/connexion.php");
include("../block/header.php");

$res = $dbb->query("SELECT * FROM materiels");


?>
<!-- <input type="button" value="Retour" onclick="history.go(-1)">  -  Bouton retour sur la page précédente  -->

<input type="button" onclick='window.location.reload(false)' value="Rafraichir" />




                                      <!-- DEBUT Fonction archiver array -->


  <form name="formulaire" method='POST' action='../requetes/ajouterselect.php'>
    <table>

    <tr>
      <td bgcolor="orange" >Arch</td>
      <td bgcolor="orange" >Urgence</td>
      <td bgcolor="orange" >Etat du dossier</td>
      <td bgcolor="orange" >Zone de stockage</td>
      <td bgcolor="orange" > N° Entrée CRESA </td>
      <td bgcolor="orange" > N° Contenu CRESA </td>
      <td bgcolor="orange" > Marque </td>
      <td bgcolor="orange" > Autre marque </td>
      <td bgcolor="orange" > Modèle/Type </td>
      <td bgcolor="orange" > N° IMEI </td>
      <td bgcolor="orange" > Titre </td>
      <td bgcolor="orange" > N° de Série </td>
      <td bgcolor="orange" > Description </td>
    </tr>



<?php


$res= mysqli_query($dbb, "SELECT * FROM materiels WHERE Archive = 2");

while($data = mysqli_fetch_array($res))
  {
      ?>

        <tr id="delete[]" style="background:#99ccff;">

        <td><input class="check" type="checkbox" name="delete[]" value="<?php echo $data['id']; ?>" /></td>




      <td><?php echo $data['Urgence']; ?></td>
      <td><?php echo $data['Etat_du_dossier']; ?></td>
      <td><?php echo $data['Zone_de_stockage']; ?></td>
      <td><?php echo $data['N°Entree_CRESA']; ?></td>
      <td><?php echo $data['N°Contenu_CRESA']; ?></td>
      <td><?php echo $data['Marque']; ?></td>
      <td><?php echo $data['Autre_marque']; ?></td>
      <td><?php echo $data['Modele_Type']; ?></td>
      <td><?php echo $data['N°IMEI']; ?></td>
      <td><?php echo $data['Titre']; ?></td>
      <td><?php echo $data['N°de_Serie']; ?></td>
      <td><?php echo $data['Description']; ?></td>


  <td><a class="btn btn-success" href="../requetes/ajouter.php?id=<?php echo $data["id"]; ?> " role="button" >Ajouter</a></td>
  <td><a class="btn btn-warning" href="../requetes/modifiergarage.php?id=<?php echo $data["id"]; ?> " role="button" >Modifier</a></td>
  <td><a class="btn btn-info" href="barcode.php?id=<?php echo $data["id"]; ?> " role="button" >Code-barres</a></td>
  </tr>
<?php

}

?>
<input accesskey="S" name="Supprimer" value="Ajouter la sélection" type="submit">





                                      <!-- FIN Fonction archiver array -->





<?php

//------------------------------------------- CHAMPS IMEI MANQUANT (vide)------------------------------------------------------

echo "<ul>";
echo "<li>";

$res = mysqli_query($dbb, 'SELECT N°IMEI FROM materiels WHERE Archive = 2 AND N°IMEI = "" OR N°IMEI = "-" ');

$donnees = mysqli_num_rows($res);

mysqli_free_result($res);


if($donnees <= 0)
{
  echo "Il ne manque aucun N°IMEI";
}
else
{
  echo "Il manque ".$donnees." N°IMEI";
}

echo "</li>";

//------------------------------------------- CHAMPS N°Entree_CRESA MANQUANT (vide)------------------------------------------------------

echo "<li>";

$res = mysqli_query($dbb, 'SELECT N°Entree_CRESA FROM materiels WHERE Archive = 2 AND N°Entree_CRESA = "" OR N°Entree_CRESA = "-" ');

$donnees = mysqli_num_rows($res);

mysqli_free_result($res);


if($donnees <= 0)
{
  echo "Il ne manque aucun N°Entree_CRESA";
}
else
{
  echo "Il manque ".$donnees." N°Entree_CRESA";
}

echo "</li>";

//------------------------------------------- CHAMPS Modele_Type MANQUANT (vide)------------------------------------------------------


echo "<li>";

$res = mysqli_query($dbb, 'SELECT Modele_Type FROM materiels WHERE Archive = 2 AND Modele_Type = "" OR Modele_Type = "-" ');

$donnees = mysqli_num_rows($res);

mysqli_free_result($res);


if($donnees <= 0)
{
  echo "Il ne manque aucun Modele_Type";
}
else
{
  echo "Il manque ".$donnees." Modele_Type";
}

echo "</li>";
echo "</ul>";


?>

<input type="checkbox" onchange="cocherTout(this.checked)" /> Tout cocher <br />

</table>

</form>

<script src="../js/cocherTout.js" ></script>
<script src="../js/checkcolor.js" ></script>

</body>
