<h1> IMPRIMER </h1>

<meta charset="utf-8">
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-theme.css" />
<title>Accueil</title>
<script type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.0/mustache.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/jquery-3.1.1.min.js" ></script>

<?php

$id = $_GET["id"];

include("../connexion/connexion.php");
include("../barcode/pi_barcode.php");



?>

<div align="center"><center><p><input name="B1" onclick="imprimer()" type="button" value="Imprimer"></p></center></div>



<form name="formulaire" method='POST' >
    <table>



        <tr>

            <td bgcolor="orange" > N° Entrée CRESA </td>
            <td bgcolor="orange" > N° Contenu CRESA </td>
            <td bgcolor="orange" > Modèle/Type </td>
            <td bgcolor="orange" > N° IMEI </td>
            <td bgcolor="orange" > N° de Série </td>
            <td bgcolor="orange" > Description </td>
            <td bgcolor="orange" > Code-barres </td>

        </tr>



        <?php


        $res= mysqli_query($dbb, "SELECT * FROM materiels WHERE id = ".$id);

        while($data = mysqli_fetch_array($res))
        {
            ?>

                <td><?php echo $data['Num_Entree_CRESA']; ?></td>
                <td><?php echo $data['Num_Contenu_CRESA']; ?></td>
                <td><?php echo $data['Modele_Type']; ?></td>
                <td><?php echo $data['Num_IMEI']; ?></td>
                <td><?php echo $data['Num_de_Serie']; ?></td>
                <td><?php echo $data['Description']; ?></td>
                <td><?php echo '<IMG src="../barcode/pi_barcode.php?type=C39&code='.$data["Num_IMEI"].'">'; ?></td>


            </tr>

            <?php
          }
        ?>

    </table>

</form>

<script type="text/javascript"></script>
<script src="../js/print.js" ></script>

</body>
