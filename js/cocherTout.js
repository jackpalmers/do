
var numberChecked = 0;
var colorChecked = '#ffff99'
var colorUnchecked = '#99ccff'
function cocherTout(etat)
{
    var cases = document.getElementsByClassName('check');   // on recupere tous les INPUT
    for(var i=0; i<cases.length; i++){
        etat ? numberChecked = cases.length :numberChecked = 0 // on les parcourt
        cases[i].parentElement.parentElement.style.backgroundColor = etat ?colorChecked:colorUnchecked ;// si on a une checkbox...
        cases[i].checked = etat;
    } // ... on la coche ou non
}

function ajouterCocheModal(){
    var checkboxModal = document.getElementById('modalCheck6');
    var modalp = document.getElementById('modal-table');
    if(!checkboxModal.checked){ //delete the modal content when checkbox is unchecked
        modalp.innerHTML = '';
        return
    }
    var cases = document.getElementsByClassName('check');
    // on recupere tous les INPUT
    var nbChecked = 0;
    for(var i=0; i<cases.length; i++){
        if(cases[i].checked){// si on a une checkbox...
                nbChecked++;
                var row = cases[i].parentNode.parentNode;
                var toAppend = row.cloneNode(true);
                var listTd = toAppend.getElementsByTagName('td')
                toAppend.removeChild(listTd[listTd.length -1])// remove the buttons
                toAppend.removeChild(listTd[listTd.length -1])
                toAppend.removeChild(listTd[listTd.length -1])
                toAppend.removeChild(listTd[0]) //remove the checkbox
                toAppend.style = ''; //remove style
                console.log(toAppend);
                modalp.append(toAppend);
        }
    }
    if(nbChecked==0){
        checkboxModal.checked = false
    }
}
