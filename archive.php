<?php

include("connexion.php");


?>

<h1> ARCHIVE </h1>

<!-- Debut bouton accueil + rafraichir -->
<a href="index.php" onclick='window.location.reload(false)'>Retour</a>
<!-- Fin bouton accueil + rafraichir -->

<!-- Debut bouton rafraichir -->
<input type="button" onclick='window.location.reload(false)' value="Rafraichir"/>
<!-- FIN bouton rafraichir -->
<?php

$req = mysqli_query($dbb, 'SELECT * FROM materiels WHERE Archive = 0');

$data = mysqli_fetch_assoc($req);

?>
<td><form action="deleteall.php" method="post">
<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
<input type="submit" name="submit" value="Vider l'archive">
</form></td>


                            <!-- delete all -->




    <form method='POST' action='deleteselect.php'>

      <table>

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

      $res= mysqli_query($dbb, "SELECT * FROM materiels WHERE Archive = 0");
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


      <td><a href="correction.php?id=<?php echo $data["id"]; ?>">Retourner</a></td>
      <td><a href="delete.php?id=<?php echo $data["id"]; ?>">Suppprimer</a></td>

      <?php

      echo"</tr>";

      mysqli_set_charset('utf8');

      }

      ?>
      <input accesskey="S" name="Supprimer" value="Supprimer la sélection" type="submit">

<?php



?>

</table>
</form>

<script src="checkcolor.js" ></script>
