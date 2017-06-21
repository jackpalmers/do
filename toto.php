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

<form name="formulaire">
<table>
<tr id="row1" style="background:#99ccff;">
    <td><input type="checkbox" name="row1" onClick="change(this.name)" /></td>
    <td>Première ligne</td>
</tr>

<tr id="row2" style="background:#99ccff;">
    <td><input type="checkbox" name="row2" onClick="change(this.name)" /></td>
    <td>Seconde ligne</td>
</tr>

</table>
</form>
