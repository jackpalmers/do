<h1> BASE DE DONNEES </h1>

<link rel="stylesheet" href="../css/modal.css" />

<?php


include("../connexion/connexion.php");
include("../block/header.php");


?>
<!-- DEBUT Fonction archiver array -->

<form name="formulaire" method='POST' action='../requetes/archiveselect.php'>
    <table id='content-table'>



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


        $res= mysqli_query($dbb, "SELECT * FROM materiels WHERE Archive = 1");

        while($data = mysqli_fetch_array($res))

        {
            ?>

            <tr id="delete[]" style="background:#99ccff;">
                <td><input class="check" type="checkbox" name="delete[]"  value="<?php echo $data['id']; ?>" /></td>
                <!-- <td> <input type="checkbox" name="id[]" value="'.$data['id'].'"/></td> -->
                <td><?php echo $data['Urgence']; ?></td>
                <td><?php echo $data['Etat_du_dossier']; ?></td>
                <td><?php echo $data['Zone_de_stockage']; ?></td>
                <td><?php echo $data['Num_Entree_CRESA']; ?></td>
                <td><?php echo $data['Num_Contenu_CRESA']; ?></td>
                <td><?php echo $data['Marque']; ?></td>
                <td><?php echo $data['Autre_marque']; ?></td>
                <td><?php echo $data['Modele_Type']; ?></td>
                <td><?php echo $data['Num_IMEI']; ?></td>
                <td><?php echo $data['Titre']; ?></td>
                <td><?php echo $data['Num_de_Serie']; ?></td>
                <td><?php echo $data['Description']; ?></td>
                <td><a class="btn btn-success" href="../requetes/archiver.php?id=<?php echo $data["id"]; ?> " role="button" >Archiver</a></td>
                <td><a class="btn btn-warning" href="../requetes/modifier.php?id=<?php echo $data["id"]; ?> " role="button" >Modifier</a></td>
                <td><a class="btn btn-info" href="barcode.php?id=<?php echo $data["id"]; ?> " role="button" >Code-barres</a></td>
            </tr>
            <?php

        }

        ?>
        <input accesskey="S" name="Supprimer" value="Archiver la sélection" type="submit">
        <!-- FIN Fonction archiver array -->

        <!-- DEBUT Fenetre modale                                         NON FINI                       -->

        <?php
        $res= mysqli_query($dbb, "SELECT * FROM materiels WHERE Archive = 1");
        $data = mysqli_fetch_array($res);
        ?>

        <div>
            <label for="modalCheck6" >Voir la liste du matériel</label>
            <input type="checkbox" value="<?php echo $data['id'] ?>" name="modale[]" id="modalCheck6" />
            <div id="overlay6">
                <div class="popup_block">
                    <label for="modalCheck6"><img alt="Fermer" title="Fermer la fenêtre" class="my_btn_close" src="./images/close_pop.png" /></label>
                    <div align="center"><center><p><input name="B1" onclick="imprimer()" type="button" value="Imprimer"></p>
                    </center></div>
                    <h2>Liste du matériels</h2>
                    <p id='modal-table'>
                    </p>
                </div>
            </div>
        </div>

        <!-- FIN Fenetre modale                                             NON FINI            -->



        <?php

        //------------------------------------------- CHAMPS IMEI MANQUANT (vide)------------------------------------------------------

        echo "<ul>";
        echo "<li>";

        $res = mysqli_query($dbb, 'SELECT Num_IMEI FROM materiels WHERE Archive = 1 AND Num_IMEI = "" OR Num_IMEI = "-" ');

        $donnees = mysqli_num_rows($res);

        mysqli_free_result($res);


        if($donnees <= 0){
            echo "Il ne manque aucun N°IMEI";
        }
        else {
            echo "Il manque ".$donnees." N°IMEI";
        }

        echo "</li>";

        //------------------------------------------- CHAMPS N°Entree_CRESA MANQUANT (vide)------------------------------------------------------

        echo "<li>";

        $res = mysqli_query($dbb, 'SELECT Num_Entree_CRESA FROM materiels WHERE Archive = 1 AND Num_Entree_CRESA = "" OR Num_Entree_CRESA = "-" ');

        $donnees = mysqli_num_rows($res);

        mysqli_free_result($res);


        if($donnees <= 0) {
            echo "Il ne manque aucun N°Entree_CRESA";
        }
        else {
            echo "Il manque ".$donnees." N°Entree_CRESA";
        }

        echo "</li>";

        //------------------------------------------- CHAMPS Modele_Type MANQUANT (vide)------------------------------------------------------


        echo "<li>";

        $res = mysqli_query($dbb, 'SELECT Modele_Type FROM materiels WHERE Archive = 1 AND Modele_Type = "" OR Modele_Type = "-" ');
        $donnees = mysqli_num_rows($res);
        mysqli_free_result($res);


        if($donnees <= 0){
            echo "Il ne manque aucun Modele_Type";
        }
        else {
            echo "Il manque ".$donnees." Modele_Type";
        }

        echo "</li>";
        echo "</ul>";
        ?>
        <!-- DEBUT Bouton cocher toute les checkbox  -->
        <input id="cocher-tout" type="checkbox" onchange="cocherTout(this.checked)" /> Tout cocher <br />
        <!-- FIN bouton cocher toutes les checkbox -->
    </table>


</form>

<script src="../js/bootstrap.min.js"></script>
<script src="../js/print.js"></script>

<script src="../js/cocherTout.js" ></script>
<script src="../js/checkcolor.js" ></script>
<script>

document.getElementById('modalCheck6').onchange = ajouterCocheModal
</script>
</body>
