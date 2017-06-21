document.addEventListener('DOMContentLoaded', function(){

  checkboxes = document.getElementsByClassName('check');

  for (var i = 0; i < checkboxes.length; i++){
    checkboxes[i].onchange = function(){
      if (this.checked){
        this.parentElement.parentElement.style.backgroundColor = '#ffff99';
      }
      else{
        this.parentElement.parentElement.style.backgroundColor = '#99ccff';
      }
    }
  }
})
