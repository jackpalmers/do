<input type="textbox" name="h1" size="3">
<input type="button" onclick="increase(document.h1)" value="+">
<input type="button" onclick="decrease(document.h1)" value="-">

<script type="text/javascript">
function increase (element) {
    element.value = element.value++;
 }

function decrease (element) {
    element.value = element.value--;
}
</script>
