document.addEventListener('DOMContentLoaded', function(){

  checkboxes = document.getElementsByClassName('check');

  for (var i = 0; i < checkboxes.length; i++){
    checkboxes[i].onchange = function(){
        this.parentElement
            .parentElement
            .style.backgroundColor = this.checked ? colorChecked: colorUnchecked;
        this.checked ? numberChecked++:numberChecked--;
        checkBoxAll = document.getElementById('cocher-tout');
        checkBoxAll.checked = numberChecked === checkboxes.length?true:false;

    }
  }
})
