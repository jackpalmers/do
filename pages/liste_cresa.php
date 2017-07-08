<?php

include("../connexion/connexion.php");
include("../block/header.php");

$res = mysqli_query($dbb, "SELECT * FROM materiels");

$data = mysqli_fetch_assoc($res);
?>

<form method="post" name="myform" action="../requetes/entree_cresa.php?id=<?php echo $data['id'] ?>">


    <table class="form">

        <td> N° Entree_CRESA </td>

        <select name="category" class="formfield" id="category" onChange="submitForm();">

            
            <?php

            while ($data = mysqli_fetch_array($res))

            {
                echo '<option> '.$data["Num_Entree_CRESA"].' </option>';
            }

            ?>


        </select>

    </table>

</form>



<script language="javascript">
function submitForm(){
    var val = document.myform.category.value;
    if(val!=-1){
        document.myform.submit();
    }
}
</script>
