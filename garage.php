<body>
<meta http-equiv=“Content-Type” content=“text/html; charset=utf-8”>
<a href="index.php" onclick='window.location.reload(false)'>Retour</a>
<h1> GARAGE </h1>
<?php

header('Content-Type: text/html; charset=UTF-8');

include("connexion.php");


$res = $dbb->query("SELECT * FROM materiels");


?>
<!-- <input type="button" value="Retour" onclick="history.go(-1)">  -  Bouton retour sur la page précédente  -->

<input type="button" onclick='window.location.reload(false)' value="Rafraichir" />




                                  <!-- DEBUT SCRIPT -->


<script>
function change(moi)
{
if (document.formulaire.elements[moi].checked == true)
        {
                document.getElementById(moi).style.backgroundColor = '#ffff99';
        }
else
        {
        document.getElementById(moi).style.backgroundColor = '#99ccff';
        }
}
</script>


                                    <!-- FIN SCRIPT -->

                                      <!-- DEBUT Fonction archiver array -->


  <form name="formulaire" method='POST' action='ajouterselect.php'>
  <table>

<!-- <IMG src="pi_barcode.php?type=C39&code=861000000000000"> -->

    <tr>
        <td>Arch</td>
        <td>Urgence</td>
        <td>Etat du dossier</td>
        <td>Zone de stockage</td>
        <td> N° Entrée CRESA </td>
        <td> N° Contenu CRESA </td>
        <td> Marque </td>
        <td> Autre marque </td>
        <td> Modèle/Type </td>
        <td> N° IMEI </td>
        <td> Titre </td>
        <td> N° de Série </td>
        <td> Description </td>
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


  <td><a href="ajouter.php?id=<?php echo $data["id"]; ?> " >Ajouter</a></td>
  <td><a href="modifiergarage.php?id=<?php echo $data["id"]; ?> " >Modifier</a></td>
  <td><a href="barcode.php?id=<?php echo $data["id"]; ?> " >Code-barres</a></td>
  </tr>
<?php


mysql_set_charset('utf8');



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


</table>

</form>

<script src="checkcolor.js" ></script>

</body>
